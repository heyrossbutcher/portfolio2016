<footer>
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
        <div class="theForm"><?php the_content(); ?></div>

  		  <?php endwhile; // end of the loop. ?>
  		  <?php wp_reset_postdata(); ?>
  		<?php //End of grabbing Contact pieces ?>
  	</div>
    <p>&copy; Hey Ross Inc. <?php echo date('Y'); ?></p>
  </div>
</footer>

<script>
/* Google Analytics! */
 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
 s.parentNode.insertBefore(g,s)}(document,"script"));
</script>

<?php wp_footer(); ?>
</body>
</html>