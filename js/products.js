//////////////////////////
//////////////////////////
//PRODUCT LOGIC
//////////////////////////
//////////////////////////
//////////////////////////
//////////////////////////
//
///////////////////////////////
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
			// $(window).trigger('resize');
			// console.log("Projects << : " + app.projectsScrollTop);

			
		} else if ( app.projectsScrollTop > 700 ) {
			app.projectsPercent = 1;
			// console.log("Projects >> : " + app.projectsScrollTop);

		}
		//
		// $( '.project').css( { transform : "translateY(" + app.translateCount + "px)" } );
		$( '.project').each(function(){
			app.whatAmI = $(this).attr('class');
			app.whereWasI = $(this).attr('data-pos');
			getTranslate = $(this).css('transform');
			// console.log('Translate Pos for ' + app.whatAmI + ' is ' + app.whereWasI);
			$( this).css({ transform : 'matrix(1, 0, 0, 1, 0,' + (app.whereWasI * app.projectsPercent) + ') scale(1)' });
		});
		//////////// grab the stored data number and do the math

}
//
//GET PROJECTS JSON
//
app.getProjectInfo = function(){

	app.projName = projectData[app.dataCaller]['projectname'];
	app.projLink = projectData[app.dataCaller]['project_link'];
	app.projDesc = projectData[app.dataCaller]['projectdescription'];
	app.projSkills = projectData[app.dataCaller]['projectskills'];
	// app.projVid = projectData[app.dataCaller]['view_video'];
	app.projPdf = projectData[app.dataCaller]['view_pdf'];
	app.thumbImgs = projectData[app.dataCaller]['project_images'];
	app.thumbImgsLength = app.thumbImgs.length;
	//
	//GET THE TITLE AND DESCRIPTION
	$('.projectModal h2').html(app.projName);
	//
	for( var x = 0; x < app.projDesc.length; x++ ){
		var paraHolder = app.projDesc[x]['paragraph'];

		$('.projectModal .copy .projectDescription').append('<p>' + paraHolder + '</p>');
	}
	
	//
	// CLEAR THE THUMBNAILS AND KEYIMAGE
	$('.projectModal .image .thumbnails').html('<div class="thumbnail></div>');
	$('.projectModal .image .keyImage').html('<div class="keyImage></div>');
	//
	//GET THUMBNAILS
	for (var t = 0; t < app.thumbImgsLength; t++) {
		app.checkImgs = app.thumbImgs[t]['what_image'];
		console.log('The image is: ' + app.checkImgs);
		app.thumbNum = t + 1;
		// 
		if ( app.checkImgs === 'video' ){
			app.getThumbImg = app.thumbImgs[t]['video_image']['sizes']['medium'];
			$('.projectModal .image .thumbnails').append('<div class="thumbnail video" data-type="video" data-number="' + app.thumbNum + '" style="background-image: url(' + app.getThumbImg + ')">&nbsp;<div class="arrow"><img src="http://rossbutcher.ca/new/wp-content/themes/heyross/img/arrow.svg" alt=""></div></div>');
			//
			$( '.keyimage-fig' ).html(app.imgCaption);
		} else {
			app.getThumbImg = app.thumbImgs[t]['image_image']['sizes']['medium'];
			$('.projectModal .image .thumbnails').append('<div class="thumbnail image" data-type="image" data-number="' + app.thumbNum + '" style="background-image: url(' + app.getThumbImg + ')">&nbsp;</div>');
		}
		//
	}
	//
	//CHECK TO SEE IF THERE'S MORE THAN ONE THUMBNAIL
	if ( app.thumbImgsLength < 2 ) {
		$( '.thumbnails' ).addClass( 'display-none' );
		// console.log("Lets hide the thumbnails!!!!!!!!");
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
	app.getVid = app.thumbImgs[0]['video_link'];
	app.imgCaption = app.thumbImgs[0]['caption'];
	//
	$( '.keyimage-fig' ).html(app.imgCaption);
	//
	if( app.getFirstImg === 'video' ){
		$('.keyImage').html('<div class="videoWrapper"><iframe src="' + app.getVid + '?fs=0&rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe></div>');
	} else {
		app.firstImg = app.thumbImgs[0]['image_image']['sizes']['large'];
		$('.keyImage').html('<img src="' + app.firstImg + '" alt="">');
	}
	//SHOW THE MODAL
	$('.projectModalContainer').addClass('show-desc-display');
	setTimeout(function(){
		$('.projectModalContainer').addClass('show-desc-opacity');
	}, 400);
	//
	$('.projectModal').addClass('show-description');

	// forceRedraw();
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
		$( '.pdfLink' ).html('<a href="http://rossbutcher.ca/new/wp-content/themes/heyross/img/' + app.pdfName + '.pdf" target="_"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> Take a closer look</a>');
	} else {
		$( '.pdfLink' ).html('');
	}
}
//
//////////////////////////
//GET SKILLS LINK
app.getSkills = function(){
	//
	var projSkillsTextHldr = '';
	//
	app.projSkillsArray = app.projSkills;
	for( k = 0; k < app.projSkillsArray.length; k++ ){
		if ( k === app.projSkillsArray.length - 1 ){
			projSkillsTextHldr = projSkillsTextHldr + app.projSkillsArray[k];
		} else {
			projSkillsTextHldr = projSkillsTextHldr + app.projSkillsArray[k] + '<span class="skillsSpacer">|</span>';
		}
	}
	$('.projectModal .copy .projectSkills').html( projSkillsTextHldr );
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
		console.log("Video URL: " + app.getNextVid );
		//
		app.imgCaption = app.thumbImgs[app.dataNumberOffset]['caption'];
		$( '.keyimage-fig' ).html( app.imgCaption );
		//
		app.getNextImg = projectData[app.dataCaller]['project_images'][app.dataNumberOffset][app.imgType]['sizes']['large'];
		app.getNextVid = projectData[app.dataCaller]['project_images'][app.dataNumberOffset]['video_link'];
		console.log("Next Image: " + app.getNextImg);
		if( app.getImgType === 'video' ){
			$('.keyImage').html('<div class="videoWrapper"><iframe src="' + app.getNextVid + '?fs=0&rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe></div>');
		} else {
			$('.keyImage').html('<img src="' + app.getNextImg + '" alt="">');
		}
	});
}
// 
//
$( '.next' ).click(function(){
	$( ' .projectDescription' ).html( '' );
	if ( app.dataCaller === app.projectCount-1 ){
		app.dataCaller = 0;
	} else {
		app.dataCaller++;
	}
	app.getProjectInfo();
});
//
$( '.prev' ).click(function(){
	$( ' .projectDescription' ).html( '' );
	if ( app.dataCaller === 0 ){
		app.dataCaller = app.projectCount-1;
	} else {
		app.dataCaller--;
	}
	app.getProjectInfo();

});


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
	});
	//
}
//
//////////////////////////
//OPEN MODUAL
$( '.project' ).mousedown(function(){
	console.log( 'this clicked' );
// 	//
	app.dataNum = $(this).attr('data-number');
	app.dataCaller = app.dataNum - 1;
	app.winWidth = $(window).width();
//
	if ( app.iphoned && app.landscaped ){
  		app.getMobileProjectInfo();
	} else {
	  	if ( app.winWidth >= 665 ){
	  		app.getProjectInfo();
	  	} else {
	  		app.getMobileProjectInfo();
  	}
  }
	
});
//////////////////////////
//CLOSE MODUAL
app.closeModal = function(){
	$( ' .projectDescription' ).html( '' );
	//
	$('.projectModal').removeClass('show-description');
	$('.projectModal .right').html('');
	//
	$('.projectModalContainer').removeClass('show-desc-opacity');
	setTimeout(function(){
		$('.projectModalContainer').removeClass('show-desc-display');
	}, 400);
}

$( '.projectModalContainer .projectModal .close' ).click(function(){
	app.closeModal();
});