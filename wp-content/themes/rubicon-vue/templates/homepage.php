<template id="home-template">
	<div class="inner-wrap">
		
		<div class="slider-wrap">
			<img src="<?php bloginfo('template_url') ?>/images/1920x785.png" alt="1920x785" width="1920" height="785" />
		</div><!-- slider-wrap -->
		
		<div class="learn-more">
			<img src="<?php bloginfo('template_url') ?>/images/dd.svg" alt="dapperman" width="63" height="94" />
			<span>Learn More</span>
			<img class="bounce" src="<?php bloginfo('template_url') ?>/images/learn-more-arrow.jpg" alt="learn-more-arrow" width="31" height="20" />
		</div><!-- learn-more -->
		
		<div class="welcome-wrap">
			<div class="inner-wrap">
				<h1>About/Welcome <span>Title Verbiage</span></h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde 
				</p>
			</div><!-- inner-wrap -->
		</div><!-- welcome-wrap -->
		
		<div class="locations-title-wrap">
			<h2>Locations Title <span>Lorem Ipsum Dolor</span></h2>
		</div><!-- locations-title-wrap -->
		
		<div class="locations-content-wrap">
			<div class="inner-wrap">
				<p>Lorem ips um dolor sit amet, co nsec tetur adip isnicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
				<router-link v-on:click.native="scrollTop" to="/rubicon-vue/locations">Find A Location</router-link>
			</div><!-- inner-wrap -->
		</div><!-- location-content-wrap -->
		
		<div class="menu-type-wrap">
			<div class="inner-wrap">
				<div class="left">
					<div class="banner">
						<img src="<?php bloginfo('template_url') ?>/images/menu-banner.jpg" alt="menu-banner" width="675" height="440" />
					</div><!-- banner -->
					<div class="title">
						Menu Title
					</div><!-- title -->
					<div class="content">
						Lorem ip sum dolor sit am et, co nsectetur adi pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</div><!-- content -->
					<router-link v-on:click.native="scrollTop" to="/rubicon-vue/">View Menu</router-link>
				</div><!-- left -->
				<div class="right">
					<div class="banner">
						<img src="<?php bloginfo('template_url') ?>/images/catering-banner.jpg" alt="menu-banner" width="675" height="440" />
					</div><!-- banner -->
					<div class="title">
						Catering Title
					</div><!-- title -->
					<div class="content">
						Lorem ip sum dolor sit am et, co nsectetur adi pisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</div><!-- content -->
					<router-link v-on:click.native="scrollTop" to="/rubicon-vue/">View Catering</router-link>
				</div><!-- right -->
			</div><!-- inner-wrap -->
		</div><!-- menu-type-wrap -->
		
	</div><!-- inner-wrap -->
</template><!-- home-template -->