<template id="single-location">
	<div v-if="post" class="post-list-wrap" >
		
		<div class="single-post" >
<!--
			<div class="location-banner" :style="{ 'background-image' : 'url(' + post.acf.single_location_banner_image.url + ')' }">
				asdf
			</div>
-->
			
		</div><!-- single-post -->
		
		<div class="single-list-details">
		<div class="single-list-content">
			<div class="loc-name">{{post.title.rendered}}</div>
			<div class="loc-addr">{{post.acf.location_address}} {{post.acf.location_city}},<br> {{post.acf.state}} {{post.acf.location_zip_code}}</div>
			<div class="loc-dirc"><a :href="post.acf.location_google_maps_link" target="_blank">GET DIRECTIONS</a></div>
			<h3>CONTACT US</h3>
			<div class="loc-phone"><a :href="'tel:'+ post.acf.location_phone_number">{{post.acf.location_phone_number}}</a></div>
			<div class="loc-social-wrap">
				<a class="facebook" :href="post.acf.location_facebook_url" target="_blank">
					<img src="http://localhost/rubicon-vue/store-locator/fb.svg"/>
				</a>
				<a class="instagram" :href="post.acf.location_instagram_url" target="_blank">
					<img src="http://localhost/rubicon-vue/store-locator/instagram.svg"/>
				</a>
				<a class="twitter" :href="post.acf.location_twitter_url" target="_blank">
					<img src="http://localhost/rubicon-vue/store-locator/twitter.svg"/>
				</a>
			</div>
			<h3>HOURS</h3>
			<div class="loc-hours">{{post.acf.hours_of_operation}}</div>

			<router-link class="loc-menu-link" :to="{name: 'locationMenu2', params: {parentName: post.slug ,postName: post.acf.menu_page.post_name, menuPageID: post.acf.menu_page.ID}}">View Menu</router-link>
 <!-- <router-link :to="{name: 'locationSingle', params: {postName: post.acf.catering_page_id.post_name, pageID: post.acf.catering_page_id.ID}}">View Catering</router-link> -->
			
			
		</div>
	</div>
		
		<div class="loader" style="display: none;">
			<img src="<?php bloginfo('template_url') ?>/three-dots.svg" />
		</div>
	</div><!-- post-list-wrap -->
</template>