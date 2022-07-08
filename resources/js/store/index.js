export default{
	state:{
		category: [],
		post: [],
		blogpost: [],
		singlepost: [],
	},
	getters:{
		getCategory(state){
			return state.category
		},
		getPost(state){
			return state.post
		},
		getBlogPost(state){
			return state.blogpost
		},
		getSinglePost(state){
			return state.singlepost
		}
	},
	actions:{
		allCategory(context){
			axios.get('/api/allcategory')
				.then(function (response){
					context.commit('categories', response.data)

				}.bind(this));
		},
		allPost(context){
			axios.get('/api/allpost')
				.then(function (response){
					context.commit('posts', response.data)

				}.bind(this));
		},
		allBlogPost(context){
			axios.get('/api/allblogpost')
				.then(function (response){
					//this.categories = response.data;
					//console.log(response.data)
					context.commit('blogposts', response.data)

				}.bind(this));
		},
		getPostById(context, postId){
			//console.log("post id ", postId);
			axios.get('/api/singlepost/'+postId)
				.then(function (response){
					//this.categories = response.data;
					//console.log(response)
					context.commit('singlepost', response.data)

				}.bind(this));
		},
		getPostByCatId(context, catId){
			//console.log("cat id ", catId);
			axios.get('/api/categorypost/'+catId)
				.then(function (response){
					//this.categories = response.data;
					//console.log(response)
					context.commit('getPostByCatId', response.data)

				}.bind(this));
		},
		SearchPost(context, search){
			axios.get('/search?s='+search)
				.then( (response) => {
					context.commit('getSearchPost', response.data)
				});
		},
	}, 
	mutations:{
		categories(state, data){
			return state.category = data
		},
		posts(state, data){
			return state.post = data
		},
		blogposts(state, data){
			return state.blogpost = data
		},
		singlepost(state, data){
			return state.singlepost = data
		},
		getPostByCatId(state, data){
			state.blogpost = data
		},
		getSearchPost(state, data){
			state.blogpost = data
		},
	}
}