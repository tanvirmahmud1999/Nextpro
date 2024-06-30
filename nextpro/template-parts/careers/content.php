 <div id="post-<?php the_ID(); ?>" class=" role-box bg--white-300 r-10">
     <a href="<?php echo get_the_permalink() ?>">
         <span><?php echo nextpro_get_the_term_list(get_the_ID(), 'career_cat', '', ' , ', '', false); ?></span>
         <h6 class="s-20 w-700 career-title"><?php the_title(); ?></h6>
         <p><?php echo get_post_meta(get_the_ID(), 'job_location', true); ?></p>
     </a>
 </div>