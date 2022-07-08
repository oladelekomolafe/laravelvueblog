<template>
	<div>
		<section class="content-header">
	      <h1>
	        Dashboard
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Post</a></li>
	        <li class="active">Add New</li>
	      </ol>
	    </section>
		<div class="content">
			<div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Add New Post</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
	            <form role="form" @submit.prevent="addNewPost">
	            	<input type="hidden" name="_token" :value="csrf">
		              <div class="box-body">
		                <div class="form-group">
		                  <label for="post">New Post</label>
		                  <input type="text" class="form-control" id="title" v-model="title" placeholder="Add New Post">
		                </div>
		                <div class="form-group">
		                  <label>Add New Description</label>
		                  <!-- <textarea class="form-control" rows="3" placeholder="description" v-model="description"></textarea> -->

		                  <v-md-editor v-model="description" height="400px"></v-md-editor>
		                </div>

		               

		                <div class="form-group">
		                  <label>Select Category</label>
		                  <select class="form-control" v-model="category">
		                    <option default="true">Select One</option>
		                    <option v-for="category in getallCategory" :key="category.id" :value="category.id">{{category.cat_name}}</option>
		                  </select>
		                </div>
		                	
		                <div class="form-group">
		                  <label for="exampleInputFile">File input</label>
		                  <input type="file" id="photo" @change="changePhoto($event)" name="photo" ref="photo">
		                  <img field="previewimage" class='pull-right' alt="" height="150" id="previewimage" name="previewimage" :src="previewimage" />
		                </div>

		              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Save</button>
	              </div>
	            </form>
	        </div>
		</div>
	</div>
</template>

<script>
	import Swal from 'sweetalert2'
	export default{
		data(){
			return {
				category: '',
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				title: '',
				description: '',
				cat_id: '',
				photo: null,
				previewimage: null,				
			}
		},
		mounted: function (){
			//this.getallCategory();
			this.$store.dispatch("allCategory") //we are using this to reload the table store state and table data
		},
		computed:{
			getallCategory: function(){
				return this.$store.getters.getCategory
			},
		},
		methods:{
			changePhoto(event){
				let file = event.target.files[0];
				
				if(file){
					if(file.size > 1048576){
						const Toast = Swal.mixin({
					    	toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 15000,
				            			          
				        });

				        Toast.fire({
						  	icon: 'error',
						  	text: 'Post successfully saved'
						});

					}else{
						let reader = new FileReader();
						reader.readAsDataURL(file);
						reader.onload = function(event2){
							console.log(event2.target.result);
							this.previewimage = event2.target.result;

						}.bind(this);
						
						this.$emit('photo', file);
					}
				}
			},
			
			addNewPost(){
				const FormData = {
					cat_id: this.category,
					token : this.csrf,
					description: this.description,
					title: this.title,
					photo: this.previewimage,
				}
				//this.$emit('form-data', FormData)
				//console.log(FormData);
				axios.post('/api/post/create', FormData)
					.then(function(response){
						//console.log(response);
						console.log(response.data);
						//this.$router.push('/category-list');

					    const Toast = Swal.mixin({
					    	toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 15000,
				            			          
				        });

				        Toast.fire({
						  	icon: 'success',
						  	text: 'Post successfully saved'
						})
				}.bind(this));
			}
		},
	}
</script>
<style>
	.swal2-popup {
	  font-size: 1.6rem !important;
	  font-family: Georgia, serif;
	}
</style>