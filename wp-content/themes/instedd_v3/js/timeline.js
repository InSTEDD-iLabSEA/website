jQuery(function($){
	/* This code is executed after the DOM has been completely loaded */
	$('.eventList li').click(function(e){
		showWindow('<div>'+$(this).find('div.additional-content').html()+'</div>');
	});
		
});

function showWindow(data){ 
	/* Each event contains a set of hidden divs that hold
	   additional information about the event: */
	var $ = jQuery;
	var title = $('.title',data).text();
	var date = $('.date',data).text();
	var body = $('.body',data).html();
	
	$('<div id="overlay">').css({
								
		width:$(document).width(),
		height:$(document).height(),
		opacity:0.6
		
	}).appendTo('body').click(function(){
		
		$(this).remove();
		$('#windowBox').remove();
		
	});
	
	$('body').append('<div id="windowBox"><div id="titleDiv">'+title+' <a href="javascript:void(0);" class="close-btn" alt="Close">Close</a></div>'+body+'<div id="date">'+date+'</div></div>');

	$('.close-btn').live('click', function() {
		$('#overlay').remove();
		$('#windowBox').remove();
	});
	
	$('#windowBox').css({
		width:500,
		height:350,
		left: ($(window).width() - 500)/2,
		bottom: ($(window).height() - 350)/2
	});
		
}