<template>
	<div>
		<section class="content-header">
	      <h1>
	        Dashboard
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
	        <li class="active">Add New</li>
	      </ol>
	    </section>
		<div class="content">
			<div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Add New Category</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
	            <form role="form" @submit.prevent="addCategory">
	            	<input type="hidden" name="_token" :value="csrf">
		              <div class="box-body">
		                <div class="form-group">
		                  <label for="category">New Category</label>
		                  <input type="text" class="form-control" id="category" v-model="category" placeholder="Add New Category">
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
			}
		},

		methods:{
			addCategory(){
				const FormData = {
					cat_name: this.category,
					token : this.csrf,
				}
				//this.$emit('form-data', FormData)
				console.log(FormData);
				axios.post('/api/category/create', FormData)
					.then(function(response){
						//console.log(response.data);
						this.$router.push('/category-list');

					    const Toast = Swal.mixin({
					    	toast: true,
							position: 'top-end',
							showConfirmButton: false,
							timer: 15000,
				            			          
				        });

				        Toast.fire({
				        	
						  	icon: 'success',
						  	text: 'Category successfully Added'
						})
				}.bind(this));
			}
		},
	}
</script>