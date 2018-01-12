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