//SET THE NAME SPACE 
var app = {};
//
//////////////////////////
//GET THE MASTHEAD CONTENT
app.navIcons = function(){
	app.grabNav = $('h1');
	app.grabNav.html('<div class="navIcons"><div class="nameIcon"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/name-icon.svg" alt="Hey Ross" title="Hey Ross"></div><div class="designIcon"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/design-icon.svg" alt="is a designer" title="is a designer"></div><div class="animationIcon"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/animaton-icon.svg" alt="and an animator" title="and an animator"></div><div class="developerIcon"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/developer-icon.svg" alt="AND a developer." title="AND a developer."></div></div>');

	// app.navText = '<div class="navIcons">http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/14years.svg<div>'
	// console.log("The nav says: " + app.navText)
}


//////////////////////////
//GET THE MASTHEAD CONTENT
app.mastheadsChar = function(grabIt){
	app.grabbed = $('.'+ grabIt);
	app.grabbedText = $('.'+ grabIt).text();
	//
	app.str = app.grabbedText;
	app.strArray = app.str.split(' ');//Separate the words from the string
	//
	app.grabbed.html('');//Take out what's already there
	// console.log("BREAK!!!!!!!!!!!!!");
	//
	app.mastheadCharEngine(grabIt);
	//
	//
}
app.mastheadCharEngine = function(grabItAgain){
	for ( i = 0; i < app.strArray.length; i++ ) {
		app.singleStrArray = app.strArray[i].split('');
		for ( x = 0; x < app.singleStrArray.length; x++ ) {
			app.counter = app.singleStrArray[x];
			app.grabbedAgain = $('.'+ grabItAgain);
			app.grabbedAgain.append('<div class="charWrapper" data-pos="' +  x + '"><div class="char letter-' + app.counter + '">' + app.counter + '</div></div>');
			//
			if ( x == app.singleStrArray.length - 1 ) {
				app.grabbed.append('<div class="charWrapper"><div class="space">&nbsp;</div></div>');
			}
			//
			if ( app.counter === 'i' || app.counter === 'y' || app.counter === 't' || app.counter === 'r' || app.counter === 's' || app.counter === 'o' || app.counter === 'e' ) {
				// console.log(app.strArray + ': ' + app.counter + ' was added.')
				$('.letter-' + app.counter).addClass('kerning-' + app.counter);
			}
		}
	}
}
//////////////////////////
//////////////////////////
//MASTHEAD ANIMATIONS
//////////////////////////
//////////////////////////
app.loadMastheadAnims = function(){
	app.mastheadTitle01();
}

//
//////////////////////////
//MASTHEAD TITLE 01
app.getMastheadTitle01Info = function(whatNum){
	var getTheParent1= $('.heyross1').children()[whatNum];
	var getTheParent2= $('.heyross2').children()[whatNum];
	var childHolder1 = $(getTheParent1).find('div');
	var childHolder2 = $(getTheParent2).find('div');
	//
	setTimeout( function() {
		if( app.stateCheck === true ) {
		    childHolder1.addClass('hide-mastheadTitle-01');
			childHolder2.addClass('show-mastheadTitle-02');
		}
	}, app.timer);
}
app.removeMastheadTitle01Info = function(whatNum){
	var getTheParent1= $('.heyross1').children()[whatNum];
	var getTheParent2= $('.heyross2').children()[whatNum];
	var childHolder1 = $(getTheParent1).find('div');
	var childHolder2 = $(getTheParent2).find('div');
	//
	setTimeout( function() {
		if( app.stateCheck === false ) {
		    childHolder1.removeClass('hide-mastheadTitle-01');
			childHolder2.removeClass('show-mastheadTitle-02');
			//
		}
	}, app.timer);
}
app.mastheadTitle01 = function(){
	app.stateCheck = false;
	$('.heyrossContainer').mouseenter(function(){
		app.stateCheck = true;
		console.log(app.stateCheck);
		var numOfChildren = $('.heyross2 > *').length;
		for (var n = 0; n < numOfChildren; n++) {
			
				app.timer = n*50;
				app.nHolder = n;
				//
		        app.getMastheadTitle01Info(app.nHolder);
		}
	});
	//
	$('.heyrossContainer').mouseleave(function(){
		app.stateCheck = false;
		console.log(app.stateCheck);
		var numOfChildren = $('.heyross2 > *').length;
		for (var q = 0; q < numOfChildren; q++) {
			
				app.timer = q*25;
				app.nHolder = q;
				//
				app.removeMastheadTitle01Info(app.nHolder);
		}
	});
}

