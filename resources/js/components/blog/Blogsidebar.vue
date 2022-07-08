<template>
	<span id="sidebar">
		<div class="sidebar">

          <h3 class="sidebar-title">Search</h3>
          <div class="sidebar-item search-form">
            <form action="">
              <input @keyup="RealSearch" type="text" v-model="keyword" placeholder="Type Something">
              <button type="submit" @click.prevent="RealSearch"><i class="bi bi-search"></i></button>
            </form>
          </div><!-- End sidebar search formn-->

          <h3 class="sidebar-title">Categories</h3>
          <div class="sidebar-item categories">
            <ul>
              <li v-for="category in getallCategory" :key="category.id">
              	<router-link :to="'/categories/'+category.id" >{{category.cat_name}} <span>(25)</span></router-link>
              </li>
              
            </ul>
          </div><!-- End sidebar categories-->

          <h3 class="sidebar-title">Recent Posts</h3>
          <div v-for="(post, index) in getAllBlogPost" 
          		 class="sidebar-item recent-posts">
            <div v-if='index < max_loop' class="post-item clearfix">
              <router-link :to="'/blogpost/'+post.id" ><img :src="post.photo" /></router-link>
              <h4><router-link :to="'/blogpost/'+post.id" >{{$sortLength(post.title, 100, '...') }}</router-link></h4>
              <time datetime="2020-01-01">{{$dateFormat(post.created_at) }}</time>
            </div>
          </div><!-- End sidebar recent posts-->

          <!-- <h3 class="sidebar-title">Tags</h3>
          <div class="sidebar-item tags">
            <ul>
              <li><a href="#">App</a></li>
              <li><a href="#">IT</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Mac</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Office</a></li>
              <li><a href="#">Creative</a></li>
              <li><a href="#">Studio</a></li>
              <li><a href="#">Smart</a></li>
              <li><a href="#">Tips</a></li>
              <li><a href="#">Marketing</a></li>
            </ul>
          </div> --><!-- End sidebar tags-->

        </div><!-- End sidebar -->
	</span>
</template>

<script>
	export default{
		data(){
			return {
				index: 0,
				max_loop: 5,
				keyword: null,		
			}
		},
		mounted: function (){
			//this.getallCategory();
			this.$store.dispatch("allCategory")
			this.$store.dispatch("allBlogPost") //we are using this to reload the table store state and table data
		},
		computed:{
			getallCategory: function(){
				return this.$store.getters.getCategory
			},
			getAllBlogPost: function(){
				return this.$store.getters.getBlogPost
			},
			/*getSinglePost: function(){
				return this.$store.getters.getSinglePost
			},*/
		},
		components:{
			
		},
		methods:{
			RealSearch: function(){
				this.$store.dispatch('SearchPost', this.keyword);
			}
		},
	}
</script>
