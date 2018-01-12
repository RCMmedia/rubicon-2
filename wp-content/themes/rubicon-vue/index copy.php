<?php get_header(); ?>



<div id="app">
	<div class="nav">
		<ul>
			<li><router-link to="/rubicon-vue/">Home</router-link></li>
			<li><router-link to="/rubicon-vue/posts">Posts</router-link></li>
			<li><router-link to="/rubicon-vue/locations">Locations</router-link></li>
<!-- 			<li><router-link to="/loyalty">loyalty</router-link></li> -->
		</ul>
	</div>
	
<transition name="fade">
	<router-view></router-view>
</transition>



</div><!-- app -->

<?php include(get_template_directory().'/templates/homepage.php'); ?>

<template id="post-list-template">
	<div class="post-list-wrap">
	 <div class="single-post" v-for="post in posts">
			<div>{{ post.title.rendered }}</div>
<!--
			<div class="repeater-item" v-for="field in post.acf.repeater">
				{{field.text}}<br>
				<img :src="field.image.sizes.thumbnail"/>
			</div>
--><!-- repeater-item -->
			<router-link :to="{ name: 'post', params: { postID: post.id }}">
        Read More
      </router-link>
		</div><!-- single-post -->
	</div><!-- post-list-wrap -->
</template>


<template id="post-single-template">
  
	<div v-if="post" class="post-list-wrap" >
	 <div class="single-post" >
		 
			<div>{{ post.title.rendered }}</div>
			<div class="repeater-item" v-for="field in post.acf.repeater">
				{{field.text}}<br>
				<img :src="field.image.sizes.thumbnail"/>
			</div><!-- repeater-item -->
		</div><!-- single-post -->
		
		<div class="loader" style="display: none;">
			<img src="<?php bloginfo('template_url') ?>/three-dots.svg" />
		</div>
	</div><!-- post-list-wrap -->
	
</template>

<template id="location-finder-wrap" v-once>

	<div v-if="!loading" class="bh-sl-container">

  	<div id="page-header">
  	  <h1 class="bh-sl-title" >{{ pageTitle }}</h1>
  	  <button id="get-geo" v-on:click="greet($event)">get current location</button>
  	  <p>will display a list of the closest rubicon based on zip code</p>
  	</div><!-- page-header -->

    <div class="bh-sl-form-container">
      <form id="bh-sl-user-location" method="post" action="#">
      	<div class="form-input">
          <label for="bh-sl-address">Enter Address or Zip Code:</label>
          <input type="text" id="bh-sl-address" name="bh-sl-address" />
        </div><!-- bh-sl-user-location -->

        <button id="bh-sl-submit" type="submit" v-on:click="greet($event)">Submit</button>
      </form>
    </div><!-- bh-sl-form-container -->
		
		<div class="loader" style="display: none;">
			<img src="<?php bloginfo('template_url') ?>/three-dots.svg" />
		</div><!-- loader -->
    
    <div id="bh-sl-map-container" class="bh-sl-map-container">
    	<div id="bh-sl-map" class="bh-sl-map"></div>
      <div class="bh-sl-loc-list">
      	<ul class="list"></ul>
      </div><!-- bh-sl-loc-list -->
    </div><!-- bh-sl-map-container -->
  </div><!-- bh-sl-container -->
    
    
</template>

<template id="loyalty-wrapper">
	<div  class="loyalty-inner">
		<h1><!-- loyalty rewards stuff --></h1>
		<div class="sidebar">
    	<section class="cameras">
    	  <h2>Cameras</h2>
    	  <ul>
    	    <li v-if="cameras.length === 0" class="empty">No cameras found</li>
    	    <li v-for="camera in cameras">
    	      <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
    	      <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
    	        <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
    	      </span>
    	    </li>
    	  </ul>
    	</section>
      <section class="scans">
        <h2>Scans</h2>
        <ul v-if="scans.length === 0">
          <li class="empty">No scans yet</li>
        </ul>
        <transition-group name="scans" tag="ul">
          <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
        </transition-group>
      </section>
    </div><!-- sidebar -->
    <div class="preview-container">
      <video id="preview"></video>
    </div><!-- preview-container -->

	</div><!-- loyalty-inner -->
</template>







<?php if ( $_SERVER["SERVER_ADDR"] = '::1' ) { ?>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<?php } ?>


<?php get_footer(); ?>