<?php get_header();  ?>

<div class="main">
        <?php 
            $args = array( 
                'post_type' => 'projects', 
                'post_status' => 'publish', 
                'nopaging' => true 
            );
            $query = new WP_Query( $args ); // $query is the WP_Query Object
            $posts = $query->get_posts();   // $posts contains the post objects

            $projectOutput = array();
            foreach( $posts as $post ) {    // Pluck the id and title attributes
                $projectOutput[] = array( 'customField' => $post->acf = get_fields($post->id) );
            }
            json_encode( $projectOutput, JSON_PRETTY_PRINT );
            // pre_r($projectOutput[0]['customField']['projects']);
           ?>
           <script type="text/javascript">
              var projectObj = '<?php echo json_encode( $projectOutput[0]['customField']['projects'] ); ?>';
              var projectData = JSON.parse(projectObj);
              //

           </script>
    <div class="projectModalContainer">

        <div class="projectModal">
          <!--  -->
          <div class="close">+</div>
          <!--  -->
          <h2></h2>
          <div class="copy">
            <div class="projectDescription"></div>
            <div class="projectSkills"></div>
            <div class="links clearfix">
              <div class="projectLink"><a href="">See it live</a></div>
              <div class="pdfLink"><a href="">Take a closer look</a></div>
            </div>
          </div>
          <div class="image">
            <div class="keyImage"></div>
            <figure class="keyimage-fig">test content</figure>
            <div class="thumbnails">
            </div>
          </div>
          <!-- <div class="arrowHolder"> -->
            <div class="arrows prev">
              <svg version="1.1" id="arrowCircle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 48 48.2" style="enable-background:new 0 0 48 48.2;" xml:space="preserve">
              <style type="text/css">
                .st103{fill:#FFFFFF;}
              </style>
              <circle class="prevCircle" cx="24" cy="24.2" r="23"/>
              <g>
                <path class="st103" d="M27.4,24.1l-9.9-4.2v-7L35,21.2v6l-17.5,8.2v-7L27.4,24.1z"/>
              </g>
              </svg>
            </div>
            <div class="arrows next">
              <svg version="1.1" id="arrowCircle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 48 48.2" style="enable-background:new 0 0 48 48.2;" xml:space="preserve">
              <style type="text/css">
                .st103{fill:#FFFFFF;}
              </style>
              <circle class="nextCircle" cx="24" cy="24.2" r="23"/>
              <g>
                <path class="st103" d="M27.4,24.1l-9.9-4.2v-7L35,21.2v6l-17.5,8.2v-7L27.4,24.1z"/>
              </g>
              </svg>
            </div>
          <!-- </div> -->
        </div>

    </div>
    <!--  -->
  <div class="container">

      <section class="masthead">

      <?php $latestPosts = new wp_query(array(
        'post_type' => 'masthead',
        'posts_per_page' => -1
      )) ?> 
      
      <?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post() ?>
        <?php $states = get_field('states');  ?>
        <?php foreach ($states as $state_data) {
          // pre_r($state_data);
            $initialState = $state_data['initial_state'];
            $initialState = strtolower($initialState);
            $secondaryState = $state_data['secondary_state'];
            $secondaryState = strtolower($secondaryState);
            //
            if($initialState == "heyross") {
              echo '<div class="masthead-title clearfix">';
              echo '<div class="hide-opacity heyrossContainer">&nbsp;';
              echo '<div class="heyross1 clearfix">';
              echo $initialState;
              echo '</div>';
              echo '<div class="heyross2 clearfix">';
              echo $secondaryState;
              echo '</div>';
              echo '</div>';
              echo '</div>';
              // pre_r('YOU GOT THE HEY ROSS');
            } else if ($initialState == "developer") {
                echo '<div class="'.$initialState.' masthead-title hide-opacity clearfix">';
                echo '<div class="devIcons">';
                echo '<div class="devIcon devIcon01"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/html5.svg" alt=""></div>';
                echo '<div class="devIcon devIcon02"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/js.svg" alt=""></div>';
                echo '<div class="devIcon devIcon03"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/wordpress.svg" alt=""></div>';
                echo '<div class="devIcon devIcon04"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/swift.svg" alt=""></div>';
                echo '<div class="devIcon devIcon05"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/gulp.svg" alt=""></div>';
                echo '<div class="devIcon devIcon06"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/github.svg" alt=""></div>';
                echo '<div class="devIcon devIcon07"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/terminal.png" alt=""></div>';
                echo '<div class="devIcon devIcon08"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/sublime-text.png" alt=""></div>';
                echo '<div class="devIcon devIcon09"><img src="http://rossbutcher.ca/wp-content/themes/heyross/img/icons/mamp.png" alt=""></div>';
                echo '</div>';
                echo '<div class="devHolder">';
                echo $initialState;
                echo '</div>';
                echo '</div>';
          } else if ($initialState == "animator") {
                echo '<div class="'.$initialState.' masthead-title hide-opacity clearfix">';
                echo '&nbsp;';
                echo '<div class="aniHolder ah">';
                echo $initialState;
                echo '</div>';
                echo '</div>';
            } else {
              echo '<div class="'.$initialState.' masthead-title hide-opacity clearfix">';
              echo $initialState;
              echo '</div>';
            }

           }
        ?>
      <?php endwhile; ?> 

        <div class="hide-opacity arrowShift arrowIndicator">
          <svg version="1.1" id="arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 286 281" style="enable-background:new 0 0 286 281;" xml:space="preserve">
          <style type="text/css">
            .st10{display:none;}
          </style>
          <path id="straightEnd" class="st10" d="M148.7,76v160.2c8.9-9.1,21.6-17.8,38-26.1v8.3c-17.7,15.8-31.1,32.6-40.3,50.6h-6.9
  c-9.2-17.9-22.6-34.8-40.3-50.6V210c16.5,8.4,29.2,17.1,38,26.1V76H148.7z"/>
          <path id="frazzledFive" class="st0" d="M148.7,17l54,20.3l-54,17.3l92,4.7l-84,70.8l95.3,17.2l-144.7,29.3l2.7,25.3l-15.3,34.2
            c5.9-6,26-24.8,28.6-36.8c1.2-5.4,3.8,13.5,9.4,10.7v5.3c-6.3,5.6-13.5,9.5-18.7,15.3c-9.4,10.7-15.4,17.1-21.3,28.7l-7.1,9.6
            c-2.2-4.3-4.7-8.6-7.4-12.8c-3.7-5.8-7.9-11.5-12.6-17c-6-7.1-12.7-14-20.3-20.7l9.4-12.3c5.3,2.7,7.7,13.9,12.2,16.7
            c9.6,5.9,10.4,7.4,16.5,13.5l10-22.8l-28.7-40.7L177.3,152l-76-16.7l36-28.7L180.5,68l-43.2-5.3l-98-6.7l141.3-19.3L137.3,17H148.7z
            "/>
          <path id="frazzledFour" class="st10" d="M148.7,17l54,20.3l-64,16l102,6l-136,76l140-20.7l-137.3,62L199,202l-15.3,34.2
            c5.9-6,60.9-43.5,63.6-55.5c1.2-5.4-5.3,30.2,0.3,27.3v5.3c-6.3,5.6-13.5,9.5-18.7,15.3c-9.4,10.7-30.8,9.7-36.7,21.3l14.2,18.9
            c-2.2-4.3-36.5-8.6-39.2-12.8c-3.7-5.8-7.9-11.5-12.6-17c-6-7.1-12.7-14-20.3-20.7l9.4-12.3c5.3,2.7,7.7,13.9,12.2,16.7
            c9.6,5.9,10.4,7.4,16.5,13.5l10-22.8L64.7,172.7L170,119.3l-134.7-62L98.7,124l81.8-56l-43.2-5.3l-98-6.7l141.3-19.3l-56-14.7
            L148.7,17z"/>
          <path id="frazzledThree" class="st10" d="M148.7,17l6.6,20.3l-40.7,18l72.1,29.3l-38,12.7l17.3,17.3l76.7,32.3l-124,20.4l-27.3,50.2
            c4.9-5,61.3-36.1,68.4-40.8c0,0-37.8,18.5-30.4,14.7v8.3c-4,3.6-7.9,7.3-11.4,11c-5.6,5.8-10.6,11.7-15.1,17.7
            c-5.3,7.1-9.9,14.4-13.7,21.9h-6.9c-3.5-6.8,3.2-11.1-1.5-17.6c-4.9-6.7-21.1-15.6-27.3-22c-3.6-3.7-7.4-7.4-11.5-11L20,175.3
            c6.2,3.1,33.7,22.3,38.8,25.6l14.2-0.2l25.6-34L222,144.5L70.7,108.7L159.3,84L96,52l41.3-18.7V17H148.7z"/>
          <path id="more" d="M221.3,167.5v-11.8h32.3v-9.4h-32.3v-10.7h34.1v-9.8h-48v49.5c-1.3-3-1.4-7.2-1.4-9.2c0-5-0.9-12.8-7.1-13.8v-0.1
            c5.8-2.1,8.4-6.1,8.4-12.4c0-5.3-2.4-14-16.6-14h-37.4V147c-1.3-10.3-7.8-22.5-31.7-22.5c-23.9,0-30.3,12.2-31.7,22.5v-21H69.3
            l-15.3,37l-15.3-37H18.2v51.4h13.5v-41.2h0.1l16.3,41.2h11.7l16.3-41.2h0.1v41.2h13.5v-21c1.3,10.2,7.8,22.5,31.7,22.5
            c23.9,0,30.4-12.2,31.7-22.5v21.1h14v-18.9h17.4c4.3,0,7.4,1.8,7.4,9c0,5.4,0.1,7.5,1.4,9.9h14h1.2h47.1v-9.8H221.3z M121.5,169
            c-12.7,0-17.1-9.4-17.1-17.4s4.5-17.4,17.1-17.4c12.7,0,17.1,9.4,17.1,17.4S134.2,169,121.5,169z M185.6,148.7h-18.5v-13h17.8
            c3.4,0,7.4,1.3,7.4,6.4C192.3,146.9,188.7,148.7,185.6,148.7z"/>
          <path id="frazzledTwo" class="st10" d="M148.7,17l6.6,20.3l-123-9.1l72.1,29.3l44.3,39.8l17.3,17.3l76.7,32.3l-124,20.4
            l-27.3,50.2c4.9-5,61.3-36.1,68.4-40.8c0,0-37.8,18.5-30.4,14.7v8.3c-4,3.6-7.9,7.3-11.4,11c-5.6,5.8-10.6,11.7-15.1,17.7
            c-5.3,7.1-9.9,14.4-13.7,21.9h-6.9c-3.5-6.8,3.2-11.1-1.5-17.6c-4.9-6.7-21.1-15.6-27.3-22c-3.6-3.7-7.4-7.4-11.5-11L20,175.3
            c6.2,3.1,33.7,22.3,38.8,25.6l14.2-0.2l25.6-34L222,144.5L70.7,108.7L159.3,84L96,52l41.3-18.7V17H148.7z"/>
          <path id="frazzledOne" class="st10" d="M148.7,37.3l54,17.1l-54,14.5l92,3.9l-136,63.7L252,146.6l-144.7,24.6l56.7,21.2
            l-15.3,28.7c5.9-5,26-20.8,28.6-30.9c1.2-4.6,3.8,11.4,9.4,9v4.5c-6.3,4.7-13.5,7.9-18.7,12.9c-9.4,8.9-15.4,14.3-21.3,24l-7.1,8
            c-2.2-3.6-4.7-7.2-7.4-10.7c-3.7-4.9-7.9-9.6-12.6-14.3c-6-6-12.7-11.8-20.3-17.4l9.4-10.3c5.3,2.3,7.7,11.7,12.2,14
            c9.6,4.9,10.4,6.2,16.5,11.3l10-19.2l-82.7-34.1l112.7-17.3l-128-9.6l88-28.4l43.2-32.4l-43.2-4.5l-98-5.6l141.3-16.2l-43.4-16.5
            H148.7z"/>
          <path id="straightStart" d="M148.7,76v160.2c8.9-9.1,21.6-17.8,38-26.1v8.3c-17.7,15.8-31.1,32.6-40.3,50.6h-6.9
  c-9.2-17.9-22.6-34.8-40.3-50.6V210c16.5,8.4,29.2,17.1,38,26.1V76H148.7z"/>
          </svg>
        </div>
      </section>
      

      <section class="about">
        <div class="infographics clearfix">
          <div class="info01 clearfix">
          <div class="iconHolder">  
            <div class="yearsCircle">
              <svg version="1.1" id="CIRCLE" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="-150.7 45.3 544.2 523.7" style="enable-background:new -150.7 45.3 544.2 523.7;" xml:space="preserve">
              <path class="circleStroke" d="M121.4,51.8c-141,0-255.3,114.4-255.3,255.3s114.4,255.3,255.3,255.3c141,0,255.3-114.5,255.3-255.4
                C376.7,166,262.5,51.8,121.4,51.8z"/>
              </svg>
            </div>
            <div class="flipper">&nbsp;
              <div class="iconFirst" alt="14 Years experience" title="14 Years experience" title="14 Years experience" title="14 Years experience">
                
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="-150.7 45.3 544.2 523.7" style="enable-background:new -150.7 45.3 544.2 523.7;" xml:space="preserve">
                <g id="Layer_1_1_">
                  <g>
                    <path class="ft0" d="M121.4,51.8c-141,0-255.3,114.4-255.3,255.3s114.4,255.3,255.3,255.3c141,0,255.3-114.5,255.3-255.4
                      C376.7,166,262.5,51.8,121.4,51.8z"/>
                  </g>
                </g>
                <g id="TEXT">
                  <g>
                    <path class="ft1" d="M73.1,344.3H32.4V214.2H-18v-30.7c28.4,0.6,54.5-9.2,58.8-39.8h32.4v200.6H73.1z"/>
                    <path class="ft1" d="M190.3,297.9h-84.8v-37.3l87.1-116.9H229v120.7h26.7v33.5H229v46.4h-38.7V297.9z M190.3,194.7h-0.9
                      l-51.9,69.6h52.7L190.3,194.7L190.3,194.7z"/>
                  </g>
                  <g>
                    <path class="ft1" d="M22.7,390.5l-11.2-18.6H19l7.1,12l7.1-12h7.4l-11.3,18.7v11.7h-6.7L22.7,390.5L22.7,390.5z"/>
                    <path class="ft1" d="M43.2,371.9h22.7v5.6h-16v6.5h14.7v5.2H49.9v7.4h16.4v5.6H43.2L43.2,371.9L43.2,371.9z"/>
                    <path class="ft1" d="M79.1,371.9H86l11.4,30.4h-6.9l-2.3-6.8H76.8l-2.4,6.8h-6.8L79.1,371.9z M78.4,390.6h7.9l-3.8-11.1h-0.1
                      L78.4,390.6z"/>
                    <path class="ft1" d="M99.9,371.9h16.4c5.4,0,8.9,3.8,8.9,8.4c0,3.6-1.4,6.3-4.8,7.6v0.1c3.3,0.9,4.2,4,4.4,7.1
                      c0.1,1.9,0.1,5.5,1.3,7.2h-6.7c-0.8-1.9-0.7-4.9-1.1-7.3c-0.5-3.2-1.7-4.6-5.1-4.6h-6.7v11.9h-6.7v-30.4H99.9z M106.6,385.7h7.3
                      c3,0,4.6-1.3,4.6-4.3c0-2.9-1.6-4.2-4.6-4.2h-7.3V385.7z"/>
                    <path class="ft1" d="M135.2,392.2c0,4,3.1,5.6,6.7,5.6c2.3,0,5.9-0.7,5.9-3.8c0-3.3-4.6-3.8-9-5c-4.5-1.2-9.1-2.9-9.1-8.6
                      c0-6.2,5.9-9.2,11.4-9.2c6.3,0,12.2,2.8,12.2,9.8h-6.5c-0.2-3.7-2.8-4.6-6-4.6c-2.1,0-4.6,0.9-4.6,3.4c0,2.3,1.4,2.6,9.1,4.6
                      c2.2,0.6,9,2,9,8.9c0,5.6-4.4,9.7-12.6,9.7c-6.7,0-13-3.3-12.9-10.8L135.2,392.2L135.2,392.2z"/>
                    <path class="ft1" d="M183.7,371.2c9.4,0,14.9,7,14.9,16c0,8.8-5.5,15.8-14.9,15.8s-14.9-7-14.9-15.8
                      C168.8,378.2,174.3,371.2,183.7,371.2z M183.7,397.4c6,0,8.3-5.1,8.3-10.2c0-5.3-2.3-10.4-8.3-10.4s-8.3,5.1-8.3,10.4
                      C175.4,392.3,177.7,397.4,183.7,397.4z"/>
                    <path class="ft1" d="M203.2,371.9h21.4v5.6h-14.7v7h12.7v5.2h-12.7v12.6h-6.7V371.9z"/>
                    <path class="ft1" d="M-15.1,415.9H7.6v5.6h-16v6.5H6.3v5.2H-8.4v7.4H8v5.6h-23.1L-15.1,415.9L-15.1,415.9z"/>
                    <path class="ft1" d="M20,430.4l-9.8-14.5h7.7l6,9.7l6.2-9.7h7.3l-9.7,14.5l10.6,15.9h-8l-6.6-10.5l-6.8,10.5H9.4L20,430.4z"/>
                    <path class="ft1" d="M40.9,415.9h13.7c7.6,0,10.5,4.8,10.5,9.7s-2.9,9.7-10.5,9.7h-7v10.9h-6.7V415.9z M47.6,430.2h5.2
                      c3.1,0,5.9-0.7,5.9-4.6c0-3.9-2.8-4.6-5.9-4.6h-5.2V430.2z"/>
                    <path class="ft1" d="M69.3,415.9H92v5.6H76v6.5h14.7v5.2H76v7.4h16.4v5.6H69.3L69.3,415.9L69.3,415.9z"/>
                    <path class="ft1" d="M96.8,415.9h16.4c5.4,0,8.9,3.8,8.9,8.4c0,3.6-1.4,6.3-4.8,7.6v0.1c3.3,0.9,4.2,4,4.4,7.1
                      c0.1,1.9,0.1,5.5,1.3,7.2h-6.7c-0.8-1.9-0.7-4.9-1.1-7.3c-0.5-3.2-1.7-4.6-5.1-4.6h-6.7v11.9h-6.7v-30.4H96.8z M103.5,429.7h7.3
                      c3,0,4.6-1.3,4.6-4.3c0-2.9-1.6-4.2-4.6-4.2h-7.3V429.7z"/>
                    <path class="ft1" d="M127.6,415.9h6.7v30.4h-6.7V415.9z"/>
                    <path class="ft1" d="M140.1,415.9h22.7v5.6h-16v6.5h14.7v5.2h-14.7v7.4h16.4v5.6h-23.1L140.1,415.9L140.1,415.9z"/>
                    <path class="ft1" d="M167.7,415.9h6.6l12.7,20.4h0.1v-20.4h6.3v30.4h-6.7L174.1,426H174v20.3h-6.3V415.9z"/>
                    <path class="ft1" d="M219.5,426.1c-0.4-3-3.3-5.3-6.6-5.3c-6,0-8.3,5.1-8.3,10.4c0,5.1,2.3,10.2,8.3,10.2c4.1,0,6.4-2.8,6.9-6.8
                      h6.5c-0.7,7.6-5.9,12.4-13.4,12.4c-9.4,0-14.9-7-14.9-15.8c0-9,5.5-16,14.9-16c6.7,0,12.3,3.9,13.1,10.9L219.5,426.1L219.5,426.1z
                      "/>
                    <path class="ft1" d="M230.7,415.9h22.7v5.6h-16v6.5h14.7v5.2h-14.7v7.4h16.4v5.6h-23.1L230.7,415.9L230.7,415.9z"/>
                  </g>
                </g>
                </svg>
               

              </div>
              <div class="iconSecond" alt="Image of a thumbs up" title="Image of a thumbs up" title="Image of a thumbs up" title="Image of a thumbs up">
                
                <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="-150.7 45.3 544.2 523.7" style="enable-background:new -150.7 45.3 544.2 523.7;" xml:space="preserve">
                <g id="Layer_1_2_">
                  <g>
                    <path class="thu0" d="M121.4,51.8c-141,0-255.3,114.4-255.3,255.3s114.4,255.3,255.3,255.3c141,0,255.3-114.5,255.3-255.4
                      C376.7,166,262.5,51.8,121.4,51.8z"/>
                  </g>
                </g>
                <g id="Layer_2_1_">
                  <path class="thu1" d="M46.1,270.8c7.3,7,13.2,7.6,13.2,7.6c36,5.9,39.5,11.5,39.5,11.5c15.7,14.4,1.4,23,1.4,23l-26.6,3.8
                    c-15.3,1.6-26.5-1.1-26.5-1.1l-42-17.1c-15.4-10.8,6.1-38.4,6.1-38.4c13.8-10.6,49.1-3.2,49.1-3.2c19.6,0.4,53.1-7.7,53.1-7.7
                    c11.1-1.5,10.4-20.1,10.4-20.1c0.1-4.9-20.9-44.5-20.9-44.5c-22.5-46.4,6.2-61.7,6.2-61.7c9.9-4.7,13.4-0.1,13.4-0.1l11.4,31.7
                    c8.3,9.4,14.7,27.8,14.7,27.8c4.9,9.3,25,26.7,25,26.7c12.4,8.6,17.9,19.6,17.9,19.6l27.6,66.4c3.9,9,4.2,9.2,4.2,9.2
                    s152.5,8.5,152.1,13.4c-6,79.2-41.1,128.5-41.1,128.5L259,417.9c0,0-22.5-6.6-41.9-3.1c0,0-12.7,7.6-32,11c0,0-48.8,14.6-68.1,10.1
                    c0,0-6.2-1-12.8,1.7c0,0-3,5.2-16.4-1.7c0,0-12.5-3.2-19.1-3.9c0,0-21.6-4-29-9.8"/>
                  <path class="thu1" d="M31.8,394.1c0,0-13.3,15.9,1.4,26.8c0,0,5.8,6.3,48.7-6.5c0,0,19.4-7.1,24.5-16.4c0,0,3.7-7.4-1.7-15.2
                    c0,0-4.1-4.8-10.3-4.8"/>
                  <path class="thu1" d="M12.2,350.2c0,0-10.8,10-8.2,24.5c0,0,5.6,22.9,31.6,18.9c0,0,46.2-9.1,49.1-12.1c0,0,22.1-5.9,24-20.2
                    c0,0,1.2-12.5-14.2-18"/>
                  <path class="thu1" d="M14.5,302.4c0,0-17.7,8.5-19.8,17.6c0,0-6.8,24.4,14.5,29.8c0,0,41,5.5,58,1.9c0,0,23.7-5.7,24.7-6.9
                    c0,0,7-2.1,7.3-13.3c0,0,1.3-11.6-7.1-17.5"/>
                  <path class="thu2" d="M99.9,413.7c0,0-0.7,15.7,3.9,24.9c0,0-4.8,3-7.2,0.7C96.7,439.4,97.6,421.5,99.9,413.7z"/>
                  <path class="thu2" d="M67.6,420.5l-3.4,11l4.8,0.6C69.1,432,65.7,428.3,67.6,420.5z"/>
                  <path class="thu3" d="M96.2,318.5c0,0-10.2-1.3-11.6,4.8c0,0-2.7,16.3,4.4,16.9c3.2,0.3,8-1.3,8-1.3"/>
                  <path class="thu4" d="M101.9,347.4c0,0-11.1,1-11.2,6.3c0,0,2,4.8,4,12.4c1.9,7.4,8.3,0.7,13.1-1.4"/>
                  <path class="thu4" d="M99.7,378.9l-9,4.4c0,0-0.7,2.3,1.2,8.4c0,0,1.2,6,8.1,5l7.1-1.6"/>
                  <path class="thu2" d="M82,390.3c0,0,7.6,10.5,6.4,14c0,0,0.7,5.5-14,8.1C74.4,412.2,93.1,407.5,82,390.3z"/>
                  <path class="thu2" d="M76.2,327c0,0,5.6,17.2-2.6,20.1c0,0-33.5,5.6-63.5-1.9c0,0,56.2,4.8,60.8-1.8C70.8,343.4,74.7,341.9,76.2,327
                    z"/>
                  <path class="thu2" d="M80.1,356.8c0,0,7.3,8.3,5.8,17.8c0,0,1,1.5-5.3,3.5L35.1,388c0,0-12.5,1.6-17.1-3c0,0,11.7,3.2,22.3-1.2
                    l34.4-9.2C74.6,374.6,84.4,371.9,80.1,356.8z"/>
                  <path class="thu2" d="M231.7,315.5c0,0-10.4,19.8-10.3,33.6c0,0,0.7,13.3-1.1,17.8c0,0-3.6,14.6-2.5,18.6c0,0,1.7,12.8-0.4,19.6
                    c0,0,2.6,0.4,4.5-23.9c0,0,3-12.9,6.1-35.2C228,346,225.9,332.9,231.7,315.5z"/>
                  <path class="thu2" d="M243.2,386.7c0,0,3.7-19.3,3.7-26.5c0,0,9.3-31.6,4-38.9l3.7,2.2c0,0-3,33-5.8,39.1
                    C249,362.6,249.2,378.6,243.2,386.7z"/>
                  <path class="thu2" d="M114.3,415.7c0,0-1.9,18.4,13.7,18.1c0,0,66.3-3.8,83.7-15.8c0,0-27.3,10.5-68.9,17.7
                    C142.9,435.7,106.5,447.4,114.3,415.7z"/>
                  <path class="thu2" d="M8.1,318.5c0,0-4.1-2.1-7.2,0.5c0,0-6,6.8,2.1,21.4c0,0-4.6-7.7,0.8-18.6L8.1,318.5z"/>
                  <path class="thu2" d="M207.7,399.6c0,0,0.5,9-3.5,11.4c0,0-48.7,12.9-66.1,14.3C138.1,425.3,202.3,412.5,207.7,399.6z"/>
                  <path class="thu2" d="M104.8,126.3c0,0-19.9,23.9,1.5,59.6c0,0,7.4-1,10.3-2.9c0,0-10.1,8.3-7.3,13.8
                    C109.4,196.9,79.9,151.8,104.8,126.3z"/>
                  <path class="thu2" d="M120.5,384.2c0,0,20.9-17.2,22.1-27.3c0,0-28.8-45.4-18.6-84.3c0,0,6-14.7,5.7-12.5s-5.4,19.3-4.1,30.2
                    c0,0,0,37.3,24.4,66.5C149.9,356.8,131.2,384.2,120.5,384.2z"/>
                  <path class="thu2" d="M193.2,259.8c0,0,13.1,23.3,16.8,40s4.8,22.7-2.9,34c0,0-7.4,16.1-16,26.1c0,0,12.8-25.7,13.7-46.1
                    C204.9,313.7,207.7,294,193.2,259.8z"/>
                  <path class="thu4" d="M116.5,120.8c0,0,4.8,19.9,7.8,27.9c2.9,8,9.9,5.8,9.9,5.8"/>
                  <path class="thu2" d="M83.4,261.1c0,0,3.7,9.9,2.7,22l3.6,1.1C89.7,284,87.3,264.8,83.4,261.1z"/>
                  <path class="thu2" d="M62.4,261.8c0,0,5.1,9.2,2.7,17.7l-5.7-1C59.3,278.5,63.4,276.9,62.4,261.8z"/>
                  <path class="thu2" d="M113.7,256.3c0,0-14.9,12-14.9,33.6l-4.9-4.5C93.9,285.4,97.3,263.6,113.7,256.3z"/>
                  <path class="thu2" d="M138,205.6l11.9,22.3c0,0-0.7,14.6-7.2,23.2C142.8,251.2,153.4,232.8,138,205.6z"/>
                  <path class="thu2" d="M20.2,269.1c0,0-13.6,9-13.2,21.2l5.9,2.6C13,292.8,5,290,20.2,269.1z"/>
                  <path class="thu5" d="M12.1,301.4c0,0,34.1,14.1,35.1,14.3c0,0,12.7,4.8,52.1-2.6"/>
                  <path class="thu2" d="M73.5,292.8c0,0-6,19.7-11.4,20.1c0,0-7.5,1.9-17.7-3.1l-20.5-9.6c0,0,34.8,15.3,37.5,8.7
                    C61.3,308.7,73.6,295.6,73.5,292.8z"/>
                  <path class="thu3" d="M102.4,293.6c0,0-13.2-1.3-16.7-0.2c-4.2,1.3-8.2,4.8-2.3,22.1"/>
                  <path class="thu2" d="M257.8,313.1c0,0,68.3,7,79.6,10.2c0,0,25.3,2.4,30.7,4.3C368.1,327.6,364.4,322,257.8,313.1z"/>
                </g>
                <path class="thu2" d="M12.1,360.4c0,0-6.4,9.2,0,18.6c0,0-2.9-17.4,4.4-20.5C16.5,358.5,13.2,358.4,12.1,360.4z"/>
                <path class="thu2" d="M32.6,400.1c0,0-2.5,3.9-2.2,5.1c0,0-1,7,8.6,13C38.9,418.2,28.9,412.4,32.6,400.1z"/>
                <path class="thu2" d="M230.8,355.4c0.4-1.1,40.7,1.9,40.7,1.9s41.2,6,44.3,6.2c3.2,0.1,14.4,0,14.4,0c0.2,0-3.4,2-21.1,1
                  C309.1,364.4,230.3,356.5,230.8,355.4z"/>
                <path class="thu2" d="M296.7,372.2c-0.3,0.9-28.7-2.1-28.7-2.1s-39.1-7.6-26.7-6.6C241.3,363.5,297,371.3,296.7,372.2z"/>
                </svg>

              </div>
            </div>

            

          </div>
          <div class="info">
            <p>Art Direction</p>
            <p>Design</p>
            <p>Animation</p>
            <p>Programming</p>
          </div>

          </div>
          <div class="info02 clearfix" alt="Image of a air hockey paddle" title="Image of a air hockey paddle">
            <div class="iconHolder" alt="*No governing body has recognized this accomplishment...yet" title="*No governing body has recognized this accomplishment...yet">
              <svg version="1.1" id="airhockey" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="-322.9 543.9 183.8 235" style="enable-background:new -322.9 543.9 183.8 235;" xml:space="preserve">
              <g id="bang">
                <path d="M-276.7,704.5v16.1l4.1-4.3v-16.5l-19.2,2.6l13.4-12.7l-24-5.4l21.2-10.6l-3.4-2.3c15.5,3.3,34,5.1,53.2,5.1
                  c20.3,0,34.7-4,48.7-7.9l-13.2,14.9l29.6,5.7l-29,11.5l25.5,17l-29.1-7l5.5,5.5l44.6,10.7l-38-25.3l34.6-13.7l-36-7l17.4-19.7
                  l-6.5,1.7c-2.2,0.6-4.4,1.2-6.6,1.8c-13.7,3.8-27.9,7.7-47.6,7.7c-23.4,0-43.7-4.7-60.8-9.7l-11.9-4.4l15.1,14.9l-25.1,12.6
                  l27.5,6.2l-17,16L-276.7,704.5z"/>
                <line class="a04" x1="-253.1" y1="696.9" x2="-291.6" y2="736.3"/>
                <line class="a04" x1="-164.4" y1="745.7" x2="-214.5" y2="694.6"/>
                <line class="a04" x1="-243" y1="694.9" x2="-288.6" y2="766.9"/>
                <line class="a04" x1="-248.3" y1="764.4" x2="-227.6" y2="692.4"/>
                <line class="a04" x1="-220.8" y1="705.7" x2="-203.9" y2="753.7"/>
              </g>
              <g id="handle">
                <path class="a00" d="M-266.2,594.1c-25.7,4.5-43.3,13.7-43.3,24.4l0.3,29.9c3.1,17.5,36.6,31.3,77.4,31.3s74.3-13.8,77.4-31.3
                  c0,0,0.3-29.2,0.3-29.9c0-10.8-18-20.2-44.2-24.5"/>
                <path class="a00" d="M-232.2,547.8c-18.8,0-34,15.2-34,33.9v53.9c26.2,5.1,60.2,1.7,67.9,0.2v-54.1
                  C-198.3,563-213.5,547.8-232.2,547.8z"/>
                <path class="a01" d="M-159.4,608.5c3.4,2.9,5.2,6,5.2,9.3c0,14.3-34.8,25.8-77.7,25.8c-33,0-61.2-6.8-72.5-16.5"/>
                <path class="a02" d="M-167.1,609.9c3,2.3,4.7,4.9,4.7,7.5c0,11.5-31.1,20.9-69.4,20.9s-69.4-9.3-69.4-20.9c0-2.7,1.7-5.2,4.7-7.5"
                  />
                <path class="a03" d="M-304.8,627.2l0.4,21c0,0,1.5,8.8,17.3,16.6c0,0,11.2,4.1,17.3,5.3c0,0-32.4-9.8-28.2-38.6L-304.8,627.2z"/>
                <path class="a03" d="M-266.2,598.1c0,0-22.3,4.2-30.7,11.5c0,0-0.9,2,0.1,1.1c5-3.9,26.5-10.1,30.6-6.9V598.1z"/>
                <path class="a03" d="M-197.7,598.1c0,0,3.9-0.1,15.4,3.7c0,0-8.7-2.2-15.4-1V598.1z"/>
                <path class="a03" d="M-226.7,564.6c-7,0-16.3,3-21.3,14.6l-9.1,5c0.8-18.3,12.6-29.3,23.8-29.3L-226.7,564.6z"/>
                <path class="a03" d="M-235.7,551.3c0,0-25.5,3.7-26.3,32.2V631l1.3-30l0.3-17.8C-260.3,583.1-258.8,556.1-235.7,551.3z"/>
              </g>
              </svg>

            </div>
            <div class="info" title="*No governing body has recognized this accomplishment...yet" alt="*No governing body has recognized this accomplishment...yet" title="*No governing body has recognized this accomplishment...yet" >
              <p>Unofficially</p>
              <p>undefeated</p>
              <p>at air hockey</p>
              <p>since 1998*</p>
            </div>
          </div>
          <div class="info03 clearfix">

            <div class="iconHolder">
              <!--  -->
                         <!--  -->
                         <div class="beardHolder01">
                           <svg version="1.1" id="Layer_7" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="-475 280 272 234" style="enable-background:new -475 280 272 234;" xml:space="preserve">
                           <style type="text/css">
                             .st02{fill:#cccccc;}
                           </style>
                           <circle class="st02" cx="-461.5" cy="303" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="309.5" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="309.5" r="1.6"/>
                           <circle class="st02" cx="-461.5" cy="315.8" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="315.8" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="322.2" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="322.2" r="1.6"/>
                           <circle class="st02" cx="-461.5" cy="328.5" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="328.5" r="1.6"/>
                           <circle class="st02" cx="-217.3" cy="328.5" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="335" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="335" r="1.6"/>
                           <circle class="st02" cx="-461.5" cy="341.2" r="1.6"/>
                           <circle class="st02" cx="-453.6" cy="341.2" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="341.2" r="1.6"/>
                           <circle class="st02" cx="-217.3" cy="341.2" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="347.8" r="1.6"/>
                           <circle class="st02" cx="-449.7" cy="347.8" r="1.6"/>
                           <circle class="st02" cx="-229.2" cy="347.8" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="347.8" r="1.6"/>
                           <circle class="st02" cx="-213.5" cy="347.8" r="1.6"/>
                           <circle class="st02" cx="-461.5" cy="354" r="1.6"/>
                           <circle class="st02" cx="-453.6" cy="354" r="1.6"/>
                           <circle class="st02" cx="-233.1" cy="354" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="354" r="1.6"/>
                           <circle class="st02" cx="-217.3" cy="354" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-449.7" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-363.1" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-355.2" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-347.3" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-339.5" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-308" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-300.1" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-292.2" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-284.3" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-237.1" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-229.2" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="360.5" r="1.6"/>
                           <circle class="st02" cx="-461.5" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-453.6" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-445.8" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-374.9" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-367" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-359.1" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-351.2" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-304" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-296.1" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-288.2" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-280.4" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-272.5" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-241" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-233.1" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-217.3" cy="366.8" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-449.7" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-441.9" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-434" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-386.7" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-378.9" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-268.6" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-245" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-237.1" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-229.2" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="373.2" r="1.6"/>
                           <circle class="st02" cx="-453.6" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-445.8" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-437.9" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-430" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-390.6" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-248.8" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-241" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-233.1" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="379.5" r="1.6"/>
                           <circle class="st02" cx="-457.6" cy="386" r="1.6"/>
                           <circle class="st02" cx="-449.7" cy="386" r="1.6"/>
                           <circle class="st02" cx="-441.9" cy="386" r="1.6"/>
                           <circle class="st02" cx="-434" cy="386" r="1.6"/>
                           <circle class="st02" cx="-426.1" cy="386" r="1.6"/>
                           <circle class="st02" cx="-394.6" cy="386" r="1.6"/>
                           <circle class="st02" cx="-386.7" cy="386" r="1.6"/>
                           <circle class="st02" cx="-268.6" cy="386" r="1.6"/>
                           <circle class="st02" cx="-260.7" cy="386" r="1.6"/>
                           <circle class="st02" cx="-252.8" cy="386" r="1.6"/>
                           <circle class="st02" cx="-245" cy="386" r="1.6"/>
                           <circle class="st02" cx="-237.1" cy="386" r="1.6"/>
                           <circle class="st02" cx="-229.2" cy="386" r="1.6"/>
                           <circle class="st02" cx="-221.3" cy="386" r="1.6"/>
                           <circle class="st02" cx="-453.6" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-445.8" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-437.9" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-430" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-422.1" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-414.2" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-398.5" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-390.6" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-256.7" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-248.8" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-241" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-233.1" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-225.2" cy="392.2" r="1.6"/>
                           <circle class="st02" cx="-449.7" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-441.9" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-434" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-426.1" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-418.2" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-410.4" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-402.5" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-394.6" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-260.7" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-252.8" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-245" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-237.1" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-229.2" cy="398.8" r="1.6"/>
                           <circle class="st02" cx="-445.8" cy="405" r="1.6"/>
                           <circle class="st02" cx="-437.9" cy="405" r="1.6"/>
                           <circle class="st02" cx="-430" cy="405" r="1.6"/>
                           <circle class="st02" cx="-422.1" cy="405" r="1.6"/>
                           <circle class="st02" cx="-414.2" cy="405" r="1.6"/>
                           <circle class="st02" cx="-406.4" cy="405" r="1.6"/>
                           <circle class="st02" cx="-398.5" cy="405" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="405" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="405" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="405" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="405" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="405" r="1.6"/>
                           <circle class="st02" cx="-256.7" cy="405" r="1.6"/>
                           <circle class="st02" cx="-248.8" cy="405" r="1.6"/>
                           <circle class="st02" cx="-241" cy="405" r="1.6"/>
                           <circle class="st02" cx="-233.1" cy="405" r="1.6"/>
                           <circle class="st02" cx="-441.9" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-434" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-426.1" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-418.2" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-410.4" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-402.5" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-394.6" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-268.6" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-260.7" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-252.8" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-245" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-237.1" cy="411.5" r="1.6"/>
                           <circle class="st02" cx="-437.9" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-430" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-422.1" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-414.2" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-406.4" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-398.5" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-390.6" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-272.5" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-256.7" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-248.8" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-241" cy="417.8" r="1.6"/>
                           <circle class="st02" cx="-426.1" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-418.2" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-410.4" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-402.5" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-394.6" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-386.7" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-378.9" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-371" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-276.5" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-268.6" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-260.7" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-252.8" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-245" cy="424.2" r="1.6"/>
                           <circle class="st02" cx="-422.1" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-414.2" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-406.4" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-398.5" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-390.6" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-374.9" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-367" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-359.1" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-304" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-296.1" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-288.2" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-280.4" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-272.5" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-256.7" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-248.8" cy="430.5" r="1.6"/>
                           <circle class="st02" cx="-418.2" cy="437" r="1.6"/>
                           <circle class="st02" cx="-410.4" cy="437" r="1.6"/>
                           <circle class="st02" cx="-402.5" cy="437" r="1.6"/>
                           <circle class="st02" cx="-394.6" cy="437" r="1.6"/>
                           <circle class="st02" cx="-386.7" cy="437" r="1.6"/>
                           <circle class="st02" cx="-378.9" cy="437" r="1.6"/>
                           <circle class="st02" cx="-371" cy="437" r="1.6"/>
                           <circle class="st02" cx="-363.1" cy="437" r="1.6"/>
                           <circle class="st02" cx="-355.2" cy="437" r="1.6"/>
                           <circle class="st02" cx="-347.3" cy="437" r="1.6"/>
                           <circle class="st02" cx="-339.5" cy="437" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="437" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="437" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="437" r="1.6"/>
                           <circle class="st02" cx="-308" cy="437" r="1.6"/>
                           <circle class="st02" cx="-300.1" cy="437" r="1.6"/>
                           <circle class="st02" cx="-292.2" cy="437" r="1.6"/>
                           <circle class="st02" cx="-284.3" cy="437" r="1.6"/>
                           <circle class="st02" cx="-276.5" cy="437" r="1.6"/>
                           <circle class="st02" cx="-268.6" cy="437" r="1.6"/>
                           <circle class="st02" cx="-260.7" cy="437" r="1.6"/>
                           <circle class="st02" cx="-252.8" cy="437" r="1.6"/>
                           <circle class="st02" cx="-406.4" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-398.5" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-390.6" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-374.9" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-367" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-359.1" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-351.2" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-304" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-296.1" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-288.2" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-280.4" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-272.5" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-256.7" cy="443.2" r="1.6"/>
                           <circle class="st02" cx="-402.5" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-394.6" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-386.7" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-378.9" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-371" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-363.1" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-355.2" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-347.3" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-339.5" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-308" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-300.1" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-292.2" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-284.3" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-276.5" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-268.6" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-260.7" cy="449.8" r="1.6"/>
                           <circle class="st02" cx="-398.5" cy="456" r="1.6"/>
                           <circle class="st02" cx="-390.6" cy="456" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="456" r="1.6"/>
                           <circle class="st02" cx="-374.9" cy="456" r="1.6"/>
                           <circle class="st02" cx="-367" cy="456" r="1.6"/>
                           <circle class="st02" cx="-359.1" cy="456" r="1.6"/>
                           <circle class="st02" cx="-351.2" cy="456" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="456" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="456" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="456" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="456" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="456" r="1.6"/>
                           <circle class="st02" cx="-304" cy="456" r="1.6"/>
                           <circle class="st02" cx="-296.1" cy="456" r="1.6"/>
                           <circle class="st02" cx="-288.2" cy="456" r="1.6"/>
                           <circle class="st02" cx="-280.4" cy="456" r="1.6"/>
                           <circle class="st02" cx="-272.5" cy="456" r="1.6"/>
                           <circle class="st02" cx="-264.6" cy="456" r="1.6"/>
                           <circle class="st02" cx="-386.7" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-378.9" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-371" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-363.1" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-355.2" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-347.3" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-339.5" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-308" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-300.1" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-292.2" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-284.3" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-276.5" cy="462.5" r="1.6"/>
                           <circle class="st02" cx="-382.7" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-374.9" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-367" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-359.1" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-351.2" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-304" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-296.1" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-288.2" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-280.4" cy="468.8" r="1.6"/>
                           <circle class="st02" cx="-378.9" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-371" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-363.1" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-355.2" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-347.3" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-339.5" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-308" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-300.1" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-292.2" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-284.3" cy="475.2" r="1.6"/>
                           <circle class="st02" cx="-367" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-359.1" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-351.2" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-304" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-296.1" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-288.2" cy="481.5" r="1.6"/>
                           <circle class="st02" cx="-355.2" cy="488" r="1.6"/>
                           <circle class="st02" cx="-347.3" cy="488" r="1.6"/>
                           <circle class="st02" cx="-339.5" cy="488" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="488" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="488" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="488" r="1.6"/>
                           <circle class="st02" cx="-308" cy="488" r="1.6"/>
                           <circle class="st02" cx="-300.1" cy="488" r="1.6"/>
                           <circle class="st02" cx="-292.2" cy="488" r="1.6"/>
                           <circle class="st02" cx="-343.4" cy="494.2" r="1.6"/>
                           <circle class="st02" cx="-335.5" cy="494.2" r="1.6"/>
                           <circle class="st02" cx="-327.6" cy="494.2" r="1.6"/>
                           <circle class="st02" cx="-319.7" cy="494.2" r="1.6"/>
                           <circle class="st02" cx="-311.9" cy="494.2" r="1.6"/>
                           <circle class="st02" cx="-304" cy="494.2" r="1.6"/>
                           <circle class="st02" cx="-331.6" cy="500.8" r="1.6"/>
                           <circle class="st02" cx="-323.7" cy="500.8" r="1.6"/>
                           <circle class="st02" cx="-315.8" cy="500.8" r="1.6"/>
                           <circle class="st02" cx="-308" cy="500.8" r="1.6"/>
                           </svg>
                         </div>
              <!--  -->
              <div class="beardHolder02">
                <svg version="1.1" id="_x31_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="-475 280 272 234" style="enable-background:new -475 280 272 234;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:#1E1E1E;}
                </style>
                <circle class="st0" cx="-223" cy="288.8" r="0.5"/>
                <circle class="st0" cx="-464" cy="291.6" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="291.6" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="294.4" r="0.5"/>
                <circle class="st0" cx="-223" cy="294.4" r="0.5"/>
                <circle class="st0" cx="-464" cy="297.2" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="297.2" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="300" r="0.5"/>
                <circle class="st0" cx="-223" cy="300" r="0.5"/>
                <circle class="st0" cx="-464" cy="302.8" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="302.8" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="302.8" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="302.8" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="305.6" r="0.5"/>
                <circle class="st0" cx="-457" cy="305.6" r="0.5"/>
                <circle class="st0" cx="-223" cy="305.6" r="0.5"/>
                <circle class="st0" cx="-464" cy="308.5" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="308.5" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="308.5" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="308.5" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="311.2" r="0.5"/>
                <circle class="st0" cx="-457" cy="311.2" r="0.5"/>
                <circle class="st0" cx="-223" cy="311.2" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="311.2" r="0.5"/>
                <circle class="st0" cx="-464" cy="314.1" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="314.1" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="314.1" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="314.1" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="316.9" r="0.5"/>
                <circle class="st0" cx="-457" cy="316.9" r="0.5"/>
                <circle class="st0" cx="-223" cy="316.9" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="316.9" r="0.5"/>
                <circle class="st0" cx="-464" cy="319.7" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="319.7" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="319.7" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="319.7" r="0.5"/>
                <path class="st0" d="M-215.9,319.7"/>
                <circle class="st0" cx="-461.9" cy="322.5" r="0.5"/>
                <circle class="st0" cx="-457" cy="322.5" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="322.5" r="0.5"/>
                <circle class="st0" cx="-223" cy="322.5" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="322.5" r="0.5"/>
                <circle class="st0" cx="-464" cy="325.3" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="325.3" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="325.3" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="325.3" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="328.1" r="0.5"/>
                <circle class="st0" cx="-457" cy="328.1" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="328.1" r="0.5"/>
                <circle class="st0" cx="-223" cy="328.1" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="328.1" r="0.5"/>
                <circle class="st0" cx="-464" cy="331" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="331" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="331" r="0.5"/>
                <circle class="st0" cx="-230" cy="331" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="331" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="331" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="331" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="333.8" r="0.5"/>
                <circle class="st0" cx="-457" cy="333.8" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="333.8" r="0.5"/>
                <circle class="st0" cx="-223" cy="333.8" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="333.8" r="0.5"/>
                <circle class="st0" cx="-464" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-230" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="336.6" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="339.4" r="0.5"/>
                <circle class="st0" cx="-457" cy="339.4" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="339.4" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="339.4" r="0.5"/>
                <circle class="st0" cx="-223" cy="339.4" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="339.4" r="0.5"/>
                <circle class="st0" cx="-464" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-230" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="342.2" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="345" r="0.5"/>
                <circle class="st0" cx="-457" cy="345" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="345" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="345" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="345" r="0.5"/>
                <circle class="st0" cx="-223" cy="345" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="345" r="0.5"/>
                <circle class="st0" cx="-464" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-230" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="347.8" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-457" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-223" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="350.6" r="0.5"/>
                <circle class="st0" cx="-464" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-230" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="353.5" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-457" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-223" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="356.2" r="0.5"/>
                <circle class="st0" cx="-464" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-347" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-308" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-230" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="359.1" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-457" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-340" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-301" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-223" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="361.9" r="0.5"/>
                <circle class="st0" cx="-464" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-347" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-308" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-269" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-230" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-215.4" cy="364.7" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-457" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-379" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-340" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-301" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-223" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="367.5" r="0.5"/>
                <circle class="st0" cx="-464" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-386" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-347" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-308" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-269" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-230" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="370.3" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-457" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-379" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-340" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-262" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-223" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="373.1" r="0.5"/>
                <circle class="st0" cx="-464" cy="376" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="376" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="376" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="376" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="376" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="376" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="376" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="376" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="376" r="0.5"/>
                <circle class="st0" cx="-386" cy="376" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="376" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="376" r="0.5"/>
                <circle class="st0" cx="-269" cy="376" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="376" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="376" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="376" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="376" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="376" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="376" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="376" r="0.5"/>
                <circle class="st0" cx="-230" cy="376" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="376" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="376" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-457" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-379" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-262" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-223" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-218.1" cy="378.8" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-425" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-386" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-269" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-230" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-220.3" cy="381.6" r="0.5"/>
                <circle class="st0" cx="-461.9" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-457" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-418" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-262" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-223" cy="384.4" r="0.5"/>
                <circle class="st0" cx="-459.1" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-425" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-386" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-269" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-230" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="387.2" r="0.5"/>
                <circle class="st0" cx="-457" cy="390" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="390" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="390" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="390" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="390" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="390" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="390" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="390" r="0.5"/>
                <circle class="st0" cx="-418" cy="390" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="390" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="390" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="390" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="390" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="390" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="390" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="390" r="0.5"/>
                <circle class="st0" cx="-262" cy="390" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="390" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="390" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="390" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="390" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="390" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="390" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="390" r="0.5"/>
                <circle class="st0" cx="-223" cy="390" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-425" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-386" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-269" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-230" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="392.8" r="0.5"/>
                <circle class="st0" cx="-457" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-418" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-262" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="395.6" r="0.5"/>
                <circle class="st0" cx="-454.3" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-425" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-386" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-230" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-225.1" cy="398.5" r="0.5"/>
                <circle class="st0" cx="-452.1" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-418" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-262" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-227.9" cy="401.2" r="0.5"/>
                <circle class="st0" cx="-449.4" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-425" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-308" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-269" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-230" cy="404.1" r="0.5"/>
                <circle class="st0" cx="-447.2" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-418" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-340" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-262" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-232.8" cy="406.9" r="0.5"/>
                <circle class="st0" cx="-444.5" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-425" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-308" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-269" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-234.9" cy="409.7" r="0.5"/>
                <circle class="st0" cx="-442.4" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-418" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-340" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-262" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="412.5" r="0.5"/>
                <circle class="st0" cx="-439.6" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-425" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-386" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-269" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="415.3" r="0.5"/>
                <circle class="st0" cx="-437.5" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-418" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-379" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-262" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-237.6" cy="418.1" r="0.5"/>
                <circle class="st0" cx="-434.8" cy="421" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="421" r="0.5"/>
                <circle class="st0" cx="-425" cy="421" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="421" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="421" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="421" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="421" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="421" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="421" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="421" r="0.5"/>
                <circle class="st0" cx="-386" cy="421" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="421" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="421" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="421" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="421" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="421" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="421" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="421" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="421" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="421" r="0.5"/>
                <circle class="st0" cx="-269" cy="421" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="421" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="421" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="421" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="421" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="421" r="0.5"/>
                <circle class="st0" cx="-239.8" cy="421" r="0.5"/>
                <circle class="st0" cx="-432.6" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-418" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-379" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-262" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-242.5" cy="423.8" r="0.5"/>
                <circle class="st0" cx="-429.9" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-425" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-386" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-308" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-269" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-244.6" cy="426.6" r="0.5"/>
                <circle class="st0" cx="-427.8" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-418" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-379" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-340" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-301" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-262" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-247.4" cy="429.4" r="0.5"/>
                <circle class="st0" cx="-425" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-386" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-347" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-308" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-269" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-249.5" cy="432.2" r="0.5"/>
                <circle class="st0" cx="-422.9" cy="435" r="0.5"/>
                <circle class="st0" cx="-418" cy="435" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="435" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="435" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="435" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="435" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="435" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="435" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="435" r="0.5"/>
                <circle class="st0" cx="-379" cy="435" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="435" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="435" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="435" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="435" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="435" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="435" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="435" r="0.5"/>
                <circle class="st0" cx="-340" cy="435" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="435" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="435" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="435" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="435" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="435" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="435" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="435" r="0.5"/>
                <circle class="st0" cx="-301" cy="435" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="435" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="435" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="435" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="435" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="435" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="435" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="435" r="0.5"/>
                <circle class="st0" cx="-262" cy="435" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="435" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="435" r="0.5"/>
                <circle class="st0" cx="-420.1" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-415.3" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-386" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-347" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-308" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-269" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="437.8" r="0.5"/>
                <circle class="st0" cx="-413.1" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-379" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-340" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-301" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-262" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-252.2" cy="440.6" r="0.5"/>
                <circle class="st0" cx="-410.4" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-386" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-347" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-308" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-269" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-254.4" cy="443.5" r="0.5"/>
                <circle class="st0" cx="-408.2" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-379" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-340" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-301" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-262" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-257.1" cy="446.2" r="0.5"/>
                <circle class="st0" cx="-405.5" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-386" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-347" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-308" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-269" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-259.3" cy="449.1" r="0.5"/>
                <circle class="st0" cx="-403.4" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-379" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-340" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-301" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-262" cy="451.9" r="0.5"/>
                <circle class="st0" cx="-400.6" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-386" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-347" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-308" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-269" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-264.1" cy="454.7" r="0.5"/>
                <circle class="st0" cx="-398.5" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-379" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-340" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-301" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-266.9" cy="457.5" r="0.5"/>
                <circle class="st0" cx="-395.8" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-386" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-347" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-308" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-269" cy="460.3" r="0.5"/>
                <circle class="st0" cx="-393.6" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-379" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-340" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-301" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-271.8" cy="463.1" r="0.5"/>
                <circle class="st0" cx="-390.9" cy="466" r="0.5"/>
                <circle class="st0" cx="-386" cy="466" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="466" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="466" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="466" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="466" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="466" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="466" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="466" r="0.5"/>
                <circle class="st0" cx="-347" cy="466" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="466" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="466" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="466" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="466" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="466" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="466" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="466" r="0.5"/>
                <circle class="st0" cx="-308" cy="466" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="466" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="466" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="466" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="466" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="466" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="466" r="0.5"/>
                <circle class="st0" cx="-273.9" cy="466" r="0.5"/>
                <circle class="st0" cx="-388.8" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-379" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-340" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-301" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-276.6" cy="468.8" r="0.5"/>
                <circle class="st0" cx="-386" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-347" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-308" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-278.8" cy="471.6" r="0.5"/>
                <circle class="st0" cx="-383.9" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-379" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-340" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-301" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-281.5" cy="474.4" r="0.5"/>
                <circle class="st0" cx="-381.1" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-376.3" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-347" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-308" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-283.6" cy="477.2" r="0.5"/>
                <circle class="st0" cx="-374.1" cy="480" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="480" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="480" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="480" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="480" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="480" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="480" r="0.5"/>
                <circle class="st0" cx="-340" cy="480" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="480" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="480" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="480" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="480" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="480" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="480" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="480" r="0.5"/>
                <circle class="st0" cx="-301" cy="480" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="480" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="480" r="0.5"/>
                <circle class="st0" cx="-286.4" cy="480" r="0.5"/>
                <circle class="st0" cx="-371.4" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-366.5" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-347" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-308" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-288.5" cy="482.8" r="0.5"/>
                <circle class="st0" cx="-369.2" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-364.4" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-340" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-301" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-291.2" cy="485.6" r="0.5"/>
                <circle class="st0" cx="-361.6" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-347" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-308" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-293.4" cy="488.5" r="0.5"/>
                <circle class="st0" cx="-359.5" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-354.6" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-340" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-301" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-296.1" cy="491.2" r="0.5"/>
                <circle class="st0" cx="-356.8" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-351.9" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-347" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-308" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-298.3" cy="494.1" r="0.5"/>
                <circle class="st0" cx="-349.8" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-344.9" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-340" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-301" cy="496.9" r="0.5"/>
                <circle class="st0" cx="-342.1" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-337.3" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-332.4" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-308" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-303.1" cy="499.7" r="0.5"/>
                <circle class="st0" cx="-335.1" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-330.2" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-325.4" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-320.5" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-315.6" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-310.8" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-305.9" cy="502.5" r="0.5"/>
                <circle class="st0" cx="-327.5" cy="505.3" r="0.5"/>
                <circle class="st0" cx="-322.6" cy="505.3" r="0.5"/>
                <circle class="st0" cx="-317.8" cy="505.3" r="0.5"/>
                <circle class="st0" cx="-312.9" cy="505.3" r="0.5"/>
                </svg>
              </div>

              
              <!--  -->
              <div class="beardHolder03" alt="Image of a beard" title="Image of a beard">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                   viewBox="-475 280 272 234" style="enable-background:new -475 280 272 234;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:#1E1E1E;}
                  .st1{fill:#FC0000;}
                  #smileBeard{ display: none; }
                </style>
                <path class="st0" id="regBeard" d="M-470.4,360c4,37,35.5,67,35.5,67c17.9,15.8,42.8,39.8,42.8,39.8c12,15,26.2,22.2,26.2,22.2
                  c46,27.5,53.5,17,53.5,17c13-1,28-16.5,28-16.5c14.7-17.3,31-45.5,31-45.5c4.2-4.4,12-16.5,12-16.5c21.5-24.5,31.5-67.5,31.5-67.5
                  c2.5-15.5-13.5-76-13.5-76s-3.3,1.8-3.7,6.8c-0.3,5,2.2,48.7-30.3,85.4c-5.9-9-14.8-19.7-24.1-19.7c0,0-14.3-4.3-46.5,0l-7,2
                  l-14-3.8c0,0-24.8-0.9-45.5,14.3c0,0-6.1,6.3-8.5,20.7c-23.5-9-42-35.5-42-35.5c-4-5.5-10.9-43.3-10.9-50.2s-10.5-20-10.5-20
                  C-463.8,297.9-470.4,360-470.4,360z M-389.1,408.5c4.7-5.3,11.3-32.8,11.3-32.8c3.3-4.4,42.3-0.2,42.3-0.2c4.3,1.3,52-3.7,52-3.7
                  c11.3,3.3,13.7,24.2,13.7,24.2c0.3,7.5-13.7,30.2-13.7,30.2c-9,4-24.7-2-24.7-2C-324,418-294,403-297.5,401.5s-49.5-1.5-54,2.7
                  C-356,408.4-336,417-336,417s2.2,11.2-19.2,11.2C-357.8,428.2-389.1,408.5-389.1,408.5z"/>

                  <path class="st01" id="smileBeard" d="M-470.4,360c4,37,39.5,67,39.5,67c17.9,15.8,41.8,39.8,41.8,39.8c12,15,23.2,22.2,23.2,22.2
                    c46,27.5,53.5,17,53.5,17c13-1,28-16.5,28-16.5c14.7-17.3,26-45.5,26-45.5c4.2-4.4,13-16.5,13-16.5c21.5-24.5,35.5-67.5,35.5-67.5
                    c2.5-15.5-13.5-76-13.5-76s-3.3,1.8-3.7,6.8c-0.3,5,9.2,43.7-23.3,80.4c-5.9-9-13.8-21.7-23.1-21.7c0,0-22.3,2.7-54.5,7l-7,2
                    l-14-3.8c0,0-24.8-10.9-45.5,4.3c0,0-6.1,16.3-8.5,30.7c-23.5-9-42-35.5-42-35.5c-4-5.5-10.9-43.3-10.9-50.2s-10.5-20-10.5-20
                    C-463.8,297.9-470.4,360-470.4,360z M-384.1,408.5c0-9.5,1.3-40.8,1.3-40.8c3.3-4.4,53.3,7.8,53.3,7.8c4.3,1.3,56-8.7,56-8.7
                    c11.3,3.3,3.7,29.2,3.7,29.2c0.3,7.5-13.7,30.2-13.7,30.2c-9,4-24.7-2-24.7-2C-324,418-294,403-297.5,401.5s-49.5-1.5-54,2.7
                    C-356,408.4-336,417-336,417s2.2,11.2-19.2,11.2C-357.8,428.2-384.1,408.5-384.1,408.5z"/>
                </svg>
              </div>
              <!--  -->
            </div>

            <div class="info">
            </div>
          </div>
        </div>
        <div class="skills"></div>
      </section>


      <section class="projects clearfix">
        <?php $latestPosts = new wp_query(array(
          'post_type' => 'projects',
          'posts_per_page' => -1
        )) ?> 
        
        <?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post() ?>
        <?php $projects = get_field('projects');  ?>
        <?php $product_index = 0; ?>
        <?php //pre_r($projects[0]); ?>
         <?php foreach ($projects as $project_data) {
              $product_index++;

             $project_img = $project_data['bgimage']['sizes']['medium_large'];
             // /pre_r($project_index);
             echo '<div class="projectWrapper">';
             echo '<div class="project project'.$product_index.'" data-number="'.$product_index.'" style="background-image: url('.$project_img.')">';
             echo '<h2>'.$project_data['projectname'].'</h2>';
             // echo '<p>'.$project_data['projectdescription'].'</p>';
             // echo '<a href="http://'.$project_data['projectlink'].'">'.$project_data['projectlink'].'</a>';
             echo '</div>';
             echo '<div class="mobileInfo mobileProject'.$product_index.'">';
             echo '<div class="mobileClose">+</div>';
             // echo '<h2>'.$project_data['projectname'].'</h2>';
             echo '<div class="mobileProjectDescription">fff</div>';
             echo '<div class="mobileProjectSkills">fff</div>';
             echo '<div class="mobileProjectImages">fff</div>';
             echo '<div class="projectLink"><a href="">See it live</a></div>';
             echo '<div class="pdfLink"><a href="">Take a closer look</a></div>';
             echo '</div>';
             echo '</div>';
           }
           ?>
       <?php endwhile; ?> 
    </section>
      
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>

