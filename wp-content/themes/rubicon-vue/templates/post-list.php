<template id="post-list-template">
	<div class="post-list-wrap">
	 <div class="single-post" v-for="post in posts">
			<div>{{ post.title.rendered }}</div>
			<div class="repeater-item" v-for="field in post.acf.repeater">
				{{field.text}}<br>
				<img :src="field.image.sizes.thumbnail"/>
			</div><!-- repeater-item -->
			<router-link :to="{ name: 'post', params: { postID: post.id }}">
        Read More
      </router-link>
		</div><!-- single-post -->
	</div><!-- post-list-wrap -->
</template>
