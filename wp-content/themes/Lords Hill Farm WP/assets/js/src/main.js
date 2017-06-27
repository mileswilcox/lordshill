MAIN = (function ($) {

	init = function () {
		// Code here runs straight away

		var lat,
			lng;
		$(DOMready);

		var mapObject = document.getElementById("google-map");

		if (mapObject) {

			function loadScript() {
			  var script = document.createElement('script');
			  script.type = 'text/javascript';
			  script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +'callback=maps';
			  document.body.appendChild(script);
			}

			window.onload = loadScript;

		}

	 },

	DOMready = function () {

		// Code here runs when the DOM is ready
		imager();
		forms();
		navToggle();
		fadeScroll();
		headerScroll();
		navActive();
		navContact();
	},

	imager = function() {
		new Imager('.js-load-img', {
			//availableWidths: [360, 480, 600, 800, 1024],
			lazyload: true
		});
	},

	navActive = function() {
		// if($_SERVER['PHP_SELF'] == '/') {
		// 	$('nav a[href^="/').addClass('active');
		// } else {
		// 	$('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
		// }

  	},

	navContact = function() {

		var url = location.pathname;
		if (url.indexOf('contact') > -1) {
			$('.l-header__wrap').addClass('js-background');
	    }
	 },

	forms = function() {

		$("#signup-form").submit(function(e){
			e.preventDefault();

			if(!$("input[name='forename']").val()){
				$(".js-form-name").addClass('error');
			}

			else if(!$("input[name='dob-eamil']").val()){
				$(".js-form-email").addClass('error');
			}

			else {
				$('#signup-form').submit();
				$(".form-success").show();
			}

		});

	},

	navToggle = function() {
    	$('.js-nav-toggle').on('click', function(e) {
    		e.preventDefault();

    		var self = $(this);

    		self.toggleClass('active');

    		$('nav').toggleClass('active');
    	});
    },

	fadeScroll = function() {
		$(window).scroll(function(){
			$(".hero__wrap").css("opacity", 1 - $(window).scrollTop() / 250);
		});
	},

    headerScroll = function() {
    	var headerHeight = $('.hero__bg').outerHeight();
    	$(window).scroll(function(){
			if($(document).scrollTop() > $(window).height() -headerHeight + 100  && $(window).width() > 900) {
				$('.l-header__wrap').addClass('js-shrink');
			}
			// else if($(document).scrollTop() > $(window).height() -headerHeight - 400  && $(window).width() > 900) {
			// 	$('.l-header__wrap').addClass('js-shrink');
			// }
			else {
				$('.l-header__wrap').removeClass('js-shrink');
			}
    	});
    },

    initMap = function() {
		var position = [52.3711833, -1.264751];
		var latLng = new google.maps.LatLng(position[0], position[1]);

		var mapOptions = {
			zoom: 17, // initialize zoom level - the max value is 21
			streetViewControl: false, // hide the yellow Street View pegman
			scrollwheel: false,
			navigationControl: false,
			mapTypeControl: false,
			scaleControl: false,
			draggable: false,
			disableDefaultUI: true,

			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: latLng,
			 styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]
		};
		var map = new google.maps.Map(document.getElementById('map'),mapOptions);
	}

	return {
		start : init
	};

})(jQuery);

MAIN.start();
