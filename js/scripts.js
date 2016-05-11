//SET THE NAME SPACE 
var app = {};
//
//////////////////////////
//GET THE MASTHEAD CONTENT
app.navIcons = function(){
	app.grabNav = $('h1');
	app.grabNav.html('<div class="navIcons"><div class="nameIcon"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/name-icon.svg" alt="Hey Ross" title="Hey Ross"></div><div class="nameCopy"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/name-copy.svg" alt="Hey Ross" title="Hey Ross"></div></div>');	
}


//////////////////////////
//GET THE MASTHEAD CONTENT FOR 1ST HEADING
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
//GET THE MASTHEAD CONTENT FOR DESIGNER HEADING
app.designerString = '<div class="designerHolder"><svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 392.5 93.5" style="enable-background:new 0 0 392.5 93.5;" xml:space="preserve"> <style type="text/css"> .st01{fill:#E56C63; display:none;}.st11{fill:#1E1E1E;}</style> <path id="d2-1" class="st01" d="M8.4,64.7c-1.4-4.3-1.8-10-0.9-14.1L7.9,49c1.4-6.1,4.4-12.3,8.2-16.9l0.1-0.2 c5.1-5,11.2-7.9,16.8-7.9h6.3c1.1,0,2,0,2.9-0.2L47,2.1h4.6c3.1,0,4.8,2.1,4.2,4.8L41.9,69.3c-0.6,2.9-3.3,4.9-6.4,4.9H21.8 c-5.7,0-10.6-3.3-13.2-9L8.4,64.7L8.4,64.7z M17.6,49.9c-0.7,3-0.4,14.4,6,14.4h9.6l6.8-30.4c-0.7,0.1-1.5,0.2-2.1,0.2h-7.1 c-2.2,0-4,0.6-7.1,3.6l-0.5,0.6C20.6,41,18.7,45,17.8,49L17.6,49.9z"/> <path id="e2-1" class="st01" d="M59.2,53.4l2.1-9.3c0.8-3.8,2.6-7.4,5.3-10.7C71.9,27.1,80.3,23,88,23h0.7 c12.1,0.9,18.1,9.2,15.4,21.1L102,54c-0.7,1.7-2.3,1.7-3.5,1.7H68.9c0.2,3.1,1.4,9.9,9.7,9.9c7.5,0,9.4-1.6,11.2-3 c0.5-0.5,1.1-0.8,1.7-1.3c0.8-0.4,1.7-0.7,2.5-0.7c2.1,0,3.2,1.6,3.9,2.5l1,1.3l-1.2,1.2c-2.5,2.2-4.6,3.9-6.4,4.9 c-3.1,2.1-8.6,4.1-14,4.1h-0.6c-3.7,0-7.3-1-10.2-2.9C60.5,67.9,57.6,60.8,59.2,53.4z M94.1,46.3l0.5-2.2c0.8-3.3,1.5-11-8.1-12.1 H86c-2.2,0-4,0.5-6.2,1.7c-4.5,2.2-7.4,5.9-8.4,10.4l-0.5,2.2H94.1z"/> <path id="s2-1" class="st01" d="M127.9,74.7c-5.4,0-10-1.7-13.4-5c-0.8-0.6-1.9-1.7-1.8-3.3c0-0.6,0.4-1.6,1.3-2.7l0.2-0.2l4.4-4 l0.9,1.1c3.7,4.3,6.9,4.9,9.6,4.9c0.4,0,0.7,0,1.1,0l0.2-0.1c3.9-0.2,8.7-3,9.7-8.3c0.3-2.1-3.6-3.2-7.6-4.5c-6.5-2-14.6-4.4-13-13 c1.5-8.5,10.2-15.4,20.2-15.9c6.3-0.3,10.9,1.7,15.2,6.6c1.1,1.2,1.1,3.4-1,5.6l-0.1,0.1l-3.9,3.3l-1.3-1.4 c-1.9-2.2-4.9-5.7-10.6-5.4c-2.4,0.1-5,1.2-7,3c-1.2,1.1-2.1,2.4-2.2,3.6c-0.4,2.2,3.4,3.5,7.6,4.8c6.4,2.1,14.4,4.6,13,12.9 c-0.8,4.7-3.1,8.9-6.8,12.1c-4.5,4-10.1,5.7-13.4,5.8H127.9z"/> <path id="i2-1" class="st01" d="M164.9,73.9c-3.1,0-5.1-2.3-4.4-5.2l8.4-37.8c0.5-2.2,3.7-4.4,6.6-4.4h4.5l-10.5,47.4H164.9z M183.9,7.8l-2.5,11.3h-4.6c-2.9,0-5.1-2.2-4.6-4.4l1.2-5.3c0.5-2.3,3.7-5.1,6.7-5.1h0.5c1.2,0,2.6,0.5,3.1,1.5"/> <path id="g2-1" class="st01" d="M190.7,45.1c2.9-13.1,12.9-21.8,24.9-21.8c12,0,18.1,4.7,16.3,12.6l-7.5,34.3c-0.2,1-0.3,1.9-0.5,2.9 c-1.1,5.2-2.2,10.6-6.4,14.1c-2.9,2.4-6.8,3.5-11.9,3.5h-5c-3.8,0-5.3-1.7-4.5-5l1-4.7h5.7l1.8,0.1c3.9,0,6.5-0.1,7.5-1 c0.9-0.7,1.4-3,2-6.3l0-0.1c-2.1,0.9-4.9,1.7-9,1.7c-7.6,0-13.9-4.1-16-10.5c-1.2-3.1-1.2-6.9-0.4-10.7L190.7,45.1z M222.3,36 c0.7-3-5.8-3.2-8.5-3.2c-7.3,0-12.6,6.3-14,12.3l-2,9.1c-1.9,8.7,3.6,11.9,9.3,11.9c5.3,0,9-2,9.2-2.9L222.3,36z"/> <path id="n2-1" class="st01" d="M271.8,73.9c-2.9,0-4.7-2.2-4.1-4.9l5.4-24.3c1.7-7.6-1.5-11.7-9.2-11.7c-3.8,0-7.4,1.1-9.8,2.9 l-8.5,38h-5c-2.9,0-4.7-2.2-4.1-4.9l7.9-35.5c0.3-1.3,1.4-2.4,1.8-2.8c0.5-0.4,1.3-1.1,3.2-2.3c4.6-3,10.9-4.8,16.3-4.8 c6.6,0,11.7,2.2,14.8,5.9c3,4,3.9,9.3,2.6,15.2l-6.5,29.2H271.8z"/> <path id="e2-2" class="st01" d="M294.7,53.4l2.1-9.3c0.8-3.8,2.6-7.4,5.3-10.7c5.3-6.3,13.6-10.4,21.4-10.4h0.7 c12.1,0.9,18.1,9.2,15.4,21.1l-2.2,9.9c-0.7,1.7-2.3,1.7-3.5,1.7h-29.6c0.2,3.1,1.4,9.9,9.7,9.9c7.5,0,9.4-1.6,11.2-3 c0.5-0.5,1.1-0.8,1.7-1.3c0.8-0.4,1.7-0.7,2.5-0.7c2.1,0,3.2,1.6,3.9,2.5l1,1.3l-1.2,1.2c-2.5,2.2-4.6,3.9-6.4,4.9 c-3.1,2.1-8.7,4.1-14,4.1H312c-3.7,0-7.3-1-10.2-2.9C296,67.9,293.1,60.8,294.7,53.4z M329.6,46.3l0.5-2.2c0.8-3.3,1.5-11-8.1-12.1 h-0.4c-2.2,0-4,0.5-6.2,1.7c-4.5,2.2-7.4,5.9-8.4,10.4l-0.5,2.2H329.6z"/> <path id="r2-1" class="st01" d="M354.4,39.5c2.5-11.1,12.4-16.1,21.1-16.1c5.9,0,11.1,2.2,13.7,5.7c0.9,1.2-0.1,2.5-0.8,3.4l-0.3,0.4 c-1.2,1.8-2.8,4-4.7,4c-0.5,0-0.9-0.2-1.3-0.5c-2.4-2.3-5.6-3.6-8.6-3.6c-4.9,0-8.4,3.1-9.7,8.8L356.5,74h-4.6 c-2.9,0-4.7-2.2-4.1-4.9L354.4,39.5z"/> <path id="d1-1" class="st11 d1-1" d="M31.7,23.8c2.3,1.3,4.1,3,5.5,5.3V6.3h12.7v64.6H37.7v-6.6c-1.8,2.8-3.8,4.9-6.1,6.2 c-2.3,1.3-5.1,1.9-8.5,1.9c-5.6,0-10.3-2.3-14.1-6.8S3.2,55.3,3.2,48.2c0-8.2,1.9-14.6,5.6-19.3c3.8-4.7,8.8-7,15.1-7 C26.8,21.9,29.4,22.5,31.7,23.8z M34.7,57.9c1.8-2.6,2.8-6,2.8-10.2c0-5.9-1.5-10-4.4-12.6c-1.8-1.5-3.9-2.3-6.3-2.3 c-3.7,0-6.3,1.4-8.1,4.1c-1.7,2.8-2.6,6.2-2.6,10.3c0,4.4,0.9,8,2.6,10.6c1.7,2.6,4.4,4,7.9,4C30.2,61.8,32.9,60.5,34.7,57.9z"/> <path id="e1-1" class="st11 e1-1" d="M92.4,24c3.3,1.5,6.1,3.9,8.3,7.1c2,2.8,3.2,6.1,3.8,9.9c0.3,2.2,0.5,5.4,0.4,9.5H70 c0.2,4.8,1.9,8.2,5,10.1c1.9,1.2,4.2,1.8,6.9,1.8c2.8,0,5.2-0.7,6.9-2.2c1-0.8,1.8-1.9,2.6-3.3h12.8c-0.3,2.8-1.9,5.7-4.6,8.6 c-4.3,4.7-10.3,7-18,7c-6.4,0-12-2-16.9-5.9c-4.9-3.9-7.3-10.3-7.3-19.2c0-8.3,2.2-14.6,6.6-19.1c4.4-4.4,10.1-6.6,17.1-6.6 C85.3,21.8,89,22.5,92.4,24z M73.7,34.8c-1.8,1.8-2.9,4.3-3.3,7.4h21.5c-0.2-3.3-1.3-5.8-3.3-7.6s-4.5-2.6-7.4-2.6 C77.9,32.1,75.4,33,73.7,34.8z"/> <path id="s1-1" class="st11 s1-1" d="M120.9,55.6c0.3,2.2,0.8,3.8,1.7,4.7c1.6,1.7,4.4,2.5,8.6,2.5c2.5,0,4.4-0.4,5.9-1.1 c1.5-0.7,2.2-1.8,2.2-3.3c0-1.4-0.6-2.5-1.8-3.2c-1.2-0.7-5.5-2-13.1-3.8c-5.4-1.3-9.3-3-11.5-5c-2.2-2-3.3-4.9-3.3-8.6 c0-4.4,1.7-8.2,5.2-11.4c3.5-3.2,8.4-4.8,14.7-4.8c6,0,10.9,1.2,14.6,3.6c3.8,2.4,5.9,6.5,6.5,12.4h-12.5c-0.2-1.6-0.6-2.9-1.4-3.8 c-1.4-1.7-3.7-2.5-7-2.5c-2.7,0-4.7,0.4-5.8,1.3c-1.2,0.8-1.7,1.8-1.7,3c0,1.4,0.6,2.5,1.8,3.1c1.2,0.7,5.6,1.8,13.1,3.5 c5,1.2,8.7,2.9,11.2,5.3c2.5,2.4,3.7,5.4,3.7,9c0,4.7-1.8,8.6-5.3,11.6c-3.5,3-9,4.5-16.4,4.5c-7.5,0-13.1-1.6-16.7-4.8 c-3.6-3.2-5.4-7.2-5.4-12.1H120.9z"/> <path id="i1-1" class="st11 i1-1" d="M174,17.3h-12.7V5.8H174V17.3z M161.4,23H174v47.8h-12.7V23z"/> <path id="g1-1" class="st11 g1-1" d="M209.8,23c3,1.3,5.5,3.6,7.4,6.9V23h12.2v45.4c0,6.2-1,10.8-3.1,14c-3.6,5.4-10.4,8.1-20.5,8.1 c-6.1,0-11.1-1.2-15-3.6c-3.9-2.4-6-6-6.4-10.8H198c0.4,1.5,0.9,2.5,1.7,3.2c1.3,1.1,3.6,1.7,6.8,1.7c4.5,0,7.5-1.5,9-4.5 c1-1.9,1.5-5.2,1.5-9.7v-3.1c-1.2,2-2.5,3.6-3.9,4.6c-2.5,1.9-5.7,2.9-9.7,2.9c-6.1,0-11.1-2.2-14.7-6.5c-3.7-4.3-5.5-10.2-5.5-17.5 c0-7.1,1.8-13.1,5.3-17.9c3.5-4.8,8.5-7.3,15-7.3C205.9,21.9,208,22.3,209.8,23z M214.1,57.3c2-2.2,3-5.7,3-10.6c0-4.5-1-8-2.9-10.4 c-1.9-2.4-4.5-3.6-7.7-3.6c-4.4,0-7.4,2.1-9,6.2c-0.9,2.2-1.3,4.9-1.3,8.1c0,2.8,0.5,5.3,1.4,7.4c1.7,4,4.7,6.1,9.1,6.1 C209.6,60.6,212.1,59.5,214.1,57.3z"/> <path id="n1-1" class="st11 n1-1" d="M279.6,25.8c3.1,2.6,4.7,6.9,4.7,12.9v32.2h-12.8V41.8c0-2.5-0.3-4.4-1-5.8c-1.2-2.5-3.5-3.7-7-3.7 c-4.2,0-7.1,1.8-8.7,5.4c-0.8,1.9-1.2,4.3-1.2,7.3v25.9h-12.5V23.1h12.1v7c1.6-2.5,3.1-4.2,4.5-5.3c2.6-1.9,5.8-2.9,9.7-2.9 C272.5,21.9,276.5,23.2,279.6,25.8z"/> <path id="e1-2" class="st11 e1-2" d="M327.1,24c3.3,1.5,6.1,3.9,8.3,7.1c2,2.8,3.2,6.1,3.8,9.9c0.3,2.2,0.5,5.4,0.4,9.5h-34.8 c0.2,4.8,1.9,8.2,5,10.1c1.9,1.2,4.2,1.8,6.9,1.8c2.8,0,5.2-0.7,6.9-2.2c1-0.8,1.8-1.9,2.6-3.3H339c-0.3,2.8-1.9,5.7-4.6,8.6 c-4.3,4.7-10.3,7-18,7c-6.4,0-12-2-16.9-5.9c-4.9-3.9-7.3-10.3-7.3-19.2c0-8.3,2.2-14.6,6.6-19.1c4.4-4.4,10.1-6.6,17.1-6.6 C320.1,21.8,323.8,22.5,327.1,24z M308.4,34.8c-1.8,1.8-2.9,4.3-3.3,7.4h21.5c-0.2-3.3-1.3-5.8-3.3-7.6c-2-1.7-4.5-2.6-7.4-2.6 C312.7,32.1,310.2,33,308.4,34.8z"/> <path id="r1-1" class="st11 r1-1" d="M372.5,21.9c0.2,0,0.5,0,1.1,0.1v12.8c-0.8-0.1-1.5-0.1-2.1-0.2c-0.6,0-1.1,0-1.5,0 c-5,0-8.4,1.6-10.1,4.9c-1,1.8-1.4,4.7-1.4,8.5v22.9h-12.6V23h11.9v8.3c1.9-3.2,3.6-5.4,5-6.5c2.3-2,5.4-2.9,9.1-2.9 C372.2,21.9,372.4,21.9,372.5,21.9z"/> </svg></div>';
app.designerSVG = function(){
	appDesignerTitle = $( '.designer' );
	appDesignerTitle.html( app.designerString );
	//
	var designerTl = new TimelineMax({paused:true});
	var designerTl2 = new TimelineMax({paused:true});
	var designerTl3 = new TimelineMax({paused:true});
	var designerTl4 = new TimelineMax({paused:true});
	var designerTl5 = new TimelineMax({paused:true});
	var designerTl6 = new TimelineMax({paused:true});
	var designerTl7 = new TimelineMax({paused:true});
	var designerTl8 = new TimelineMax({paused:true});
	//
	designerTl.to("#d1-1", 0.25, {morphSVG:{shape:"#d2-1", shapeIndex:10}, ease:Back.easeOut});
	designerTl2.to("#e1-1", 0.25, {morphSVG:{shape:"#e2-1", shapeIndex:16}, ease:Back.easeOut});
	designerTl3.to("#s1-1", 0.25, {morphSVG:{shape:"#s2-1", shapeIndex:23}, ease:Back.easeOut});
	designerTl4.to("#i1-1", 0.25, {morphSVG:{shape:"#i2-1", shapeIndex:-2}, ease:Back.easeOut});
	designerTl5.to("#g1-1", 0.25, {morphSVG:{shape:"#g2-1", shapeIndex:20}, ease:Back.easeOut});
	designerTl6.to("#n1-1", 0.25, {morphSVG:{shape:"#n2-1", shapeIndex:3}, ease:Back.easeOut});
	designerTl7.to("#e1-2", 0.25, {morphSVG:{shape:"#e2-2", shapeIndex:16}, ease:Back.easeOut});
	designerTl8.to("#r1-1", 0.25, {morphSVG:{shape:"#r2-1", shapeIndex:11}, ease:Back.easeOut});

	appDesignerTitle.mouseenter(function(){
	    designerTl.play(0);
	    designerTl2.play(0);
	    designerTl3.play(0);
	    designerTl4.play(0);
	    designerTl5.play(0);
	    designerTl6.play(0);
	    designerTl7.play(0);
	    designerTl8.play(0);
	    //
		$( '#d1-1' ).css( { fill : '#d3cdcf' } );
		$( '#e1-1' ).css( { fill : '#d3cdcf' } );
		$( '#s1-1' ).css( { fill : '#e37e25' } );
		$( '#i1-1' ).css( { fill : '#e37e25' } );
		$( '#g1-1' ).css( { fill : '#e37e25' } );
		$( '#n1-1' ).css( { fill : '#e37e25' } );
		$( '#e1-2' ).css( { fill : '#e37e25' } );
		$( '#r1-1' ).css( { fill : '#e37e25' } );
	});

	appDesignerTitle.mouseleave(function(){
		designerTl.reverse();
		designerTl2.reverse();
		designerTl3.reverse();
		designerTl4.reverse();
		designerTl5.reverse();
		designerTl6.reverse();
		designerTl7.reverse();
		designerTl8.reverse();
		//
		$( '#d1-1' ).css( { fill : '#1E1E1E' } );
		$( '#e1-1' ).css( { fill : '#1E1E1E' } );
		$( '#s1-1' ).css( { fill : '#1E1E1E' } );
		$( '#i1-1' ).css( { fill : '#1E1E1E' } );
		$( '#g1-1' ).css( { fill : '#1E1E1E' } );
		$( '#n1-1' ).css( { fill : '#1E1E1E' } );
		$( '#e1-2' ).css( { fill : '#1E1E1E' } );
		$( '#r1-1' ).css( { fill : '#1E1E1E' } );
	});

	//
	
}
app.arrowSVG = function(){
	var arrowTl = new TimelineMax({paused:true});
	  arrowTl.to("#straightStart", .05, {morphSVG:{shape:"#frazzledOne"}, ease:Back.easeOut, delay: 4})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledTwo"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledThree"}, ease:Back.easeOut})
	  		 .to("#straightStart", .175, {morphSVG:{shape:"#more"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledFour"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledFive"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#straightEnd"}, ease:Back.easeOut})
	  arrowTl.play(0);
}
//
app.arrowBoolHr = false;
app.arrowBoolDes = false;
app.arrowBoolAni = false;
app.arrowBoolDev = false;
app.arrowBoolCtr = 0;
//
app.showArrowCheck = function(){
	theArrow = $( '.arrowIndicator' );
	if( app.arrowBoolHr === true && app.arrowBoolDes === true && app.arrowBoolAni === true && app.arrowBoolDev === true ) {
		app.arrowBoolCtr++;
		if ( app.arrowBoolCtr === 1 ) {
			app.removeClasses(theArrow, 4000, 'hide-opacity');
			app.removeClasses(theArrow, 4000, 'arrowShift');
			app.arrowSVG();
			console.log('do it');
		}
	} else {
		console.log('nope');
	}
}
//
app.showArrow = function(){
	$('.heyrossContainer').mouseenter(function(){
		app.arrowBoolHr = true;
		app.showArrowCheck();
	})
	$('.designer').mouseenter(function(){
		app.arrowBoolDes = true;
		app.showArrowCheck();
	})
	$('.animator').mouseenter(function(){
		app.arrowBoolAni = true;
		app.showArrowCheck();
	})
	$('.developer').mouseenter(function(){
		app.arrowBoolDev = true;
		app.showArrowCheck();
	})
}
//
app.arrowScrollTop = function(){
	if ( app.windowPercentage >= 30 && app.windowPercentage <= 40 ) {
		app.arrowBaseline = 100;
		app.arrowMath = app.arrowBaseline + (app.windowPercentage - 30) * 10;
		$('header').css({ opacity : app.arrowMath });

		//
		// console.log("BRING IN THE NAV: " + app.navMath);
	} else if ( app.windowPercentage < 30 ){
		$('header').css({ top : '-90px' });
	} else {
		$('header').css({ top : '0px' });
	}
}
//////////////////////////
//GET THE MASTHEAD CONTENT FOR DEVELOPER HEADING
app.devCharLibrary = ['q','w','e','r','t','y','u','i','o','p','[',']','|','a','s','d','f','g','h','j','k','l',';',':','z','x','c','v','b','n','m',',','.','<','>','?','/','1','2','3','4','5','6','7','8','9','-','_','+','!','@','#','$','%','^','&','*','(',')','*','=','~','`'];
//
app.developerChar = function(){
	$('.developer').mouseenter(function(){
		app.developerCharSwitch();
	});
	//
	$('.developer').mouseleave(function(){
		app.revertDevChar();
	});
}
//
app.developerCharSwitch = function(){
	app.grabbedDev = $('.devHolder');
	app.grabbedDevText = app.grabbedDev.text();
	app.devStr = app.grabbedDevText;
	app.devStrArray = app.devStr.split('');
	app.grabbedDev.text('');
	//
	for (t = 0; t < app.grabbedDevText.length; t++) {
		app.grabbedDev.append(document.createTextNode( app.devStrArray[t] ));
	}
	//
	var dPlus = 0;
	app.devCharInterval = setInterval(function(){
		if ( dPlus < 10 ){
				dPlus++;
				app.changeDevChar();
		} else {
			clearInterval(app.devCharInterval);
			app.grabbedDev.text('');
			$('.devIcons').addClass('display-it');
		}
	}, 50)
}
//
app.changeDevChar = function(){
	app.grabbedDev.text('');
		for (r = 0; r < app.grabbedDevText.length; r++) {
			var devCharRandom =  Math.round( Math.random() * 62 );
			app.grabbedDev.append(document.createTextNode( app.devCharLibrary[devCharRandom] ));
		}
}
//
app.revertDevChar = function(){
	clearInterval(app.devCharInterval);
	app.grabbedDev.text('');
	$('.devIcons').removeClass('display-it');
	for (t = 0; t < app.grabbedDevText.length; t++) {
		app.grabbedDev.append(document.createTextNode( app.devStrArray[t] ));
	}
}
//////////////////////////
//////////////////////////
//MASTHEAD ANIMATIONS
//////////////////////////
//////////////////////////
app.removeClasses = function( masthead, timing, theClass ){
	setTimeout(function(){ masthead.removeClass( theClass ) }, timing)
}
//
app.revealStart= function(){
	mastheadOne = $( '.heyrossContainer' );
	mastheadTwo = $( '.designer' );
	mastheadThree = $( '.animator' );
	mastheadFour = $( '.developer' );
	theFooter = $( 'footer' );
	//
	app.removeClasses(mastheadOne, 500, 'hide-opacity');
	app.removeClasses(mastheadTwo, 750, 'hide-opacity');
	app.removeClasses(mastheadThree, 1000, 'hide-opacity');
	app.removeClasses(mastheadFour, 1250, 'hide-opacity');
	//
	app.removeClasses(theFooter, 2500, 'initialFooterPos');
};
//
app.loadMastheadAnims = function(){
	app.mastheadTitle01();
	app.designerSVG();
	//
	app.developerChar();
	//
	app.showArrow();
	////////////////////
	app.revealStart();
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
	app.projLink = projectData[app.dataCaller]['project_link'];
	app.projDesc = projectData[app.dataCaller]['projectdescription'];
	app.projVid = projectData[app.dataCaller]['view_video'];
	app.projPdf = projectData[app.dataCaller]['view_pdf'];
	app.projSkills = projectData[app.dataCaller]['skills'];
	app.thumbImgs = projectData[app.dataCaller]['project_images'];
	app.thumbImgsLength = app.thumbImgs.length;
	
	console.log(app.projSkills);
	// console.log('The caption is: ' + app.imgCaption);
	//
	//GET THE TITLE AND DESCRIPTION
	$('.projectModal h2').html(app.projName);
	$('.projectModal .copy p').html(app.projDesc);
	//
	// CLEAR THE THUMBNAILS AND KEYIMAGE
	$('.projectModal .image .thumbnails').html('<div class="thumbnail></div>');
	$('.projectModal .image .keyImage').html('<div class="keyImage></div>');
	//
	//GET THUMBNAILS
	for (var t = 0; t < app.thumbImgsLength; t++) {
		app.checkImgs = app.thumbImgs[t]['what_image'];
		app.thumbNum = t + 1;
		// 
		if ( app.checkImgs === 'video' ){
			app.getThumbImg = app.thumbImgs[t]['video_image']['sizes']['medium'];
			$('.projectModal .image .thumbnails').append('<div class="thumbnail video" data-type="video" data-number="' + app.thumbNum + '" style="background: url(' + app.getThumbImg + ')">&nbsp;<div class="arrow"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/arrow.svg" alt=""></div></div>');
			//
			$( '.keyimage-fig' ).html(app.imgCaption);
		} else {
			app.getThumbImg = app.thumbImgs[t]['image_image']['sizes']['medium'];
			$('.projectModal .image .thumbnails').append('<div class="thumbnail image" data-type="image" data-number="' + app.thumbNum + '" style="background: url(' + app.getThumbImg + ')">&nbsp;</div>');
		}
		//
	}
	//
	//CHECK TO SEE IF THERE'S MORE THAN ONE THUMBNAIL
	if ( app.thumbImgsLength < 2 ) {
		$( '.thumbnails' ).addClass( 'display-none' );
		console.log("Lets hide the thumbnails!!!!!!!!");
	} else {
		$( '.thumbnails' ).removeClass( 'display-none' );
	}
	//
	app.getSkills();
	app.getProjectLink();
	app.getPdfLink();
	app.changeKeyimage();
	//
	//GET KEYIMAGE
	app.getFirstImg = app.thumbImgs[0]['what_image'];
	app.imgCaption = app.thumbImgs[0]['caption'];
	//
	$( '.keyimage-fig' ).html(app.imgCaption);
	//
	if( app.getFirstImg === 'video' ){
		$('.keyImage').html('<div class="videoWrapper"><iframe src="' + app.projVid + '" frameborder="0" allowfullscreen></iframe></div>');
	} else {
		app.firstImg = app.thumbImgs[0]['image_image']['sizes']['large'];
		$('.keyImage').html('<img src="' + app.firstImg + '" alt="">');
	}
}
//
//////////////////////////
//GET PROJECT LINK
app.getProjectLink = function(){
	if ( app.projLink !== "" ){
		$( '.projectLink' ).html('<a href="http://' + app.projLink + '" target="_"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> See it live</a>');
	} else {
		$( '.projectLink' ).html('');
	}
}
//////////////////////////
//GET PDF LINK
app.getPdfLink = function(){
	app.pdfName = app.projName.replace(/\s+/g, '');
	//
	if ( app.projPdf === true ){
		$( '.pdfLink' ).html('<a href="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/' + app.pdfName + '.pdf" target="_"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Take a closer look</a>');
	} else {
		$( '.pdfLink' ).html('');
	}
}
//
//////////////////////////
//GET SKILLS LINK
app.getSkills = function(){
	$( '.design-icon' ).removeClass( 'display-none' );
	$( '.animation-icon' ).removeClass( 'display-none' );
	$( '.developer-icon' ).removeClass( 'display-none' );
	//
	if ( app.projSkills.indexOf( 'design' ) > -1 ) {
		$( '.design-icon' ).addClass( 'display-none' );
	} else if ( app.projSkills.indexOf( 'animation' ) > -1 ) {
		$( '.animation-icon' ).addClass( 'display-none' );
	} else if ( app.projSkills.indexOf( 'developer' ) > -1 ) {
		$( '.developer-icon' ).addClass( 'display-none' );
	} 
}
//
//////////////////////////
//GET IMAGE RELATED TO THUMBNAIL
app.changeKeyimage = function(){
	$( '.thumbnail' ).click(function(){
		app.dataNumber = $(this).attr('data-number');
		app.dataNumberOffset = app.dataNumber - 1;
		app.getImgType = $(this).attr('data-type');
		app.imgType = app.getImgType + "_image";
		console.log("Image type: " + app.imgType );
		console.log("Image num: " + app.dataNumberOffset );
		//
		app.imgCaption = app.thumbImgs[app.dataNumberOffset]['caption'];
		$( '.keyimage-fig' ).html( app.imgCaption );
		//
		app.getNextImg = projectData[app.dataCaller]['project_images'][app.dataNumberOffset][app.imgType]['sizes']['large'];
		console.log("Next Image: " + app.getNextImg);
		if( app.getImgType === 'video' ){
			$('.keyImage').html('<div class="videoWrapper"><iframe src="' + app.projVid + '" frameborder="0" allowfullscreen></iframe></div>');
		} else {
			$('.keyImage').html('<img src="' + app.getNextImg + '" alt="">');
		}
	});
}
//
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
//////////////////////////
//////////////////////////
//////////////////////////
//////////////////////////
//BEARD ANIMATION
var beardTl = new TimelineMax({paused:true});
beardTl.to("#regBeard", 1, {morphSVG:{shape:"#smileBeard", shapeIndex:21}, ease:Back.easeOut});

$( '.info03 .icon' ).mouseenter(function(){
    beardTl.play(0);
});

$( '.info03 .icon' ).mouseleave(function(){
	beardTl.reverse();
});

//////////////////////////
//////////////////////////x
//////////////////////////
//////////////////////////
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
	//

}
//////////////////////////
//DOCUMENT READY
$(function(){
	app.init();
	//
});
//
