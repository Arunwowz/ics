jQuery("#eael-post-grid-ea70e2f .eael-grid-post-excerpt").click(function(){
  //alert("The paragraph was clicked.");
	window.location.href = "https://icspro.net/contact-us/";
});
	jQuery(window).scroll(function() {  
		var scroll = jQuery(window).scrollTop();
		if (scroll >= 1) {
			jQuery("#removeonscroll").addClass("wstick");
		} else {
			jQuery("#removeonscroll").removeClass("wstick");
		}
	});
	jQuery(window).scroll(function() {  
		var scroll = jQuery(window).scrollTop();
		if (scroll >= 1) {
			jQuery("#allfix").addClass("allfixedmenu");
		} else {
			jQuery("#allfix").removeClass("allfixedmenu");
		}
	});

  let details = navigator.userAgent;
    let regexp = /android|iphone|kindle|ipad/i;
    let isMobileDevice = regexp.test(details);      
	if (isMobileDevice) {
		$('.bxslider').bxSlider({
			minSlides: 2,
			maxSlides: 4,
			infiniteLoop: true,
			auto: true,
			autoStart: true,
			autoDirection: 'next',
			slideWidth: 350,
			slideMargin: 0,
			pager: false
		  });
		} else {
		$('.bxslider').bxSlider({
			minSlides: 4,
			maxSlides: 4,
			infiniteLoop: true,
			auto: true,
			autoStart: true,
			stopAutoOnClick: false,
			autoDirection: 'next',
			slideWidth: 280,
			slideMargin: 0,
			pager: false
		  });
	}
	
	if (isMobileDevice) {
		$('.gloabltestislider').bxSlider({
			minSlides: 1,
			maxSlides: 5,
			infiniteLoop: true,
			auto: true,
			autoStart: true,
			autoDirection: 'next',
			slideWidth: 360,
			slideMargin: 0,
			pager: false
		  });
		} else {
		$('.gloabltestislider').bxSlider({
			minSlides: 2,
			maxSlides: 1,
			infiniteLoop: true,
			auto: true,
			infiniteLoop: true,
			slideWidth: 790,
			slideMargin: 20,
			pager: false
		  });
	}
	
	

	$('.serviceshm').bxSlider({
		minSlides: 2,
		maxSlides: 3,
		infiniteLoop: true,
	    auto: true,
	  	infiniteLoop: true,
		slideWidth: 300,
		slideMargin: 20,
		pager: false
	});
	
	jQuery(function() {
		jQuery('.fa-search').on('click', function(e) {
			jQuery('.elementor-widget-eael-advanced-search').attr('style','display:block');
		});
	});
	

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}


jQuery(".bi-search").click(function(){
	jQuery(".searchpop").attr("style", "display:block;"); 
});
jQuery('.serchbar_box').mouseleave(function() {
	jQuery(".searchpop").attr("style", "display:none;"); 
});

//$("#menu").hide();
/*When menu button is clicked, toggle the menu*/
	jQuery("#menu-btn").click(function(){
		  jQuery("#menu").slideToggle();
		});	
jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 50) {
       jQuery('.dynamic-header').addClass('stickyheader');
    } else {
       jQuery('.dynamic-header').removeClass('stickyheader');
    }
});


	jQuery('.top-level-link').hover(
       function(){ jQuery('main,footer,.fullrow').addClass('blurbox-apple') },
       function(){ jQuery('main,footer,.fullrow').removeClass('blurbox-apple') }
	);

