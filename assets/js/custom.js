jQuery(document).ready(function() {
  var owl = jQuery('.owl-carousel');
  owl.owlCarousel({
    loop: true,
    //margin: 10,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive : {
    // breakpoint from 0 up
    0 : {
        items: 2,
        dots: true
    },
    // breakpoint from 768 up
    768 : {
        items: 3,
        dots: false
    }
}

  });
  jQuery('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
  })
  jQuery('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
  })
})


jQuery(document).ready(function() { 
        
    jQuery('.toggle-menu-link').bigSlide({
        easyClose: true,
        side: 'left',
        afterOpen: function() { jQuery("#close-menu").focus(); },
        afterClose: function() { jQuery("#masthead .toggle-menu-link").focus();}
    });
    
    jQuery('.go-to-top').focus(function(){
	    jQuery("#close-menu").focus();
    });
    
    jQuery('.go-to-bottom').focus(function(){
	    jQuery("#menu ul.menu li:last-of-type a").focus();
    });
         
    jQuery('#searchicon').click(function(){
	   jQuery('#jumbosearch').slideToggle('slow'); 
	   jQuery('#jumbosearch .search-field').focus();   
    });
    
    jQuery('#jumbosearch .search-field').focusout(function(){
	     jQuery('#jumbosearch').slideToggle('fast'); 
	    jQuery("#masthead .toggle-menu-link").focus();
    });
    
    jQuery('#menu ul li.menu-item-has-children').append("<i class='fa fa-angle-down'></i>");
    
    jQuery('#menu ul li.menu-item-has-children .fa').click(function(){
	    jQuery(this).parent('li.menu-item-has-children').children('ul').slideToggle();
    });
	    
});


//Keyboard Navigation for Main Menu
jQuery("#site-navigation a").focusin(function(){
	//When a is focused
	jQuery(this).parent().find('> ul.sub-menu').addClass("focused makevisible");
	jQuery(this).parent().removeClass("out-of-focus");
	jQuery(this).parent().prevAll().addClass("out-of-focus");
	jQuery(this).parent().nextAll().addClass("out-of-focus");
	jQuery(".out-of-focus").find('ul.sub-menu').removeClass("focused makevisible");
});

//level 2 submenu
jQuery("#site-navigation .sub-menu a").focusin(function(){
	//When submenu a is focused
	jQuery(this).parent().find('> ul.sub-menu').addClass("focused makevisible");
	//make parent sub menu visible too
	jQuery(this).parent().parent().parent().addClass("focused makevisible");
});	

//For Default menu with pages
jQuery("#site-navigation a").focusin(function(){
	//When a is focused
	jQuery(this).parent().find('> ul.children').addClass("focused makevisible");
	jQuery(this).parent().removeClass("out-of-focus");
	jQuery(this).parent().prevAll().addClass("out-of-focus");
	jQuery(this).parent().nextAll().addClass("out-of-focus");
	jQuery(".out-of-focus").find('ul.children').removeClass("focused makevisible");
});

//level 2 submenu
jQuery("#site-navigation .children a").focusin(function(){
	//When submenu a is focused
	jQuery(this).parent().find('> ul.children').addClass("focused makevisible");
	//make parent sub menu visible too
	jQuery(this).parent().parent().parent().addClass("focused makevisible");
});	



