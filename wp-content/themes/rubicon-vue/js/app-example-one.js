
new Vue ({
	
	el: '#app',
	router: router,
	data: {
		
		posts: []
		
	},
	
	//makes the ajax request when vue instance is loaded
	created() {
		
		//consume wordpress API and load response into data object
		axios.get('/WP-VUE-STARTER/wp-json/wp/v2/posts').then(response => this.posts = response.data);
		
	}
	


	
	
})	
/*
Vue.component('post-list', {
  template: '#post-list-template',
  data: function() {
      return{
          posts: []
      }
  },
  created: function () {
     axios.get('/WP-VUE-STARTER/wp-json/wp/v2/posts').then(response => console.log());

  }
  

});
*/

var router = new VueRouter({
	    mode: 'history',
	    routes: [
	        { path: '/', name: 'home', template: '<div>Hi Roy.</div>' },
	        { path: '/posts', name: 'posts', component: posts },
	        { path: '/posts/:id', name: 'post', component: post },
	    ]
});

new Vue({
  el: '#app'
})