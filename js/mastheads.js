//////////////////////////
//GET THE MASTHEAD CONTENT
app.navIcons = function(){
	app.grabNav = $('h1');
	app.grabNav.html('<div class="navIcons"><div class="nameIcon"><img src="http://rossbutcher.ca/new/wp-content/themes/heyross/img/name-icon.svg" alt="Hey Ross" title="Hey Ross"></div><div class="nameCopy"><img src="http://rossbutcher.ca/new/wp-content/themes/heyross/img/name-copy.svg" alt="Hey Ross" title="Hey Ross"></div></div>');	
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
			app.grabbedAgain.append('<div class="charWrapper charCtr-' +  x + '" data-pos="' +  x + '"><div class="char letter-' + app.counter + '">' + app.counter + '</div></div>');
			//
			if ( x == app.singleStrArray.length - 1 ) {
				app.grabbed.append('<div class="charWrapper"><div class="space">&nbsp;</div></div>');
			}
			//
			if ( app.counter === 'i' || app.counter === 'y' || app.counter === 't' || app.counter === 'r' || app.counter === 's' || app.counter === 'o' || app.counter === 'e'  || app.counter === 'm' ) {
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
	app.DesignerTitle = $( '.designer' );
	app.DesignerTitle.html( app.designerString );
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

	app.DesignerTitle.mouseenter(function(){
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

	app.DesignerTitle.mouseleave(function(){
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
//////////////////////////
//GET THE MASTHEAD CONTENT FOR ANIMATOR HEADING
//
app.AnimatorTitle = $( '.animator' );
//
app.reversedIt = function(){
	console.log( 'Its been reversed' );
	//
	for (u = 0; u < 8; u++) {
		$( '.aniHolder .charCtr-' + u ).removeAttr( 'style' );
	}
}
//
app.animatorSVG = function(){
	//

	app.animatorResizer(app.win);
	//
	app.AnimatorTitle.mouseenter(function(){
		app.animatorTl.play(0);
	});
	//
	app.AnimatorTitle.mouseleave(function(){
		app.animatorTl.reverse();
		app.animatorTl.eventCallback('onReverseComplete', app.reversedIt );
	});
}
//
app.animatorAnimate = function( a, b, c, d, e, f, g, h, scaled ){
	app.animatorTl = new TimelineMax({paused:true});
	//
	  app.animatorTl.to('.aniHolder .charCtr-0', 0.4, {rotation:720, width: a, scale:scaled, color: '#1b629e', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-1', 0.4, {rotation:720, width: b, scale:scaled, color: '#20709e', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-2', 0.4, {rotation:720, width: c, scale:scaled, color: '#257e9e', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-3', 0.4, {rotation:720, width: d, scale:scaled, color: '#2b8c9f', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-4', 0.4, {rotation:720, width: e, scale:scaled, color: '#319ca0', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-5', 0.4, {rotation:720, width: f, scale:scaled, color: '#36aaa0', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-6', 0.4, {rotation:720, width: g, scale:scaled, color: '#3bb8a1', yoyo:true}, '-=0.3')
					.to('.aniHolder .charCtr-7', 0.4, {rotation:720, width: h, scale:scaled, color: '#40c6a1', yoyo:true}, '-=0.3');
}
//RESETS THE ANIMATOR SPACING ON RESIZE
app.animatorResizer = function(win){
	//
 	if( win.width() > 768 ) {
	    app.animatorAnimate( 38, 43, 13, 58, 42, 21, 38, 38, 0.7 );
	    console.log( 'This is regular widths' );
 	} else if ( win.width() > 665 ) {
	    app.animatorAnimate( 25, 27, 10, 37, 27, 12, 25, 30, 0.7 );
	    console.log( 'This is 665 widths' );
 	} else if ( win.width() > 480 ) {
	    app.animatorAnimate( 24, 26, 10, 38, 26, 14, 26, 30, 0.85 );
	    console.log( 'This is 480 widths' );
 	} else if ( win.width() > 320 ) {
	    app.animatorAnimate( 20, 22, 11, 33, 20, 12, 22, 16, 0.95 );
	    console.log( 'This is 320 widths' );
	}
}
//////////////////////////
//MORE CONTENT ARROW INDICATOR
app.arrowSVG = function( delayed ){
	var arrowTl = new TimelineMax({paused:true});
	  arrowTl.to("#straightStart", .05, {morphSVG:{shape:"#frazzledOne"}, ease:Back.easeOut, delay: delayed})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledTwo"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledThree"}, ease:Back.easeOut})
	  		 .to("#straightStart", .175, {morphSVG:{shape:"#more"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledFour"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#frazzledFive"}, ease:Back.easeOut})
	  		 .to("#straightStart", .05, {morphSVG:{shape:"#straightEnd"}, ease:Back.easeOut});
	  // arrowTl.restart();
	  arrowTl.play(0);
}
//
app.arrowBoolHr = false;
app.arrowBoolDes = false;
app.arrowBoolAni = false;
app.arrowBoolDev = false;
app.arrowBoolCtr = 0;
//
app.theArrow = $( '.arrowIndicator' );
//
app.showArrowCheck = function(){
	if ( app.isMobile !== true){
		if( app.arrowBoolHr === true && app.arrowBoolDes === true && app.arrowBoolAni === true && app.arrowBoolDev === true ) {
			app.arrowBoolCtr++;
			if ( app.arrowBoolCtr === 1 ) {
				app.removeClasses(app.theArrow, 4000, 'hide-opacity');
				app.removeClasses(app.theArrow, 4000, 'arrowShift');
				app.arrowSVG(4);
				// console.log('do it');
			}
		} else {
			// console.log('nope');
		}
	}
}
//
app.showArrowMobile = function(){
	if ( app.isMobile === true){
		app.removeClasses(app.theArrow, 4000, 'hide-opacity');
		app.removeClasses(app.theArrow, 4000, 'arrowShift');
		app.arrowSVG(4);
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
	if ( app.windowPercentage >= 0 && app.windowPercentage <= 20 ) {
		app.arrowBaseline = 100;
		app.arrowMath = Math.abs(app.windowPercentage/20);
		app.arrowMath = 1 - app.arrowMath;
		$('.arrowIndicator').css({ opacity : app.arrowMath });

	} else if ( app.windowPercentage > 20 ) {
		$('.arrowIndicator').css({ opacity : 0 });
	}
}
//
app.logoTop = function(){
	//
	if (app.scrollDiff >= 0){
		app.scrollDiff = app.getTheScroll - 20;
		$(document).scrollTop(app.scrollDiff);
	}
}
//
app.goLogoTop = function(){
	$(document).scroll(function(){
		app.logoTop();
	});
}
//
app.logoClicked = function(){
$( '.navIcons' ).click(function(){
	console.log('logo clicked');
	app.getTheScroll = $(window).scrollTop();
	app.scrollDiff = app.getTheScroll;
	app.goLogoTop();
	$(window).scrollTop(app.getTheScroll-1);
	//
});
	
}
//////////////////////////
//ARROW MOVE TO CONTENT
//
app.arrowMore = function(){
	if (app.scrollDiff <= 700){
		app.scrollDiff = app.getTheScroll + 20;
		$(document).scrollTop(app.scrollDiff);
		// console.log('get scrolling');
	}
}
//
app.arrowCheck = function(){
	$(document).scroll(function(){
		app.arrowMore();
	});
}

//////////////////////////
//GET THE MASTHEAD CONTENT FOR DEVELOPER HEADING
app.devCharLibrary = ['q','w','e','r','t','y','u','i','o','p','[',']','|','a','s','d','f','g','h','j','k','l',';',':','z','x','c','v','b','n','m',',','.','<','>','?','/','1','2','3','4','5','6','7','8','9','-','_','+','!','@','#','$','%','^','&','*','(',')','*','=','~','`'];
//
//
app.developerChar = function(){
	$('.developer').mouseenter(function(){
		app.developerCharSwitch();
	});
	//
	$('.developer').mouseleave(function(){
		app.revertDevChar();
		// 
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
			app.showIcons();
			app.grabbedDev.addClass( 'hide-opacity' );
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
	app.hideIcons();
	
	for (t = 0; t < app.grabbedDevText.length; t++) {
		app.grabbedDev.append(document.createTextNode( app.devStrArray[t] ));
	}
}
app.showIcons = function(){
		// console.log('show icons');
 	var devIconsLength = $('.devIcons').children().length;
 	//
		app.devIconsArray = [];
		for (h = 1; h <= devIconsLength; h++) {
			app.devIconsArray.push(h);
			// console.log( app.devIconsArray );
		}
		//
		var iconTimer = 35;
			for (g = 0; g < devIconsLength; g++) {
					iconTimer = 35 * g;
					//
					setTimeout(function(){
						app.picker = Math.floor( Math.random() * app.devIconsArray.length );
						// app.picker = Math.floor( Math.random() * app.devIconsArray.length );
						$( '.devIcon0' + app.devIconsArray[ app.picker ] ).addClass( 'show-opacity' );
						app.devIconsArray.splice( app.picker, 1 );
						// console.log(iconTimer);
					}, iconTimer);
				}
}
app.hideIcons = function(){
		// console.log('hide icons');
 	var devIconsLength = $('.devIcons').children().length;
 	//
		app.devIconsArray = [];
		for (h = 1; h <= devIconsLength; h++) {
			app.devIconsArray.push(h);
			// console.log( app.devIconsArray );
		}
		//
		var iconTimer = 35;
			for (g = 0; g < devIconsLength; g++) {
				iconTimer = 35 * g;
				//
				setTimeout(function(){
					app.picker = Math.floor( Math.random() * app.devIconsArray.length );
					$( '.devIcon0' + app.devIconsArray[ app.picker ] ).removeClass( 'show-opacity' );
					app.devIconsArray.splice( app.picker, 1 );
					// console.log(iconTimer);
				}, iconTimer);
			}
			setTimeout(function(){
				$('.devIcons').removeClass('display-it');
			}, 350);
			setTimeout(function(){
				app.grabbedDev.removeClass( 'hide-opacity' );
			}, 350);
}


//
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
	app.animatorSVG();
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
		// console.log(app.stateCheck);
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
		// console.log(app.stateCheck);
		var numOfChildren = $('.heyross2 > *').length;
		for (var q = 0; q < numOfChildren; q++) {
			
				app.timer = q*25;
				app.nHolder = q;
				//
				app.removeMastheadTitle01Info(app.nHolder);
		}
	});
}