Cufon.replace('#navigation ul li a, .network-category-nav a, #windowBox, .image-slider .info h2, .image-slider .info p, .image-slider .btn-next, .box-slider .slider .box h3, .feed .head h2, .feed .head h3, .widgets h2, #footer .widget_nav_menu > div > ul > li > a, #footer .col h4, .contacts label, .contacts h4, #sidebar ul li .widgettitle, #sidebar ul li.widget ul li a, .content h2, .press .item h3, .sidebar-r ul li .widgettitle, .sidebar-r .btn-donate, .sidebar-r .btn-tell, .box-updates label, .sidebar-r ul li.nav ul li, .sidebar-r2 .widgettitle, .hor-bar h3, .ess .descr h3, .ess .descr h4, .ess .descr h5, .subpage h3, .not-singular-post h4', { fontFamily : 'Aller', hover : true });
//Cufon.replace('.box-mailing label', { fontFamily : 'Aller' });
//#navigation ul li a,
jQuery(function($) {
	$("#navigation ul li").hover(function() {
		$(this).css({ 'z-index' : 100 });
		$(this).find("> ul").show();
		$(this).find("a:eq(0)").addClass('hover');
	}, function() {
		$(this).css({ 'z-index' : 1 });
		$(this).find("> ul").hide();
		$(this).find("a:eq(0)").removeClass('hover');
	});
	
	/*
	$('.ess .images .image').hover(function () {
		$('.btn-fullscreen').fadeIn();
	}, function () {
		$('.btn-fullscreen').fadeOut();
	});
	$('.ess .images .btn-fullscreen').click(function () {
		
		return false;
	});
	*/

	function slider_initCallback1 (carousel) {
		jQuery(".slider-number").bind('click', function(){
			jQuery(".slider-number.active").removeClass('active');
	    	var x = parseInt(jQuery(this).text());
	    	carousel.scroll(x);
	    	jQuery(this).addClass('active');
	    	return false;

	    });
	}
	function slider_initCallback2 (carousel) {
		$(".box-slider .btn-prev").bind('click', function(){
			carousel.stopAuto();
			carousel.prev();
			return false;
		});
		
		$(".box-slider .btn-next").bind('click', function(){
			carousel.stopAuto();
			carousel.next();
			return false;
		});
	}
	function slider_initCallback3 (carousel) {
		$(".ess .thumbs .btn-prev").bind('click', function(){
			carousel.stopAuto();
			carousel.prev();
			return false;
		});
		
		$(".ess .thumbs .btn-next").bind('click', function(){
			carousel.stopAuto();
			carousel.next();
			return false;
		});
		
		$(".ess .thumbs .btn-pause").bind('click', function () {
			carousel.startAuto(0);
			$(this).removeClass('btn-pause').addClass('btn-play');
			return false;
		});
		
		$(".ess .thumbs .btn-play").bind('click', function () {
			carousel.startAuto(5);
			$(this).removeClass('btn-play').addClass('btn-pause');
			return false;
		});
		
		$(".ess .thumbs .slider a").bind('click', function(){
			$(".ess .thumbs .slider a").removeClass('active');
			$(this).addClass('active');
			$(".ess .images .image img").attr('src', $(this).attr('href'));
			return false;
		});
		
	}
	function slider_firstInCallback(carousel, item, idx, state) {
		//$('.ess .thumbs .slider a').removeClass('active');
		//$('.ess .thumbs .slider a').eq(idx-1).addClass('active');
	}
	
	$('.image-slider .slider').jcarousel( {
		initCallback: slider_initCallback1,
		scroll: 1,
		wrap: 'both',
		auto: 5,
		buttonNextHTML: null,
		buttonPrevHTML: null
	});
	$('.box-slider .slider').jcarousel( {
		initCallback: slider_initCallback2,
		scroll: 1,
		wrap: 'both',
		//auto: 5,
		buttonNextHTML: null,
		buttonPrevHTML: null
	});
	$('.ess .thumbs .slider').jcarousel( {
		initCallback: slider_initCallback3,
		itemFirstInCallback: slider_firstInCallback,
		scroll: 1,
		wrap: 'both',
		auto: 5,
		buttonNextHTML: null,
		buttonPrevHTML: null
	});
	
	$('.play-video').click(function() {
		var rel = $(this).attr('rel');
		var video = $('#play-' + rel);
		if (video.is(':visible')) {
			return false;
		}
		$('.playable-videos .head').hide();
		video.show();
		return false;
	});
	
	$('.hor-bar li.widget:last').addClass('last');
	
		$('.featured-posts-slider').hover(
		function() {
			$('.featured-posts-nav').stop().fadeTo('medium', 1);
		},
		function() {
			$('.featured-posts-nav').stop().fadeTo('medium', 0);
		}
	);
	
	$('.featured-posts-nav a').click(function() {
		if ($('.featured-posts-slider .featured-post:animated').length) {
			return false;
		}
		var current = $('.featured-posts-slider .featured-post').index($('.featured-posts-slider .featured-post:visible'));
		var total = $('.featured-posts-slider .featured-post').length;
		if ($(this).hasClass('prev')) {
			if (current == 0) {
				current = total - 1;
			} else {
				current--;
			}
		} else {
			if (current == total - 1) {
				current = 0;
			} else {
				current++;
			}
		}
		$('.featured-posts-slider .featured-post:visible').fadeOut();
		$('.featured-posts-slider .featured-post:eq(' + current + ')').fadeIn();
		return false;
	});
	


});