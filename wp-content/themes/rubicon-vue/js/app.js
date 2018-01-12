//possible fix for rendering the meta tags of a site, which should be inherited by prerender.io
//created: function() {  
//  document.title = 'New Title'  
//  document.head.querySelector('meta[name=description]').content = 'New Description'  
//}


//show homepage content
var home = Vue.component('home-page', {
    template: '#home-template',
    created: function() {
	      document.title = 'Rubicon Deli Vue'  
				document.head.querySelector('meta[name=description]').content = 'This is where we will put the description'  

    }
});

//show list of posts
var postLists = Vue.component('post-list', {
		template: '#post-list-template',
    data: function () {
        return {
            posts:[]
        }
        
    },
    created: function(){
        axios.get('/rubicon-vue/wp-json/wp/v2/posts').then(response => this.posts = response.data);
        document.title = 'Post List View | Rubicon Deli Vue'  
				document.head.querySelector('meta[name=description]').content = 'This is where we will put the description'
    }
});

//show single post
var post = Vue.component('post', {
	template: '#post-single-template',
	data: function () {
    return {
      loading: false,
      post: null,
      error: null,
      meta_title:null
    }
  },
  	created: function(){
	  	//get post meta info
	  	axios.get('/rubicon-vue/wp-json/wp/v2/posts/' + this.$route.params.postID).then(response => this.meta_title = response.data.title.rendered) .then(function (response) {
				
				//console.log(response);
    
				//set meta tags
				document.title = response;
				//document.head.querySelector('meta[name=description]').content = 'Need to create REST endpoint for Yoast description and title etc'
  		});
			
			//get full post object
			axios.get('/rubicon-vue/wp-json/wp/v2/posts/' + this.$route.params.postID).then(response => this.post = response.data) .then(function (response) {
				console.log(response);
  		});
				
  	}
});

//show locations finder
var locationfinder = Vue.component('location-finder', {
    template: '#location-finder-wrap',
    data: function(){
	    return {
		    pageTitle: "Locations",
		    loading: true,
		    spinner: false
		  }
    },
    mounted: function(){
	   var vm = this

	      $(this.$el).storeLocator({
					'dataType': 'json',
					'dataLocation': 'data/locations.json',
					'autoGeocode': false,
					'geocodeID': 'get-geo',
					//'loadingContainer': 'location-loader',
					'sessionStorage': false,
					'loading': true,
					callbackMapSet: function(){
						// Whatever you want here
						console.log('map loaded');
						$('.loader').hide();
					}
				});
		
				this.loading = false;
    },
		computed: {
			greet: function (event) {
				$('.loader').show();
				this.spinner = true;
				return false;
			}
			
		}
});


//router
var router = new VueRouter({
		mode:'history',
    routes: [
        { path: '/rubicon-vue/', component: home },
        { path: '/rubicon-vue/posts', component: postLists },
        { path: '/rubicon-vue/posts/:postID', name: 'post', component: post },
        { path: '/rubicon-vue/locations', name: 'location', component: locationfinder }
    ]
});

new Vue({
    el: '#app',
    router: router,
    created: function(){
	    $('body').addClass('fadein');
    }
    

});

