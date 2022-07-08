<template>
	<div>
		<section class="content-header">
	      <h1>
	        Dashboard
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
	        <li class="active">List All</li>
	      </ol>
	    </section>
		<div class="content">
			<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Category List </h3> <router-link to="/add-category" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Category</router-link>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example1" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>SL</th>
	                  <th>Category Name</th>
	                  <th>Date</th>
	                  <th>Actions</th>
	                </tr>
	                </thead>
	                <tbody>
	                <tr v-for="category in getallCategory" :key="category.id">
	                  <td>{{category.id }}</td>
	                  <td>{{category.cat_name }}</td>
	                  <td>{{$dateFormat(category.created_at) }}</td>
	                  <td>
	                  		<router-link :to="'/edit-category/'+category.id" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-circle-o"></i> Edit</router-link>&nbsp;
	                  		<a @click.prevent = "deleteCategory(category.id)" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-circle-o"></i> Delete</a>
	                  </td>
	                </tr>
	                
	                </tbody>
	                <tfoot>
	                <tr>
	                  <th>SL</th>
	                  <th>Category Name</th>
	                  <th>Date</th>
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
				categories: [],
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
			deleteCategory: function (cat_id){
				axios.post('/api/category/delete', {'cat_id':cat_id})
				.then(function (response){
					//console.log(response.data);
					this.$store.dispatch("allCategory") //we are using this to reload the table store state and table data

					const Toast = Swal.mixin({
				    	toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 15000,
			            			          
			        });

			        Toast.fire({
			        	
					  	icon: 'success',
					  	text: 'Category successfully Deleted'
					})

				}.bind(this));
			}
		},
		mounted: function (){
			$("#example1").DataTable({
				//pageLength : 5,
			});
			//this.getCategories();
			this.$store.dispatch("allCategory")
		},
		computed: {
			getallCategory: function(){
				return this.$store.getters.getCategory
			},
		},
	}

</script>