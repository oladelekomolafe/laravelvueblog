<template>
	<span id="singleblog">
		<section id="breadcrumbs" class="breadcrumbs">
	      <div class="container">

	        <div class="d-flex justify-content-between align-items-center">
	          <h2>Blog Single</h2>
	          <ol>
	            <li><a href="index.html">Home</a></li>
	            <li>Blog</li>
	            <li>Blog Single</li>
	          </ol>
	        </div>

	      </div>
	    </section>
		<section id="blog" class="blog">

		    <div class="container aos-init aos-animate" data-aos="fade-up">

		        <div class="row">

		          <div class="col-lg-8 entries">

		            <article v-if="getSinglePost" class="entry">

		              <div class="entry-img">
		               <!--  <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"> -->
		               <img :src="getSinglePost.photo" class="img-fluid" style="width:100%;" />
		              </div>

		              	<h2 class="entry-title">
		                	<a href="blog-single.html">{{getSinglePost.title}}</a>
		              	</h2>

		              	<div class="entry-meta">
							<ul>
								<li class="d-flex align-items-center" v-if="getSinglePost.user"><i class="bi bi-person"></i> <a href="blog-single.html">{{getSinglePost.user.name}}</a></li>
								<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{$dateFormat(getSinglePost.created_at) }}</time></a></li>
								<li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li>
								<li class="d-flex align-items-center" v-if="getSinglePost.category"><i class="bi bi-folder"></i> <a href="blog-single.html">{{getSinglePost.category.cat_name}}</a></li>
							</ul>
						</div>
		              

		              <div class="entry-content">
		                <p v-if="getSinglePost.description">
		                  {{getSinglePost.description }}
		                </p>
		                <div class="read-more">
		                  <!-- <a href="blog-single.html">Read More</a> -->
		                </div>
		              </div>

		            </article><!-- End blog entry -->

		          </div><!-- End blog entries list -->

		          <div class="col-lg-4">

		            <BlogSidebar/>

		          </div><!-- End blog sidebar -->

		        </div>

		    </div>
    
		</section>
	</span>
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
			//this.$store.dispatch("getPostById", this.$route.params.postid) //we are using this to reload the table store state and table data
			this.singlePost();
		},
		computed:{
			/*getallCategory: function(){
				return this.$store.getters.getCategory
			},
			getAllBlogPost: function(){
				return this.$store.getters.getBlogPost
			},*/
			getSinglePost: function(){
				return this.$store.getters.getSinglePost
			},
		},
		components:{
			BlogSidebar,
		},
		methods:{
			singlePost: function(){
				this.$store.dispatch('getPostById', this.$route.params.postid);
			}
		},
		watch:{
			$route(to, from){
				this.singlePost();
			}
		}
	}
</script>
