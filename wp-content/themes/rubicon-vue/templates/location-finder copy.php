<template id="location-finder-wrap" v-once>

	<div v-if="!loading" class="locations-wrap bh-sl-container">
		

  	<div id="page-header" class="page-header">
	  	<div class="inner-wrap">
   	  	<h1 class="locations-title bh-sl-title" >FIND A RUBICON<span>LOCATION NEAR YOU!</span></h1>
   	  	<div class="bh-sl-form-container">
    		  <form id="bh-sl-user-location" method="post" action="#">
	    		  <label for="bh-sl-address">Enter Address or Zip Code</label>
    		  	<div class="form-input">
    		      
    		      <input type="text" id="bh-sl-address" name="bh-sl-address" />
    		      <button id="bh-sl-submit" type="submit" v-on:click="greet($event)">GO</button>
    		    </div><!-- bh-sl-user-location -->
				
    		    
    		  </form>
    		</div><!-- bh-sl-form-container -->
	 			<button id="get-geo" v-on:click="greet($event)">or use current location</button>
	  	</div><!-- inner-wrap -->
  	</div><!-- page-header -->

    
		
		<div class="loader" style="display: none;">
			<img src="<?php bloginfo('template_url') ?>/three-dots.svg" />
		</div><!-- loader -->
    
    <div id="bh-sl-map-container" class="bh-sl-map-container">
    	<div id="bh-sl-map" class="bh-sl-map"></div>
      <div class="bh-sl-loc-list">
      	<ul class="list"></ul>
      </div><!-- bh-sl-loc-list -->
    </div><!-- bh-sl-map-container -->
    
    
  </div><!-- locations-wrap -->
    
    
</template>