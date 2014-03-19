<div id="footerWrap" class="container_16">
    
    <div class="grid_4 alpha">                             
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-1') )  ?>
    </div>
    
    <div class="grid_4">
        <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footer-2') )  ?>
    </div>

    <div class="grid_8 omega">

        <div id="blog" class="widget">

            <h3 id="news"><?php _e('RECENT POSTS',woothemes); ?></h3>
        
            <?php 
            $cat_id = get_option('woo_blog_cat');
            $post_count = get_option('woo_featured_posts');
            query_posts("cat=$cat_id&showposts=$post_count");
            
            if (have_posts()) :

              $counter = 0; $counter2 = 0; $count = 0;
              while (have_posts()) : the_post(); 
      
              $counter++; $count++;
            ?>
                    
            <div class="grid_4 <?php if ($counter == 2) { echo 'alpha'; } else { echo 'omega'; $counter = 1; } ?>">
            
                <div class="box" style="<?php if ( $count > 3 ) { ?>height: 355px; <?php } ?>">
                    
                    <div style="height:100px; margin-bottom:5px">
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php woo_get_image('image','198','100','thumbnail',90,null,'img',1,0,'','',false,false); ?></a>
                    </div>
                    <h4><a title="<?php _e('Permalink to ',woothemes); ?> <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                    <p class="post_meta"><span class="date"><?php the_time('F jS, Y') ?></br>by: <?php the_author_posts_link(); ?></span></p>
                    <p style="clear:both;">
					
                         <?php global $more; $more = 0; ?>
		                    <?php if ( $woo_options['woo_post_content'] == "content" ) the_content(__( 'Read More...', 'woothemes' )); else echo woo_text_trim(get_the_excerpt(), 30); ?>
							
							<?php if ( $count < 4 ) { ?>
							
								<ul style="height: 50px;" class="social-media">

									<li class="twitter-tweet">
									
										<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="ShakespeareBT" data-related="ShakespeareBT">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
									
									</li>
									
									<li style="clear:left; float:left; height:21px; width:210px; margin-top: 5px;">
										
										<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;send=false&amp;layout=button_count&amp;width=210&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:210px; height:21px;" allowTransparency="true"></iframe>
									
									</li>
									
								</ul>
							
							<?php } ?>
                     
                     </p>
                    
                </div><!-- / #box -->
        
            </div><!-- / #grid_4 -->
        
            <?php endwhile; ?>
     
            <?php else: ?>	
                <p><?php _e('No posts yet',woothemes); ?></p>
            <?php endif; ?>

        </div><!-- / #blog -->

    </div><!-- / #grid_8 -->
    
</div><!-- / #footerWrap -->