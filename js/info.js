//////////////////////////
//ABOUT INFO FUNCTIONALITY
app.infoAnimate01 = $( '.info01' );
app.infoAnimate02 = $( '.info02' );
app.infoAnimate03 = $( '.info03' );
//
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

//////////////////////////
//GROW THE BEARD
//THIS GOES IN THE ABOUT ANIMATE INIT
//
var beardRange = function(val, top, bottom, obj){

	if( val >= top ){
		obj.css({ opacity : 1 });
	} else if ( val >= bottom ){
		obj.css({ opacity : (val - bottom)*3 });
	} else if ( val < bottom ){
		obj.css({ opacity : 0 });
	}
	
}
//
app.growTheBeard = function(){
	//
	var infoAnimate = aboutAnimate(3.5);
	var iPct = infoAnimate[0];
	var iVal = infoAnimate[1];
	//
	//
	var beardOne = $('.beardHolder01');
	var beardTwo = $('.beardHolder02');
	var beardThree = $('.beardHolder03');
	var beardText = $('.info03 .info');
	//
	beardRange(iVal, .333, 0, beardOne);
	beardRange(iVal, .666, .333, beardTwo);
	beardRange(iVal, .9, .666, beardThree);
	beardRange(iVal, .9, .75, beardText);
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
	//

}