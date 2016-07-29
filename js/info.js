//////////////////////////
//ABOUT INFO FUNCTIONALITY
app.infoAnimate01 = $( '.info01' );
app.infoAnimate02 = $( '.info02' );
app.infoAnimate03 = $( '.info03' );
//
//
var infoRange = function(val, top, bottom, obj){

	if( val >= top ){
		obj.css({ opacity : 1 });
	} else if ( val >= bottom ){
		obj.css({ opacity : (val - bottom)*3 });
	} else if ( val < bottom ){
		obj.css({ opacity : 0 });
	}
	
}
//
var aboutAnimate = function(offset){
	//
	var infocutoff = Math.floor(app.getTheWindowHeight/offset);
	var infoPct = (Math.floor(app.getTheScroll - infocutoff))/2.5;
	var infoVal = (infoPct/100).toFixed(2);
	//
	// return infoAnimatePct;
	return [infoPct, infoVal];

	//
}
//
//
//THIS GOES IN THE ABOUT ANIMATE INIT
//
//YEARS EXPERIENCE
app.getExperience = function(){
	//
	var infoAnimate = aboutAnimate(5);
	var iPct = infoAnimate[0];
	var iVal = infoAnimate[1];
	//
	var yearsCircle = $('.yearsCircle');
	var exCircle = $('.circleStroke');
	var exFlipper = $('.flipper');
	var exText = $('.info01 .info');
	//
	var x = 1600;
	var cUnit = x;
	var cOff = x;
	var cPct = ((cUnit/100)* iPct)*1.5;
	var cTotal = cPct + cOff;
	//
	// exCircle.css({'stroke-dashoffset' : 2500});
	if (  cTotal > 3200 ){
		exCircle.attr('style', "stroke-dashoffset:3200; opacity: 1");
	} else if( cTotal >= 1600 && cTotal <=3200 ){
		exCircle.attr('style', "stroke-dashoffset:"+ cTotal + "; opacity: " + iVal );
	} else {
		exCircle.attr('style', "stroke-dashoffset:1600; opacity: 0");
	}
	//
	if (  iVal > 1 ){
		exFlipper.css({opacity:1});
		yearsCircle.css({'display': 'none'});
	} else if( iVal >= .5 && iVal <=1 ){
		exFlipper.css({opacity: (iVal - .5)*3});
		yearsCircle.css({'display': 'block'});
	} else {
		exFlipper.css({opacity:0});
	}
	//
	var bottom =.85;
	if( iVal >= 1 ){
		exText.css({ opacity : 1 });
	} else if ( iVal >= bottom ){
		exText.css({ opacity : (iVal - bottom)*3 });
	} else if ( iVal < bottom ){
		exText.css({ opacity : 0 });
	}
}
//
//THIS GOES IN THE ABOUT ANIMATE INIT
//
//AIR HOCKEY
//
//
app.airHockey = function(){
	//
	var infoAnimate = aboutAnimate(4);
	var iPct = infoAnimate[0];
	var iVal = infoAnimate[1];
	//
	var ahHandle = $('#handle');
	var ahLines = $('#Lines');
	var ahBang = $('#bang');
	var ahText = $('.info02 .info');
	//
	var puckOpac = iVal * 2;
	//
	infoRange(iVal, .666, .333, ahHandle);
	infoRange(iVal, .8, .666, ahBang);
	infoRange(iVal, .8, .666, ahLines);
	infoRange(iVal, .9, .75, ahText);
	//
}

//
//////////////////////////
//GROW THE BEARD

//THIS GOES IN THE ABOUT ANIMATE INIT
//
app.growTheBeard = function(){
	//
	var infoAnimate = aboutAnimate(3);
	var iPct = infoAnimate[0];
	var iVal = infoAnimate[1];
	//
	//
	var beardOne = $('.beardHolder01');
	var beardTwo = $('.beardHolder02');
	var beardThree = $('.beardHolder03');
	var beardText = $('.info03 .info');
	//
	infoRange(iVal, .333, 0, beardOne);
	infoRange(iVal, .666, .333, beardTwo);
	infoRange(iVal, .9, .666, beardThree);
	infoRange(iVal, .9, .75, beardText);
	//
	
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
	app.grabbedBeard.html('<p>Bearded for</p><p>' + app.days + ' days</p><p>' + app.hours + ' hours</p><p>' + app.mins + '  mins</p>' );
	//
}
//////////////////////////
//////////////////////////
//////////////////////////
//BEARD ANIMATION
var beardTl = new TimelineMax({paused:true});
beardTl.to("#regBeard", 1, {morphSVG:{shape:"#smileBeard", shapeIndex:21}, ease:Back.easeOut})
		.to('.beardHolder01', .2, {css:{opacity:0}, ease:Back.easeOut}, '-=1')
		.to('.beardHolder02', .2, {css:{opacity:0}, ease:Back.easeOut}, '-=1.2');

$( '.info03 .iconHolder' ).mouseenter(function(){
	console.log(app.infoColorPct);
	    beardTl.play(0);
});

$( '.info03 .iconHolder' ).mouseleave(function(){
		beardTl.reverse();
});


//////////////////////////
//FLIP THE 14 YEAR ICON
//
$( '.flipper' ).mouseenter(function(){
	if ( !is_safari()   ) {
		$( this ).addClass( 'flipYears' );
	} 
});
$( '.flipper' ).mouseleave(function(){
	$( this ).removeClass( 'flipYears' );
});
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
/////////////////////////////////////////////
//
app.aboutAnimateInit = function(){
	//
	app.growTheBeard();
	app.getExperience();
	app.airHockey();
	//

}