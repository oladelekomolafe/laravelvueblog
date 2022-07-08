<template>
	<div>
		<section id="breadcrumbs" class="breadcrumbs">
	      <div class="container">

	        <div class="d-flex justify-content-between align-items-center">
	          <h2>Blog {{this.$route.params.catid}}</h2>
	          <ol>
	            <li><a href="index.html">Home</a></li>
	            <li>Blog</li>
	          </ol>
	        </div>

	      </div>
	    </section>
		<section id="blog" class="blog">

		    <div class="container aos-init aos-animate" data-aos="fade-up">

		        <div class="row">

		          <div class="col-lg-8 entries">

		            <article v-for="post in getAllBlogPost" class="entry">

		              <div class="entry-img">
		               <!--  <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"> -->
		               <img :src="post.photo" class="img-fluid" style="width:100%;" />
		              </div>

		              <h2 class="entry-title">
		                <a href="blog-single.html">{{post.title}}</a>
		              </h2>

		              <div class="entry-meta">
		                <ul>
		                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{post.user.name}}</a></li>
		                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$dateFormat(post.created_at) }}</time></a></li>
		                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
		                  <li class="d-flex align-items-center" v-if="post.category"><i class="bi bi-folder"></i> <a href="blog-single.html">{{post.category.cat_name}}</a></li>
		                </ul>
		              </div>

		              <div class="entry-content">
		                <p>
		                  {{$sortLength(post.description, 300, '...') }}
		                </p>
		                <div class="read-more">
		                  <router-link :to="'/blogpost/'+post.id" >Read More</router-link>
		                </div>
		              </div>

		            </article><!-- End blog entry -->

		            <div class="blog-pagination">
		              <ul class="justify-content-center">
		                <li><a href="#">1</a></li>
		                <li class="active"><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		              </ul>
		            </div>

		          </div><!-- End blog entries list -->

		          <div class="col-lg-4">

		            <BlogSidebar/>

		          </div><!-- End blog sidebar -->

		        </div>

		    </div>
    
		</section>
	</div>
</template>

<script>
	import BlogSidebar from "./Blogsidebar.vue"
	export default{
		data(){
			return {
							
			}
		},
		mounted: function (){
			//this.getallCategory();
			this.$store.dispatch("allBlogPost"); //we are using this to reload the table store state and table data
		},
		computed:{
			getallCategory: function(){
				return this.$store.getters.getCategory
			},
			getAllBlogPost: function(){
				return this.$store.getters.getBlogPost
			},
		},
		components:{
			BlogSidebar,
		},
		methods:{

			getallCategoryPost: function(){
				if(this.$route.params.catid != null){
					this.$store.dispatch('getPostByCatId', this.$route.params.catid);
				}else{
					this.$store.dispatch("allBlogPost");
				}
			},
		},
		watch:{
			$route(to, from){
				this.getallCategoryPost();
			}
		}
	}
</script>
