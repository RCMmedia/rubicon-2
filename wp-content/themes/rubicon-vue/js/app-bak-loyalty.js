//show homepage content
var home = Vue.component('home-page', {
    template: '#home-template'
});

//show list of posts
var postLists = Vue.component('post-list', {
		template: '#post-list-template',
    data: function () {
        return {
            posts:[],
        }
    },
    created: function(){
        axios.get('/WP-VUE-STARTER/wp-json/wp/v2/posts').then(response => this.posts = response.data);
    }
});

//show single post
var post = Vue.component('post', {
	template: '#post-single-template',
	data: function () {
    return {
      loading: false,
      post: null,
      error: null
    }
  },
  	created: function(){
  			axios.get('/WP-VUE-STARTER/wp-json/wp/v2/posts/' + this.$route.params.postID).then(response => this.post = response.data);
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
	    //pageTitle: "Rubicon locations"
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
/*
				
				function doSomethingOnSuccess() {
					// Whatever you want here
					console.log('map loaded')
				}
				
				$(this.$el).storeLocator({
					callbackMapSet: doSomethingOnSuccess()
				});
				
*/
				this.loading = false;
				
/*
				$("#get-geo").click(function() {
					$('body').addClass('LFG');
				});
*/
    },
		computed: {
			greet: function (event) {
				$('.loader').show();
				this.spinner = true;
				return false;
			}
			
		}
});

//show loyalty content
var loyalty = Vue.component('loyalty', {
    template: '#loyalty-wrapper',
    data: function() {
	    return {
		    loading: true,
  	  	scanner: null,
  	  	activeCameraId: null,
  	  	cameras: [],
  	  	scans: []
  	  }
  	},
  	mounted: function () {
  	  var self = this;
  	  self.scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });
  	  self.scanner.addListener('scan', function (content, image) {
  	    self.scans.unshift({ date: +(Date.now()), content: content });
  	  });
  	  Instascan.Camera.getCameras().then(function (cameras) {
  	    self.cameras = cameras;
  	    if (cameras.length > 0) {
  	      self.activeCameraId = cameras[0].id;
  	      self.scanner.start(cameras[0]);
  	    } else {
  	      console.error('No cameras found.');
  	    }
  	  }).catch(function (e) {
  	    console.error(e);
  	  });
  	},
  	methods: {
  	  formatName: function (name) {
  	    return name || '(unknown)';
  	  },
  	  selectCamera: function (camera) {
  	    this.activeCameraId = camera.id;
  	    this.scanner.start(camera);
  	  }
  	}
});

//router
var router = new VueRouter({
	mode:'history',
    routes: [
        { path: '/', component: home },
        { path: '/posts', component: postLists },
        { path: '/posts/:postID', name: 'post', component: post },
        { path: '/locations', name: 'location', component: locationfinder },
        { path: '/loyalty', name: 'loyalty', component: loyalty }
    ]
});

new Vue({
    el: '#app',
    router: router,
    created: function(){
	    $('body').addClass('fadein');
    }
    

});

