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

    },
    methods: {
	    scrollTop: function() {
		    var $root = $('html, body');
		    $root.animate({
	        scrollTop: $('body').offset().top
	    }, 500);
	    return false;
	    }
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
    props: ["locationFinder","menuFinder","cateringFinder"],
    data: function(){
	    return {
		    messages: [],
		    loading: true,
		    spinner: false,
		    listTemplateUrl: 'http://localhost/rubicon-vue/store-locator/plugins/storeLocator/templates/location-list-description.html'
		  }
    },
    mounted: function(){
	   var vm = this;
		 	
	      $(this.$el).storeLocator({
					'dataType': 'json',
					'dataLocation': 'http://localhost/rubicon-vue/wp-json/wp/v2/pages/?parent=5',
					'autoGeocode': false,
					'geocodeID': 'get-geo',
					'listTemplatePath': 'http://localhost/rubicon-vue/store-locator/plugins/storeLocator/templates/location-list-description.html',
					//'loadingContainer': 'location-loader',
					'sessionStorage': false,
					'loading': true,
					callbackSuccess: function(){
						
						var $root = $('html, body');
						$root.animate({
							scrollTop: $('.bh-sl-loc-list').offset().top -174
	    			}, 500);
						// Whatever you want here
						console.log('map loaded');
						$('.loader').hide();
/*
						Vue.nextTick(function () {
							console.log('fuck') // => 'updated'
							//hack non-vue added links to work
							$('a').click(function(){
								var linkHref = $(this).attr('href');
								var linkPageID = $(this).data('page-id');
								console.log(linkPageID);
								event.preventDefault();
      				  window.load(linkHref);
							})

      			});
*/
      			
					}
				});
				
			
		
				this.loading = false;
    },
		methods: {
			greet: function (event) {
				
        $('.loader').show();
				this.spinner = true;
				return false;
				console.log('hello');
			}
		}
});

var singleLocationMenu = Vue.component('single-location-menu', {
		props: ["postName","locationPageID","parentName","menuPageID","cateringPageID"],
    template: '#single-location-menu',
		data: function () {
		  return {
		    loading: false,
		    post: null,
		    error: null,
		    meta_title:null,
		    isSandwich: true,
		    isSalads: false,
		    divId: null
		  }
		},
		created: function(){

			function getParameterByName(name, url) {
			    if (!url) url = window.location.href;
			    name = name.replace(/[\[\]]/g, "\\$&");
			    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
			        results = regex.exec(url);
			    if (!results) return null;
			    if (!results[2]) return '';
			    return decodeURIComponent(results[2].replace(/\+/g, " "));
			}

		var menuID = getParameterByName('id');
			//var menuID = query.get('id');
			console.log('page-var= ' + this.menuPageID);
			console.log('global_page_id=' +global_page_id);
			//get full post object
			
			 if(this.menuPageID){
	 			axios.get('/rubicon-vue/wp-json/wp/v2/pages/' + this.menuPageID).then(response => this.post = response.data).then(function (response) {
				console.log(response);
				//set timeout so that waypoint waits until page has loaded before looking for element.
				setTimeout(function(){ 
					var sticky = new Waypoint.Sticky({
						element: $('#menu-navigation-wrap')[0]
					});	
					}, 1000);
			});
			 } else if (this.cateringPageID){ 
				 	axios.get('/rubicon-vue/wp-json/wp/v2/pages/' + this.cateringPageID).then(response => this.post = response.data).then(function (response) {
				console.log(response);
				//set timeout so that waypoint waits until page has loaded before looking for element.
				setTimeout(function(){ 
					var sticky = new Waypoint.Sticky({
						element: $('#menu-navigation-wrap')[0]
					});	
					}, 1000);
			});
			 } else {
				axios.get('/rubicon-vue/wp-json/wp/v2/pages/' + global_page_id).then(response => this.post = response.data).then(function (response) {
				console.log(response);
				
				//set timeout so that waypoint waits until page has loaded before looking for element.
				setTimeout(function(){ 
					var sticky = new Waypoint.Sticky({
						element: $('#menu-navigation-wrap')[0]
					});	
					}, 1000);
				
			});
 		  }	
		},
		methods: {
			
			scrollMenu: function(){
				var $root = $('html, body');
						$root.animate({
							scrollTop: $('.menu-scroll-anchor').offset().top -184
	    			}, 500);
			},
				
	    //toggle menu
	    toggleVisibility: function(divId) {
				var divs = ["sandwich-wrap", "salads-wrap", "soups-wrap", "whipper-snappers-wrap", "brews-wrap", "drinks-wrap", "sides-wrap", "sweet-tooth-wrap", "dapper-deals-wrap"];
				var visibleDivId = null;

				console.log(divId);
			  if(visibleDivId === divId) {
			    //visibleDivId = null;
			  } else {
			    visibleDivId = divId;
			  }
			  hideNonVisibleDivs();
			
				function hideNonVisibleDivs() {
				  var i, divId, div;
				  for(i = 0; i < divs.length; i++) {
				    divId = divs[i];
				    div = document.getElementById(divId);
				    if(visibleDivId === divId) {
				      div.style.display = "block";
				      div.classList.add("active");
				      
				      //begin fadeIn
				      function fadeIn(div, display){
							  div.style.opacity = 0;
							  div.style.display = display || "block";
							
							  (function fade() {
							    var val = parseFloat(div.style.opacity);
							    if (!((val += .1) > 1)) {
							      div.style.opacity = val;
							      requestAnimationFrame(fade);
							    }
							  })();
							}
							fadeIn(div);
				      //end fadeIn
				    } else {
				      div.style.display = "none";
				      div.classList.remove("active");
				      
				      //begin fadeOut
				      function fadeOut(div){
							  div.style.opacity = 1;
							
							  (function fade() {
							    if ((div.style.opacity -= .1) < 0) {
							      div.style.display = "none";
							    } else {
							      requestAnimationFrame(fade);
							    }
							  })();
							}
							fadeOut(div);
							//end fadeOut
				    }
				  }
				}
	    }
    }
});


