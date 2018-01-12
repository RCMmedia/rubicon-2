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