jQuery(document).ready(function($) {
  
	
  
	//Masked image hover-fades.
	$(".title-link").hover(
	function() {
		$(this).children(".masked-image-wrapper").children(".image-mask").fadeTo(600, 0);
	},
	function() {
		$(this).children(".masked-image-wrapper").children(".image-mask").fadeTo(600, 0.4);
	}
	);
	
	
	
	
	$(".featured-items, .featured-section, .featured-works").fadeIn(1500);
	
	
	
	
	
	
	
	
	
  
  
  
});