var singleLocation = Vue.component('single-location', {
    template: '#single-location',
    props: ["postName","locationPageID","parentName"],
		data: function () {
		  return {
		    loading: false,
		    post: null,
		    error: null,
		    meta_title:null
		  }
		},
		created: function(){
			 
			var vm = this;
			console.log(this.postName);
			
			function getParameterByName(name, url) {
    		if (!url) url = window.location.href;
    		name = name.replace(/[\[\]]/g, "\\$&");
    		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    		    results = regex.exec(url);
    		if (!results) return null;
    		if (!results[2]) return '';
    		return decodeURIComponent(results[2].replace(/\+/g, " "));
			}
			
			var menuID = getParameterByName('id');
			//var menuID = query.get('id');
			console.log('created');
			//get full post object
/*
			axios.get('/rubicon-vue/wp-json/wp/v2/pages/' + global_page_id).then(response => this.post = response.data).then(function (response) {
				console.log(response);
			});
*/		
			if(this.locationPageID){
				axios.get('/rubicon-vue/wp-json/wp/v2/pages/' + this.locationPageID).then(response => this.post = response.data).then(function (response) {
					console.log(response);
				});
 			} else{	
			axios.get('/rubicon-vue/wp-json/wp/v2/pages/' + global_page_id).then(response => this.post = response.data).then(function (response) {
				console.log(response);
			});
 			}
			
				
		}
});




//router
var router = new VueRouter({
		mode:'history',
    routes: [
        { path: '/rubicon-vue/', component: home },
        { path: '/rubicon-vue/posts', component: postLists },
        { path: '/rubicon-vue/posts/:parent_id', name: 'post', component: post },
        { path: '/rubicon-vue/locations', name: 'location', component: locationfinder , props: { default: true,locationFinder: true, menuFinder: false, cateringFinder:false }},
        { path: '/rubicon-vue/menus', name: 'location2', component: locationfinder , props: { default: true,locationFinder: false, menuFinder: true, cateringFinder:false }},
        { path: '/rubicon-vue/catering-finder', name: 'location3', component: locationfinder , props: { default: true,locationFinder: false, menuFinder: false, cateringFinder:true }},
        { path: '/rubicon-vue/locations/:postName', name: 'locationSingle', component: singleLocation , props: true},
        { path: '/rubicon-vue/locations/:parentName/:postName', name: 'locationMenu2', component: singleLocationMenu , props: true },
        { path: '/rubicon-vue/locations/:parentName/:postName', name: 'cateringMenu', component: singleLocationMenu , props: true }
        //,{ path: '/rubicon-vue/locations/*', name: 'locationMenu', component: singleLocationMenu }
    ]
});

/*
router.beforeEach((to, from, next) => {
	
  document.title = to.meta.title
  next();
  
});
*/

new Vue({
    el: '#app',
    router: router,
    created: function(){
	    $('body').addClass('fadein');
	    //var global_page_id_set = global_page_id;
    },
    methods: {
	    //scroll page to top after clikcing a link
	    scrollTop: function() {
		    var $root = $('html, body');
		    $root.animate({
	        scrollTop: $('body').offset().top
	    }, 500);
	    return false;
	    }
	    
    }
    

});

