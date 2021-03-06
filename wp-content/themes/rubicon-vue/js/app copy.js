var App = Vue.extend({});


var postList = Vue.extend({
	
	template: "#post-list-template",
	
	data: function(){
		
		return {
			posts: ''
		}
		
	},
	
	ready: function(){
		posts = this.$resource('wp-json/wp/v2/posts');
		posts.get(function(posts){
			this.$set('posts', posts);
		})
	}
	
})



var router = new VueRouter();




router.map({
	'/' : {
		component: postList
	}
});




router.start(App, '#app')