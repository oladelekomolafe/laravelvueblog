<template>
	<div>
		<section class="content-header">
	      <h1>
	        Dashboard
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Post</a></li>
	        <li class="active">List All</li>
	      </ol>
	    </section>
		<div class="content">
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Post List </h3> <router-link to="/add-post" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Post</router-link>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example1" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>SL</th>
	                  <th>User</th>
	                  <th>Category</th>
	                  <th>Title</th>
	                  <th>Description</th>
	                  <th>Photo</th>
	                  <th>Created</th>
	                  <th>Actions</th>
	                </tr>
	                </thead>
	                <tbody>
	                <tr v-for="post in getAllPost" :key="post.id">
	                  <td>{{post.id }}</td>
	                  <td v-if='post.user'>{{post.user.name }}</td>
	                  <td v-if='post.category'>{{post.category.cat_name }}</td>
	                  <td>{{$sortLength(post.title, 50, '---' )}}</td>
	                  <td>{{$sortLength(post.description, 60, '...') }}</td>
	                  <td><img :src="post.photo" width="80" height="70" /> </td>
	                  <td>{{$dateFormat(post.created_at) }}</td>
	                  <td>
	                  		<router-link :to="'/edit-post/'+post.id" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-circle-o"></i> Edit</router-link>&nbsp;
	                  		<a @click.prevent = "deletePost(post.id)" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-circle-o"></i> Delete</a>
	                  </td>
	                </tr>
	                
	                </tbody>
	                <tfoot>
	                <tr>
	                  <th>SL</th>
	                  <th>User</th>
	                  <th>Category</th>
	                  <th>Title</th>
	                  <th>Description</th>
	                  <th>Photo</th>
	                  <th>Created</th>
	                  <th>Actions</th>
	                </tr>
	                </tfoot>
	              </table>
	            </div>
	            <!-- /.box-body -->
            	
          </div>
          <!-- /.box -->
	    </div><!-- end of content -->
	</div>
</template>

<script>	
	//import moment from 'moment';
	import Swal from 'sweetalert2';

	export default {
		data: function (){
			return {
				posts: [],
			};
		},
		methods: {
			/*getCategories: function (){
				axios.get('/api/allcategory')
				.then(function (response){
					this.categories = response.data;

				}.bind(this));
			},*/
			/*dateTimeFormat: function(value){
				return moment(value).format('MMMM Do YYYY')
			}*/
			deletePost: function (post_id){
				axios.post('/api/post/delete', {'post_id':post_id})
				.then(function (response){
					//console.log(response.data);
					this.$store.dispatch("allPost") //we are using this to reload the table store state and table data

					const Toast = Swal.mixin({
				    	toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 15000,
			            			          
			        });

			        Toast.fire({
			        	
					  	icon: 'success',
					  	text: 'Post successfully Deleted'
					})

				}.bind(this));
			}
		},
		mounted: function (){
			$("#example1").DataTable({
				//pageLength : 5,
			});
			//this.getCategories();
			this.$store.dispatch("allPost")
		},
		computed: {
			getAllPost: function(){
				return this.$store.getters.getPost
			},
		},
	}

</script>