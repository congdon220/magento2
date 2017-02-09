require(['jquery'],function(){
	jQuery(window).scroll(function() {    
	   var scroll = jQuery(window).scrollTop();
	    //console.log(scroll);
	   if (scroll >= 31) {
	       //console.log('a');
	       //jQuery(".header-wrapper > .block-static-block").addClass("header-pin-content");
	       jQuery(".header-wrapper").addClass("header-pin");
	       
	   } else {
	       //console.log('a');
	       //jQuery(".header-wrapper > .block-static-block").removeClass("header-pin-content");
	       jQuery(".header-wrapper").removeClass("header-pin");
	       
	   }
	});
});