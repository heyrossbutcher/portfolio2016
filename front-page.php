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
                 viewBox="-3341 3344.3 516.8 513.7" style="enable-background:new -3341 3344.3 516.8 513.7;" xml:space="preserve">

              <g id="Layer_1_1_">
                  <path class="circleStroke" d="M-3082.6,3347.4c-139.9,0-253.4,113.5-253.4,253.4c0,139.9,113.5,253.4,253.4,253.4
                      c139.9,0,253.4-113.6,253.4-253.5C-2829.2,3460.8-2942.6,3347.4-3082.6,3347.4z"/>
              </g>
              </svg>
            </div>
            <div class="flipper">&nbsp;
              <div class="iconFirst">
                <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/14years.svg" alt="14 Years experience" title="14 Years experience">
              </div>
              <div class="iconSecond">
                <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/thumbsup.svg" alt="Image of a thumbs up" title="Image of a thumbs up">
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
              <path id="bang" d="M-245.6,729.1l-6.6-16.2l-20.8,7.2l0.5-18.5l-27.1,2.9l17.4-15.6l-27.3-6.9l25.4-12l-16.8-12.3l11.8,3.7
                c17,5.4,39.2,8.7,62.6,9.3c19.7,0.5,34-3.1,47.8-6.5c2.2-0.5,4.4-1.1,6.6-1.6l6.5-1.5l-17.9,19.3l35.8,7.9l-34.9,12.8l5.9,27.3
                l-45.7-21.5L-245.6,729.1z M-249.8,707.8l5.8,14.3l20.6-19.8l42.1,19.5l-6.8-22.9l26.4-9.7l-29.4-6.4l13.6-14.6l0,0
                c-14.1,3.5-28.6,7.2-48.9,6.7c-19.2-0.5-37.6-2.7-53.1-6.4l3.3,2.4l-21.5,10.1l23.9,6l-13.7,12.4l19.3-2.1l-0.4,17.2L-249.8,707.8z"
                />
              <g id="Lines">
                <polygon class="a03" points="-253.9,690.9 -297,730.5 -297,765.6 -251.1,764.2 -202.9,755.5 -153.5,754.9 -213.7,686.5   "/>
                <line class="a04" x1="-251.9" y1="690.9" x2="-295.7" y2="730.5"/>
                <line class="a04" x1="-160" y1="748.9" x2="-210.4" y2="690.9"/>
                <line class="a04" x1="-241" y1="689.4" x2="-294.5" y2="763.4"/>
                <line class="a04" x1="-251.1" y1="763.4" x2="-224.2" y2="687.7"/>
                <line class="a04" x1="-217.9" y1="702.4" x2="-202.9" y2="754.9"/>
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

