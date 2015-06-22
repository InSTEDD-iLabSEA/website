jQuery(function($) {

	// Autoreplace E-NEWS signup text
	var emailBoxes = $(".email");
	var emailBox1 = $("#mce-EMAIL");
	var emailBox1Default = "Enter your email address";
	//alert("test");
	//Searchbox2 show/hide default text if needed
	//mailBox1.focus();
	emailBox1.attr("value") == "Test";
	emailBox1.focus(function(){
		if($(this).attr("value") == emailBox1Default) $(this).attr("value", "");
	});
	emailBox1.blur(function(){
		if($(this).attr("value") == "") $(this).attr("value", emailBox1Default);
	});

	// Autoreplace E-NEWS signup text
/*	var searchBoxes = $(".search");*/
	var searchBox1 = $("#search-box");
	searchBox1.focus();
/*	var searchBox1Default = "SEARCH";
	searchBox1.focus(function(){
		if($(this).attr("value") == searchBox1Default) $(this).attr("value", "");
	});
	searchBox1.blur(function(){
		if($(this).attr("value") == "") $(this).attr("value", searchBox1Default);
	});*/

  $('.button').each(function(){
        $(this).after(unescape('%3Cspan class="button"%3Eaa%3C/span%3E'));
        $(this).hide();
        $(this).next('span.button').text($(this).val()).click(function(){
            $(this).prev('input.button').click();
        });
    });
	//#sidebar ul li.widget ul li a,
	//Cufon.replace('.network-category-nav a, #navigation ul li a, #windowBox, .image-slider .info h2, .image-slider .info p, .image-slider .btn-next, .box-slider .slider .box h3, .feed .head h2, .feed .head h3, .widgets h2, #footer .widget_nav_menu > div > ul > li > a, #footer .col h4, .contacts label, .cont	acts h4, #sidebar ul li .widgettitle, .content h1, .content h2, .press .item h3, .sidebar-r ul li .widgettitle, .sidebar-r .btn-donate, .sidebar-r .btn-tell, .box-updates label, .sidebar-r ul li.nav ul li, .sidebar-r ul div h2, .sidebar-r ul div h3, .sidebar-r2 .widgettitle, .hor-bar h3, .ess .descr h3, .ess .descr h4, .ess .descr h5, .subpage h3, .not-singular-post h4, #header a.btn-donate-big, #header a.btn-contact, span.button, #header a.contact, #header a.enews, #header input.search, #home-columns-container h2, #home-columns-container h3, div.nivo-caption p a, #header input.search-submit-button, div.subhead, h3.midlevel, div.technology-description, div.sidebar-technology-icon p, a.btn-technology-start-using, #mc-embedded-subscribe-form #mc-embedded-subscribe, div.flickr-set-title a', { fontFamily : 'helvetica-neue-roman', hover : true });
//Cufon.replace('.box-mailing label', { fontFamily : 'Aller' });


	$("#navigation ul li").hover(function() {
		$(this).css({ 'z-index' : 100 });
		$(this).find("> ul").show();
		$(this).find("a:eq(0)").addClass('hover');
	}, function() {
		$(this).css({ 'z-index' : 1 });
		$(this).find("> ul").hide();
		$(this).find("a:eq(0)").removeClass('hover');
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