jQuery('document').ready(function($){
	$('.top').hide();

	// when click class top go to top of page
	$('.top').click(function(){
		$('html, body').animate({
		    scrollTop: 0
		}, 500);
	});
	// show class top
	var lt = 50;
	$(window).scroll(function() {
		var st = $(window).scrollTop();

		if(st > lt) {
			$('.navbar').hide();
		} else {
			$('.navbar').show();
		}

		if(st >= 50) {
			$('.top').show();
		} else if (st < 50) {
			$('.top').hide();;
		}

		if(st > 50) {
			lt = st;
		}
	});
	// Fixed the wp-caption alignment error involving the images.
	if($('div').hasClass('aligncenter')) {
		$('div.aligncenter > a > img').addClass('img-responsive');
		$('div.aligncenter > p.wp-caption-text').removeClass('wp-caption-text').addClass('center-legend');
		$('div.aligncenter').css('width', '');
	   	$('div.aligncenter > a > img').addClass('center-block');
	   	$('div.aligncenter').removeClass('wp-caption aligncenter');
	};
	if($('div').hasClass('alignleft')){
		$('div.alignleft > a > img').addClass('img-responsive');
		$('div.alignleft > p').removeClass('wp-caption-text');
		$('div.alignleft > p').addClass('abc center-block');
		$('div.alignleft > a > img').css('margin-left', '25px');
		$('div.alignleft > a > img').addClass('center-block');
	};
	if($('div').hasClass('alignright')){
		$('div.alignright > a > img').addClass('img-responsive');
		$('div.alignright > p').removeClass('wp-caption-text');
		$('div.alignright > p').addClass('abc center-block');
		$('div.alignright > a > img').css('margin-left', '25px');
		$('div.alignright > a > img').addClass('center-block img-responsive');
		$('div.alignright').removeClass('wp-caption alignright').addClass('img-right');
	};
});
