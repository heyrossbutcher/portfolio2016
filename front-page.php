<?php get_header();  ?>

<div class="main">
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
            <p>Development</p>
          </div>

          </div>
          <div class="info02">
            <div class="icon">
              <img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/airHockey.svg" alt="">
            </div>
            <div class="info" title="*No governing body has recognized this accomplishment...yet" alt="*No governing body has recognized this accomplishment...yet">
              <p>Unofficially</p>
              <p>undefeated</p>
              <p>at air hockey</p>
              <p>since 1998*</p>
            </div>
          </div>
          <div class="info03">
            <div class="icon">
              <img src="http://localhost:8888/001New-Portfolio/production/wp-content/themes/heyross/img/beard.svg" alt="">
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
             echo '<p>'.$project_data['projectdescription'].'</p>';
             // echo '<a href="http://'.$project_data['projectlink'].'">'.$project_data['projectlink'].'</a>';
             echo '</div>';
           }
           ?>
       <?php endwhile; ?> 
    </section>
      
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>

