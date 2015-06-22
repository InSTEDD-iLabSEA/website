	jQuery(document).ready(function(){
	//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
	//Vertical Sliding
	jQuery('.boxgrid.slidedown').hover(function(){
		jQuery(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
	}, function() {
		jQuery(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
	});
	//Horizontal Sliding
	jQuery('.boxgrid.slideright').hover(function(){
		jQuery(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});
	}, function() {
		jQuery(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
	});
	//Diagnal Sliding
	jQuery('.boxgrid.thecombo').hover(function(){
		jQuery(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
	}, function() {
		jQuery(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
	});
	//Partial Sliding (Only show some of background)
	jQuery('.boxgrid.peek').hover(function(){
		jQuery(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
	}, function() {
		jQuery(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
	});
	//Full Caption Sliding (Hidden to Visible)
	jQuery('.boxgrid.captionfull').hover(function(){
		jQuery(".cover", this).stop().animate({top:'0px'},{queue:false,duration:60});
	}, function() {
		jQuery(".cover", this).stop().animate({top:'79px'},{queue:false,duration:560});
	});
	//Caption Sliding (Partially Hidden to Visible)
	jQuery('.boxgrid.caption').hover(function(){
		jQuery(".cover", this).stop().animate({top:'160px'},{queue:false,duration:60});
	}, function() {
		jQuery(".cover", this).stop().animate({top:'220px'},{queue:false,duration:1560});
	});
});