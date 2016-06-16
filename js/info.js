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


//////////////////////////
//////////////////////////
//////////////////////////
//////////////////////////
//////////////////////////
//BEARD ANIMATION
var beardTl = new TimelineMax({paused:true});
beardTl.to("#regBeard", 1, {morphSVG:{shape:"#smileBeard", shapeIndex:21}, ease:Back.easeOut});

$( '.info03 .iconHolder' ).mouseenter(function(){
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