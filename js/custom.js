$j = jQuery.noConflict();		
		$j( document ).ready(function() {									
				$j('.form-submit input#submit').addClass('btn');
				
				if ($j.browser.msie && $j.browser.version == 10) {
				  	$j("html").addClass("ie10");
				}
				
				
				$j(window).scroll(function () {
				    if( $j(window).scrollTop() > $j('#header-2').offset().top && !($j('#header-2').hasClass('posi'))){
				    	$j('#header-2').addClass('posi');
				    } else if ($j(window).scrollTop() == 0){
				    	$j('#header-2').removeClass('posi');
				    }
				});
				
				
				$j('.fbpopup').click(function(event) {
				    var width  = 575,
				        height = 400,
				        left   = ($j(window).width()  - width)  / 2,
				        top    = ($j(window).height() - height) / 2,
				        url    = $j(this).attr('href'),
				        opts   = 'status=1' +
				                 ',width='  + width  +
				                 ',height=' + height +
				                 ',top='    + top    +
				                 ',left='   + left;
				    
				    window.open(url, 'facebook', opts);
				 
				    return false;
				  });
				  
				$j('.twtpopup').click(function(event) {
				    var width  = 575,
				        height = 400,
				        left   = ($j(window).width()  - width)  / 2,
				        top    = ($j(window).height() - height) / 2,
				        url    = $j(this).attr('href'),
				        opts   = 'status=1' +
				                 ',width='  + width  +
				                 ',height=' + height +
				                 ',top='    + top    +
				                 ',left='   + left;
				    
				    window.open(url, 'twitter', opts);
				 
				    return false;
				  });
				
				
				
				//$j( ".post-title" ).insertAfter( $j(".wpb_gallery_slides") );
				//$j( ".post-title" ).insertAfter( $j(".wpb_gallery_fade") );
				//$j( ".post-title" ).insertAfter( $j(".wpb_single_image") );
				
				//$j(".wpb_wrapper p").first().insertBefore(".post-title");
				
				$j( ".post-title" ).insertBefore($j(".single .container .span8 p").first());
				
				
				/*
				if($j(".single .container .span8 iframe").is(":first-child")){
					$j( ".post-title" ).insertAfter( $j(".single .container .span8 iframe") );
				}*/
				
				$j( "#message" ).insertBefore( $j("#header-2") );
				$j(".footer-inner").append($j("#wpmessenger_container"));
				
				$j('.wpmessenger_stage').addClass('container');
				$j('.wpmessenger_sidemenu').addClass('span3');
				$j('#wpmessenger_contentpane').addClass('span9');
				
								
				
				// Error message for login failed.
				$j('.login-fail, .reg-opt, .update-notice').delay(8000).slideUp(350);
								
});