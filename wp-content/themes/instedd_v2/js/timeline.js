jQuery(function($){
	/* This code is executed after the DOM has been completely loaded */

	/* The number of event sections / years with events */
	var tot=$('.event').length;
	
	$('.eventList li').click(function(e){
			showWindow('<div>'+$(this).find('div.additional-content').html()+'</div>');
	});
	
	/* Each event section is 320 px wide */
	var timelineWidth = 320*tot;
	var screenWidth = $('#main > .item').width();
	
	$('#timelineScroll').width(timelineWidth);
	
	/* If the timeline is wider than the screen show the slider: */
	if(timelineWidth > screenWidth)
	{
		$('#scroll,#slider-timeline').show();
		$('#centered,#slider-timeline').width(120*tot);
		
		/* Making the scrollbar draggable: */
		$('#bar').width((120/320)*screenWidth).draggable({

			containment: 'parent',
			drag: function(e, ui) {
	
				if(!this.elem)
				{
					/* This section is executed only the first time the function is run for performance */
					
					this.elem = $('#timelineScroll');
					
					/* The difference between the slider's width and its container: */
					this.maxSlide = ui.helper.parent().width()-ui.helper.width();

					/* The difference between the timeline's width and its container */
					this.cWidth = this.elem.width()-this.elem.parent().width();
					this.highlight = $('#highlight');
				}
				
				/* Translating each movement of the slider to the timeline: */
				this.elem.css({marginLeft:'-'+((ui.position.left/this.maxSlide)*this.cWidth)+'px'});
				
				/* Moving the highlight: */
				this.highlight.css('left',ui.position.left)
			}
		});
		
		$('#highlight').width((120/320)*screenWidth-3);
	}
	
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
	
	$('body').append('<div id="windowBox"><div id="titleDiv">'+title+' <a href="#" class="close-btn" alt="Close">Close</a></div>'+body+'<div id="date">'+date+'</div></div>');

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