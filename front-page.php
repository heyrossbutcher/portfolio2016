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

           </script>
    <div class="projectModalContainer">

        <div class="projectModal">
          <!--  -->
          <div class="close">+</div>
          <!--  -->
          <h2></h2>
          <div class="copy">
            <p class="projectDescription"></p>
            <p class="projectSkills"></p>
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
                echo '<div class="devIcon devIcon01"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/html5.svg" alt=""></div>';
                echo '<div class="devIcon devIcon02"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/js.svg" alt=""></div>';
                echo '<div class="devIcon devIcon03"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/wordpress.svg" alt=""></div>';
                echo '<div class="devIcon devIcon04"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/swift.svg" alt=""></div>';
                echo '<div class="devIcon devIcon05"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/gulp.svg" alt=""></div>';
                echo '<div class="devIcon devIcon06"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/github.svg" alt=""></div>';
                echo '<div class="devIcon devIcon07"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/terminal.png" alt=""></div>';
                echo '<div class="devIcon devIcon08"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/sublime-text.png" alt=""></div>';
                echo '<div class="devIcon devIcon09"><img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/icons/mamp.png" alt=""></div>';
                echo '</div>';
                echo '<div class="devHolder">';
                echo $initialState;
                echo '</div>';
                echo '</div>';
          } else if ($initialState == "animator") {
                echo '<div class="'.$initialState.' masthead-title hide-opacity clearfix">';
                echo '<div class="aniHolder">';
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
          <div class="info01 clearfikx">
          <div class="iconHolder">  
            <div class="flipper">&nbsp;
              <div class="iconFirst">
                <img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/14years.svg" alt="">
              </div>
              <div class="iconSecond">
                <img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/thumbsup.svg" alt="">
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
          <div class="info02 clearfikx">
            <div class="iconHolder">
              <img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/airHockey.svg" alt="*No governing body has recognized this accomplishment...yet" title="*No governing body has recognized this accomplishment...yet">
            </div>
            <div class="info" title="*No governing body has recognized this accomplishment...yet" alt="*No governing body has recognized this accomplishment...yet" title="*No governing body has recognized this accomplishment...yet" >
              <p>Unofficially</p>
              <p>undefeated</p>
              <p>at air hockey</p>
              <p>since 1998*</p>
            </div>
          </div>
          <div class="info03 clearfikx">

            <div class="iconHolder">
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
             echo '<h2>'.$project_data['projectname'].'</h2>';
             echo '<p class="mobileProjectDescription">fff</p>';
             echo '<p class="mobileProjectSkills">fff</p>';
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

