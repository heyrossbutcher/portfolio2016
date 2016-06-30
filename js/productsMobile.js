
///////////////////////////////
//GET MOBILE PROJECT INFO
app.getMobileProjectInfo = function(){

	app.projName = projectData[app.dataCaller]['projectname'];
	app.projLink = projectData[app.dataCaller]['project_link'];
	app.projDesc = projectData[app.dataCaller]['projectdescription'];
	app.projSkills = projectData[app.dataCaller]['projectskills'];
	// app.projVid = projectData[app.dataCaller]['view_video'];
	app.projPdf = projectData[app.dataCaller]['view_pdf'];
	app.thumbImgs = projectData[app.dataCaller]['project_images'];
	app.thumbImgsLength = app.thumbImgs.length;
	app.imgCaption = app.thumbImgs[0]['caption'];

	console.log( 'Get the mobile info' );

	var theMobileContent = $( '.mobileProject' + app.dataNum );

	theMobileContent.slideDown( 'slow');
	//
	for( var x = 0; x < app.projDesc.length; x++ ){
		//
		var paraHolder = app.projDesc[x]['paragraph'];
		//
		$( '.mobileProject' + app.dataNum + ' .mobileProjectDescription' ).append('<p>' + paraHolder + '</p>');
	}
	//
	var projSkillsTextHldr = '';
	///////////////////////////
	//SKILLS LIST
	app.projSkillsArray = app.projSkills;
	for( k = 0; k < app.projSkillsArray.length; k++ ){
		if ( k === app.projSkillsArray.length - 1 ){
			projSkillsTextHldr = projSkillsTextHldr + app.projSkillsArray[k];
		} else {
			projSkillsTextHldr = projSkillsTextHldr + app.projSkillsArray[k] + '<span class="skillsSpacer">|</span>';
		}
	}
	$( '.mobileProject' + app.dataNum + ' .mobileProjectSkills' ).html( projSkillsTextHldr );
	//
	var theMobileImages = $( '.mobileProject' + app.dataNum + ' .mobileProjectImages' );
	theMobileImages.html( '' );

	///////////////////////////
	//IMAGE LIST
	for (var t = 0; t < app.thumbImgsLength; t++) {
		app.checkImgs = app.thumbImgs[t]['what_image'];
		app.projVid = app.thumbImgs[t]['video_link'];
		app.thumbNum = t + 1;
		// 
		if ( app.checkImgs === 'video' ){
			app.getThumbImg = app.thumbImgs[t]['video_image']['sizes']['large'];
			theMobileImages.append('<a href="' + app.projVid + '" target="_"><div class="mobileImage mobileVideo" style="background-image: url(' + app.getThumbImg + ')">&nbsp;<div class="arrow"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/arrow.svg" alt=""></div></div></a><div class="mobileFig">' + app.imgCaption + '</div>');
			//
			// $( '.keyimage-fig' ).html(app.imgCaption);
		} else {
			app.getThumbImg = app.thumbImgs[t]['image_image']['sizes']['large'];
			theMobileImages.append('<div class="mobileImage image' + t + '""><img src="' + app.getThumbImg + '" alt=""><div class="mobileFig">' + app.imgCaption + '</div></div>');
		}
		//
	}
	//GET THE LINKS AT THE BOTTOM
	app.getProjectLink();
	app.getPdfLink();

}
/////////////////////////////
//MOBILE PROJECT CLOSE BUTTON
$( '.mobileClose' ).click(function(){
	var getTheParent = $(this).parent();
	// console.log( getTheParent );
	getTheParent.slideUp( "fast", function(){
		$( ' .mobileProjectDescription' ).html( '' );
	} );
	//
});