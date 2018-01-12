<?php get_header(); ?>



<div id="app">
<!-- 	<div class="sticky-fix" style="height: 1px"></div> -->
	<div class="top-header-wrap">
		<div class="inner-wrap">
			<div class="left">
				<div class="menu-icon-wrap">
				<div class="menu-icon" href="#">
					<span></span>
					<span></span>
					<span></span>
				</div><!-- menu-icon -->
			</div><!-- menu-icon-wrap -->
			</div><!-- left -->
			<div class="middle">
				<div class="logo">
				<router-link to="/rubicon-vue/">
					<img src="<?php bloginfo('template_url') ?>/images/rubicon_logo.svg" alt="logo-placeholder" width="222" height="83" />
					<img src="<?php bloginfo('template_url') ?>/images/dd.svg" alt="dapperman" width="63" height="94" />
				</router-link>
			</div><!-- logo -->
			</div><!-- middle -->
			<div class="right">
				<div class="order-online">
					<a href="" target="_blank">Order Online</a>
				</div><!-- order-online -->
			</div><!-- right -->
			
			
			
		</div><!-- inner-wrap -->
		
		<div class="menu">
			<ul>
				<li><router-link to="/rubicon-vue/locations">Locations</router-link></li>
				<li><router-link to="/rubicon-vue/">Menu</router-link></li>
				<li><router-link to="/rubicon-vue/posts">Catering</router-link></li>
				<li>
					<div class="social-links">
						<a href="" target="_blank"><img src="<?php bloginfo('template_url') ?>/images/fb.svg" width="21" height="44"/></a>
					</div><!-- social-links -->
				</li>
			</ul>
			
		</div><!-- menu -->
		
	</div><!-- top-header-wrap -->
	
<transition name="fade">
	<router-view></router-view>
</transition>



</div><!-- app -->

<?php include(get_template_directory().'/templates/homepage.php'); ?>

<?php include(get_template_directory().'/templates/post-list.php'); ?>

<?php include(get_template_directory().'/templates/post-single.php'); ?>

<?php include(get_template_directory().'/templates/location-finder.php'); ?>










<?php if ( $_SERVER["SERVER_ADDR"] = '::1' ) { ?>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<?php } ?>


<?php get_footer(); ?>