$(document).on('ready', function() {
  $('.bxslider1').slick({
    dots: false,
    centerMode: true,
    infinite: true,
    centerPadding: '10px',
	autoplay: true,
	infinite: true,
	responsive: [{breakpoint: 1024,settings: {slidesToShow: 2,infinite: true}}, {breakpoint: 600,settings: {
		slidesToShow: 1,dots: true}}, { breakpoint: 300,
	    settings: "unslick"}],
    slidesToShow: 4,
    speed: 400
  });
	$('.bxslider2').slick({
    dots: false,
    centerMode: true,
    infinite: true,
    centerPadding: '10px',
	autoplay: true,
	infinite: true,
	responsive: [{breakpoint: 1024,settings: {slidesToShow: 2,infinite: true}}, {breakpoint: 600,settings: {
		slidesToShow: 1,dots: true}}, { breakpoint: 300,
	    settings: "unslick"}],
    slidesToShow: 6,
    speed: 400
  });
});

    
    	 var pageURLForService = jQuery(location).attr("href");
	var resUrldash = pageURLForService .split('/').reverse()[1];
	
	if(resUrldash=='newsletter'){
		  var row = Number(jQuery('#row').val());
		  var count = Number(jQuery('#postCount').val());
		  var limit = 3;
		  jQuery("#loadBtn").val('Loading...');
		jQuery.ajax({
			type: 'POST',
			url : "https://icspro.net/wp-admin/admin-ajax.php",
			data : {
					action: "get_data",
					row: row
				},
			
			success: function (msgData) {
			  var obj = JSON.parse(msgData);
			  var rowCount = obj.row;
			  var numrows = obj.numrows;
			  if(numrows >0){
				  jQuery('#row').val(rowCount);
				  jQuery('#postCount').val(numrows);
				  jQuery('.postList').append(obj.html);
				  
				  jQuery('#video-section-loader').addClass('hide-class');
				  jQuery('#video-align-div').removeClass('video-loader');
				  jQuery('#loadmore').removeClass('hide-class');
				  jQuery('#loadBtn').css("display", "block");
				  jQuery("#loadBtn").val('Load More');
				}else{
					jQuery('#loadmore').addClass('hide-class');
					jQuery('#row').val(0);
					jQuery('#postCount').val(0);
					jQuery('.postList').html('<p class="no-data-class">No Data Found</p>');
				}	
			}
		  });
	}
	jQuery(document).on('click', '#form-search-btn', function () {
		var focusElement = jQuery("#video-align-div"); 
		jQuery(focusElement).focus(); 
		ScrollToTopTab_donation(focusElement);
		jQuery('.postList').html('');
		jQuery('#video-section-loader').removeClass('hide-class');
		jQuery('#video-align-div').addClass('video-loader');
		jQuery('#loadmore').addClass('hide-class');
		var search_data =jQuery('#search_inp').val();
		if(search_data!=''){
			jQuery.ajax({
			type: 'POST',
			url : "https://icspro.net/wp-admin/admin-ajax.php",
			data : {
					action: "get_data",
					search_data: search_data
				},
			
			success: function (msgData) {
				jQuery('#video-section-loader').addClass('hide-class');
				jQuery('#video-align-div').removeClass('video-loader');
				var obj = JSON.parse(msgData);
				var rowCount = obj.row;
				var numrows = obj.numrows;
				if(numrows > 0 ){
					console.log(numrows);
					jQuery('#loadmore').removeClass('hide-class');
					jQuery('#row').val(rowCount);
					jQuery('#postCount').val(numrows);
					jQuery('.postList').append(obj.html);
					jQuery('#loadBtn').css("display", "block");
					jQuery("#loadBtn").val('Load More');
				}else{
					jQuery('#loadmore').addClass('hide-class');
					jQuery('#row').val(0);
					jQuery('#postCount').val(0);
					jQuery('.postList').html('<p class="no-data-class">No Data Found</p>');
				}
				return false;
			}
		  });
		}
	});
    jQuery(document).on('click', '#loadBtn', function () {
	 var search_data =jQuery('#search_inp').val();
	  var row = Number(jQuery('#row').val());
      var count = Number(jQuery('#postCount').val());
      var limit = 2;
      jQuery("#loadBtn").val('Loading...');
 
      jQuery.ajax({
        type: 'POST',
		url : "https://icspro.net/wp-admin/admin-ajax.php",
        data : {
				action: "get_data",
				row: row,
				search_data: search_data
			},
        
        success: function (msgData) {
		var obj = JSON.parse(msgData);
		var rowCount = obj.row;
		jQuery('#row').val(rowCount);
		jQuery('.postList').append(obj.html);
          if (rowCount >=count) {
            jQuery('#loadmore').addClass('hide-class');
          } else {
            jQuery("#loadBtn").val('Load More');
          }
        }
      });
    });
   
	


function ScrollToTopTab_donation(el) {
	jQuery('html, body').animate({
		scrollTop: jQuery(el).offset().top - 180
	}, 'fast');
}