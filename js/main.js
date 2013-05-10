jQuery(document).ready(function($) {
  
	
  
	
	$(".title-link").hover(
	function() {
		$(this).children(".masked-image-wrapper").children(".image-mask").fadeTo(600, 0);
	},
	function() {
		$(this).children(".masked-image-wrapper").children(".image-mask").fadeTo(600, 0.4);
	}
	);
	
	
	
	
	
	
	
	
	
	
  
  
  
});