//////////////////////////
//GET THE BEARD TIME
app.setBeardTime = function(grabIt, countTo){
	app.grabbedBeard = $('.'+ grabIt);
	//
	app.now = new Date();
	app.countTo = new Date(countTo);
	app.difference = (app.now-app.countTo);
	//
	app.days = Math.floor(app.difference/(60*60*1000*24)*1);
  	app.hours = Math.floor((app.difference%(60*60*1000*24))/(60*60*1000)*1);
  	app.mins = Math.floor(((app.difference%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
  	app.secs = Math.floor((((app.difference%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);
	//
	app.grabbedBeard.html('<p>Continuously bearded for</p><p>' + app.days + ' days</p><p>' + app.hours + ' hours</p><p>' + app.mins + '  mins</p>' );
	//
}
//
//////////////////////////
//SCROLLTOP PERCENTAGE
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
//////////////////////////
//PRODUCT LOGIC
//////////////////////////
//////////////////////////
//////////////////////////
//////////////////////////
//GET PROJECTS JSON
app.getProjectInfo = function(){

	app.projName = projectData[app.dataCaller]['projectname'];
	app.projDesc = projectData[app.dataCaller]['projectdescription'];
	app.projImg = projectData[app.dataCaller]['bgimage']['url'];
	$('.projectModal h2').html(app.projName);
	$('.projectModal p').html(app.projDesc);
	// $('.projectModal .right').html('<iframe width="100%" height="350" src="https://www.youtube.com/embed/Jer8XjMrUB4" frameborder="0" allowfullscreen></iframe>');
	console.log(app.dataCaller);
}
$( '.project' ).click(function(){
	app.dataNum = $(this).attr('data-number');
	app.dataCaller = app.dataNum - 1;
	app.getProjectInfo();
});
//
$( '.next' ).click(function(){
	if ( app.dataCaller === app.projectCount-1 ){
		app.dataCaller = 0;
	} else {
		app.dataCaller++;
	}
	app.getProjectInfo();
});
//
$( '.prev' ).click(function(){
	if ( app.dataCaller === 0 ){
		app.dataCaller = app.projectCount-1;
	} else {
		app.dataCaller--;
	}
	app.getProjectInfo();

});
//PRODUCTS SCROLLTOP PERCENTAGE
app.startProductsScrolling = function(){

		app.windowScrollTop = $(window).scrollTop();
		app.getProjectsScrollTop = $('.projects').offset().top;
		app.projectsScrollTop = app.getProjectsScrollTop - app.windowScrollTop;
		// console.log(app.projectsScrollTop);
		//
		if ( app.projectsScrollTop < 700 && app.projectsScrollTop > 550 ) {
			app.projectsBaseline = 550;
			app.projectsPercent = ((( app.projectsScrollTop - app.projectsBaseline )/150));
			// console.log("Projects %: " + app.projectsPercent);
		} 
		else if ( app.projectsScrollTop < 550 ) {
			app.projectsPercent = 0;
			// console.log("Projects %: " + app.projectsPercent);
		} else {
			app.projectsPercent = 1;
			// console.log("Projects %: " + app.projectsPercent);
		}
		//
		// $( '.project').css( { transform : "translateY(" + app.translateCount + "px)" } );
		$( '.project').each(function(){
			app.whatAmI = $(this).attr('class');
			app.whereWasI = $(this).attr('data-pos');
			getTranslate = $(this).css('transform');
			// console.log('Translate Pos for ' + app.whatAmI + ' is ' + app.whereWasI);
			$( this).css({ transform : 'matrix(1, 0, 0, 1, 0,' + (app.whereWasI * app.projectsPercent) + ')' });
		});
		//////////// grab the stored data number and do the math
		// console.log(app.projectStyle);

}
//
app.projectsScrollTop = function(){
	app.projectCount = $('.project').length;
	//
	for (var i = 1; i <= app.projectCount; i++) {
		app.translateCount = ( 350 * i );
		// $( '.project' + i ).css( { opacity : app.opacityCount } )
		$( '.project' + i ).css( { transform : 'matrix(1, 0, 0, 1, 0,'  + app.translateCount + ')' } );
		$( '.project' + i ).attr( 'data-pos', app.translateCount );
		////////////// add in a data-src that has the specific nmber
	}
	//
	$(window).scroll(function(){
		app.startProductsScrolling();
		// console.log("I'm scolling!!!!!!!")
	});
}
//
//////////////////////////
//OPEN MODUAL
$( '.project' ).click(function(){
	$('.projectModalContainer').addClass('show-desc-opacity');
	$('.projectModal').addClass('show-description');
});
$( '.projectModalContainer .projectModal .close' ).click(function(){
	$('.projectModalContainer').removeClass('show-desc-opacity');
	$('.projectModal').removeClass('show-description');
	$('.projectModal .right').html('');
});
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
//INIT FUNCTION
app.init = function(){
	app.navIcons();
	app.windowMath();
	app.navScrollTop();
	//
	app.mastheadsChar('heyross1');
	app.mastheadsChar('heyross2');
	app.loadMastheadAnims();
	//
	app.setBeardTime('info03 .info', 'apr,18,2014,21:14:00');
	app.counter = setInterval(function() { app.setBeardTime('info03 .info', 'apr,18,2014,21:14:00'); }, 60000);
	//
	app.getScrollTop();
	app.projectsScrollTop();
	app.startProductsScrolling();
}
//////////////////////////
//DOCUMENT READY
$(function(){
	app.init();
	//
});