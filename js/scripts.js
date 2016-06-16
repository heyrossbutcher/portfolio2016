var forceRedraw = function(element){

    if (!element) { return; }

    var n = document.createTextNode(' ');
    var disp = element.style.display;  // don't worry about previous display style

    element.appendChild(n);
    element.style.display = 'none';

    setTimeout(function(){
        element.style.display = disp;
        n.parentNode.removeChild(n);
    },20); // you can play with this timeout to make it as short as possible
}

//SET THE NAME SPACE 
var app = {};
//
//GLOBAL VARIABLES
is_chrome = function() { 
  return /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
}
is_safari = function() {
  return /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
}
//
app.win = $(this);
//
app.isMobile = false;
app.checkMobile = function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		app.isMobile = true;
		console.log( 'Its mobile' );
	} else {
		console.log( 'Its desktop' );
	}
}
//
app.iphoned = navigator.platform.indexOf("iPhone") != -1;
//
app.landscaped = $(window).height() < $(window).width();


//////////////////////////
//SCROLLTOP PERCENTAGE
//
app.windowMath = function(){
	app.getTheWindowHeight = $(window).height();
	app.getTheScroll = $(window).scrollTop();
	app.windowPercentage = Math.ceil((app.getTheScroll / app.getTheWindowHeight)*100);
}
app.getScrollTop = function(){
	$(window).scroll(function(){
		app.windowMath();
		//
		app.navScrollTop();
		//
		app.arrowScrollTop();
		//
		app.winWidth = $(window).width();
		//
		//////////////////////
		//SAFARI SCROLLING BUG FIX
		if ( is_safari() ) {
			console.log('safari');
			if ( $(document).scrollTop() > 1700 && app.winWidth > 665) {
				//HACK TO REDRAW AN ELEMNT TO RESET THE PAGE HEIGHT
				app.designerSVG();
				console.log( 'redraw' );
			}
		}
	});
}
//
app.navScrollTop = function(){
	if ( app.windowPercentage >= 30 && app.windowPercentage <= 40 ) {
		app.navBaseline = -90;
		app.navMath = app.navBaseline + (app.windowPercentage - 30) * 9;
		$('header').css({ top : app.navMath });
		//
		// console.log("BRING IN THE NAV: " + app.navMath);
	} else if ( app.windowPercentage < 30 ){
		$('header').css({ top : '-90px' });
	} else {
		$('header').css({ top : '0px' });
	}
}

//////////////////////////
//FOOTER FUNCTIONALITY
app.contactShow = false;
$('.contactTitle').click(function(){
	if ( app.contactShow === false ) {
		$('footer').addClass('footer-move');
		$('.contactName').addClass('contactName-move');
		$('.plusClose').addClass('plusClose-move');
		//
		$('.thePlane').addClass('move-plane');
		$('.clouds01').addClass('move-clouds01');
		$('.clouds02').addClass('move-clouds02');
		$('.speedLines01').addClass('move-lines01');
		$('.speedLines02').addClass('move-lines02');
		//
		app.contactShow = true;
		// console.log("Contact Show: " + app.contactShow);
	} else {
		$('footer').removeClass('footer-move');
		$('.contactName').removeClass('contactName-move');
		$('.plusClose').removeClass('plusClose-move');
		//
		$('.thePlane').removeClass('move-plane');
		$('.clouds01').removeClass('move-clouds01');
		$('.clouds02').removeClass('move-clouds02');
		$('.speedLines01').removeClass('move-lines01');
		$('.speedLines02').removeClass('move-lines02');
		//
		app.contactShow = false;
		// console.log("Contact Show: " + app.contactShow);
	}
	// console.log("Footer clicked!!")
});

//////////////////////////
//////////////////////////x
//////////////////////////
//////////////////////////
//////////////////////////
//INIT FUNCTION
app.init = function(){
	app.checkMobile();
	app.showArrowMobile();
	//
	app.navIcons();
	app.windowMath();
	app.navScrollTop();
	app.logoClicked();
	//
	app.mastheadsChar('heyross1');
	app.mastheadsChar('heyross2');
	app.mastheadsChar('aniHolder');
	app.loadMastheadAnims();
	//
	app.setBeardTime('info03 .info', 'apr,18,2014,21:14:00');
	app.counter = setInterval(function() { app.setBeardTime('info03 .info', 'apr,18,2014,21:14:00'); }, 60000);
	//
	app.getScrollTop();
	app.projectsScrollTop();
	app.startProductsScrolling();
	//

}
//////////////////////////
//DOCUMENT READY
$(function(){
	app.init();
	//
});
//
//////////////////////////
//////////////////////////
//////////////////////////
//ON WINDOW RESIZE
$(window).on('resize', function(){

	//RESETS THE MODAL STATE ON RESIZE
	if ( app.win.width() >= 665 & !app.iphoned ) { 
  		$( '.mobileInfo' ).css({ display: 'none' });
   	} else {
  		app.closeModal();
 	}

 	//RESETS THE "ANIMATOR" SPACING
 	app.animatorSVG();
});



