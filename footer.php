<footer class="initialFooterPos">
  <div class="container">
  	<div class="contact-form-fields">
  		  <?php $latestPosts = new wp_query(array(
  		    'post_type' => 'contact',//we only want contact
  		    'posts_per_page' => 1
  		  )) ?> 
  		  <?php if($latestPosts->have_posts()) while($latestPosts->have_posts()) : $latestPosts->the_post() ?>
        <div class="contactTitle clearfix">
  		    <div class="contactName"><?php the_title(); ?></div>
          <div class="plusClose">+</div>
        </div>
        <div class="theInfo clearfix">
          
          <div class="theContacts">
            <p>heyross is</p>
            <p>Ross Butcher</p>
            <p>you can give</p>
            <p>him a call at</p>
            <p>+1 (647) 668-6850</p>
            <p>or email <span class="arrow">&#8594;</span></p>
            <!-- <p>647.668.6850</p> -->
          </div>
          <div class="theForm">
            <?php the_content(); ?>
          </div>
          <div class="theAnimation">
            <div class="thePlane">
              <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/paperPlane.svg" alt="">
            </div>
            <div class="clouds01">
              <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/clouds01.svg" alt="">
            </div>
            <div class="clouds02">
              <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/clouds02.svg" alt="">
            </div>
            <div class="speedLines01">
              <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/speedLines01.svg" alt="">
            </div>
            <div class="speedLines02">
              <img src="http://rossbutcher.ca/wp-content/themes/heyross/img/speedLines02.svg" alt="">
            </div>
          </div>
        </div>

  		  <?php endwhile; // end of the loop. ?>
  		  <?php wp_reset_postdata(); ?>
  		<?php //End of grabbing Contact pieces ?>
  	</div>
  </div>
</footer>

<script src="http://rossbutcher.ca/wp-content/themes/heyross/js/TweenMax.min.js"></script>
<script src="http://rossbutcher.ca/wp-content/themes/heyross/js/MorphSVGPlugin.min.js"></script>
<?php wp_footer(); ?>
<div id="myElement"></div>
</body>
</html>