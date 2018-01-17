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
				<router-link v-on:click.native="scrollTop" to="/rubicon-vue/">
					<img src="<?php bloginfo('template_url') ?>/images/rubicon_logo.svg" alt="logo-placeholder" width="350" height="130" />
					<img style="display: none" src="<?php bloginfo('template_url') ?>/images/dd.svg" alt="dapperman" height="130" />
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
				<li><router-link v-on:click.native="scrollTop" to="/rubicon-vue/locations">Locations</router-link></li>
				<li><router-link v-on:click.native="scrollTop" to="/rubicon-vue/">Menu</router-link></li>
				<li><router-link v-on:click.native="scrollTop" to="/rubicon-vue/posts">Catering</router-link></li>
				<li>
					<div class="social-icons">
						<a class="facebook" href="" target="_blank">
							<?php echo file_get_contents(get_template_directory()."/images/fb.svg"); ?>
						</a>
						<a class="instagram" href="" target="_blank">
							<?php echo file_get_contents(get_template_directory()."/images/instagram.svg"); ?>
						</a>
						<a class="twitter" href="" target="_blank">
							<?php echo file_get_contents(get_template_directory()."/images/twitter.svg"); ?>
						</a>
					</div><!-- social-icons -->
				</li>
			</ul>
			
		</div><!-- menu -->
		
	</div><!-- top-header-wrap -->
<div class="main-content-wrap">
	<transition name="fade">
		<router-view></router-view>
	</transition>
</div><!-- main-content-wrap -->

<div class="footer">
	<div class="inner-wrap">
		<div class="social-icons">
			<a class="facebook" href="" target="_blank">
				<?php echo file_get_contents(get_template_directory()."/images/fb.svg"); ?>
			</a>
			<a class="instagram" href="" target="_blank">
				<?php echo file_get_contents(get_template_directory()."/images/instagram.svg"); ?>
			</a>
			<a class="twitter" href="" target="_blank">
				<?php echo file_get_contents(get_template_directory()."/images/twitter.svg"); ?>
			</a>
		</div><!-- social-icons -->
		<div class="footer-menu">
			<ul>
				<li><a href="" target="_blank">Order Online</a></li>
				<li><router-link v-on:click.native="scrollTop" to="/rubicon-vue/locations">Locations</router-link></li>
				<li><router-link v-on:click.native="scrollTop" to="/rubicon-vue/menu">Menu</router-link></li>
				<li><router-link v-on:click.native="scrollTop" to="/rubicon-vue/catering">Catering</router-link></li>
			</ul>
		</div><!-- footer-menu -->
		<div class="copyright">
			<button class="contact-form-toggle">Leave A Comment</button>
			<span>2018 Rubicon Deli</span>
		</div><!-- copyright -->
	</div><!-- inner-wrap -->
</div><!-- footer -->

</div><!-- app -->

<?php include(get_template_directory().'/templates/homepage.php'); ?>

<?php include(get_template_directory().'/templates/post-list.php'); ?>

<?php include(get_template_directory().'/templates/post-single.php'); ?>

<?php include(get_template_directory().'/templates/location-finder.php'); ?>
<?php include(get_template_directory().'/templates/single-location.php'); ?>
<?php include(get_template_directory().'/templates/single-menu.php'); ?>










<?php if ( $_SERVER["SERVER_ADDR"] = '::1' ) { ?>
  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<?php } ?>


<?php get_footer(); ?>