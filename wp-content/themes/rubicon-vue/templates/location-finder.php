<template id="location-finder-wrap">

	<div v-if="!loading" v-bind:class="{ 'menu-finder': menuFinder == true || cateringFinder == true }" class="locations-wrap bh-sl-container">
		
  	<div id="page-header" class="page-header">
	  	
	  	<div class="inner-wrap">
		  	
   	  	<h1 v-if="locationFinder !== false" class="locations-title bh-sl-title" >FIND A RUBICON<span>LOCATION NEAR YOU!</span></h1>
   	  	<h1 v-else-if="menuFinder !== false" class="locations-title bh-sl-title" >FIND A RUBICON<span>MENU NEAR YOU!</span></h1>
   	  	<h1 v-else-if="cateringFinder !== false || menuFinder == false" class="locations-title bh-sl-title" >FIND A RUBICON<span>CATERING NEAR YOU!</span></h1>
   	  	
   	  	<div class="bh-sl-form-container">
    		  <form id="bh-sl-user-location" method="post" action="#">
	    		  <label for="bh-sl-address">Enter Address or Zip Code</label>
    		  	<div class="form-input">
    		      <input type="text" id="bh-sl-address" name="bh-sl-address" />
    		      <button id="bh-sl-submit" type="submit" v-on:click="greet($event)">GO</button>
    		    </div><!-- form-input -->
    		  </form><!-- bh-sl-user-location -->
    		</div><!-- bh-sl-form-container -->
    		
	 			<button id="get-geo" v-on:click="greet">or use current location</button>
	  	</div><!-- inner-wrap -->
	  	
	  	<div class="loader" style="display: none;position: absolute;bottom: 20px;">
				<img src="<?php bloginfo('template_url') ?>/three-dots.svg" />
			</div><!-- loader -->
  	</div><!-- page-header -->
    
    <div id="bh-sl-map-container" class="bh-sl-map-container">
    	<div id="bh-sl-map" class="bh-sl-map"></div>
      <div class="bh-sl-loc-list">
      	<ul class="list"></ul>
      </div><!-- bh-sl-loc-list -->
    </div><!-- bh-sl-map-container -->
    
  </div><!-- locations-wrap -->
    
    
</template>