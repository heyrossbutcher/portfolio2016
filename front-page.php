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
        <div class="arrows prev">
          <svg version="1.1" id="arrowCircle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 48 48.2" style="enable-background:new 0 0 48 48.2;" xml:space="preserve">
          <style type="text/css">
            .st10{fill:#FFFFFF;}
          </style>
          <circle class="prevCircle" cx="24" cy="24.2" r="23"/>
          <g>
            <path class="st10" d="M27.4,24.1l-9.9-4.2v-7L35,21.2v6l-17.5,8.2v-7L27.4,24.1z"/>
          </g>
          </svg>
        </div>
        <div class="arrows next">
          <svg version="1.1" id="arrowCircle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 48 48.2" style="enable-background:new 0 0 48 48.2;" xml:space="preserve">
          <style type="text/css">
            .st10{fill:#FFFFFF;}
          </style>
          <circle class="nextCircle" cx="24" cy="24.2" r="23"/>
          <g>
            <path class="st10" d="M27.4,24.1l-9.9-4.2v-7L35,21.2v6l-17.5,8.2v-7L27.4,24.1z"/>
          </g>
          </svg>
        </div>
        <!--  -->
        <h2></h2>
        <div class="copy">
          <p></p>
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
      </div>
    </div>
  <div class="container">

      <section class="masthead">

      <?php $latestPosts = new wp_query(array(
        'post_type' => 'masthead',
        'posts_per_page' => -1
      )) ?> 
      
      <?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post() ?>
        <?php $states = get_field('states');  ?>
        <?php foreach ($states as $state_data) {
            $initialState = $state_data['initial_state'];
            $initialState = strtolower($initialState);
            $secondaryState = $state_data['secondary_state'];
            $secondaryState = strtolower($secondaryState);
            //
            if($initialState == "heyross") {
              echo '<div class="masthead-title clearfix">';
              echo '<div class="heyrossContainer">&nbsp;';
              echo '<div class="'.$initialState.'1 clearfix">';
              echo $initialState;
              echo '</div>';
              echo '<div class="'.$initialState.'2 clearfix">';
              echo $secondaryState;
              echo '</div>';
              echo '</div>';
              echo '</div>';
              // pre_r('YOU GOT THE HEY ROSS');
            } else {
              echo '<div class="'.$initialState.' masthead-title clearfix">';
              echo $initialState;
              echo '</div>';
            }

           }
        ?>
      <?php endwhile; ?> 
      </section>
      

      <section class="about">
        <div class="infographics clearfix">
          <div class="info01">
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
          <div class="info02">
            <div class="icon">
              <img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/airHockey.svg" alt="*No governing body has recognized this accomplishment...yet" title="*No governing body has recognized this accomplishment...yet">
            </div>
            <div class="info" title="*No governing body has recognized this accomplishment...yet" alt="*No governing body has recognized this accomplishment...yet" title="*No governing body has recognized this accomplishment...yet" >
              <p>Unofficially</p>
              <p>undefeated</p>
              <p>at air hockey</p>
              <p>since 1998*</p>
            </div>
          </div>
          <div class="info03">

            <div class="icon">
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
             echo '<div class="project project'.$product_index.'" data-number="'.$product_index.'" style="background-image: url('.$project_img.')">';
             echo '<h2>'.$project_data['projectname'].'</h2>';
             // echo '<p>'.$project_data['projectdescription'].'</p>';
             // echo '<a href="http://'.$project_data['projectlink'].'">'.$project_data['projectlink'].'</a>';
             echo '</div>';
           }
           ?>
       <?php endwhile; ?> 
    </section>
      
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>

