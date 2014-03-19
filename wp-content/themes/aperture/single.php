<?php get_header(); ?>

 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
	<div id="main" class="grid_12 omega">
		
		<div class="grid_16 alpha"> 
		
			<h2 class="single"><?php the_title(); ?></h2>
			<p class="post_meta"><span class="date"><?php _e('Posted on ',woothemes); ?> <?php the_time('F jS, Y') ?> by: <?php the_author_posts_link(); ?></span></p>
			
			<?php sharebar(); ?>
		
			<?php sharebar_horizontal(); ?>
			
			<ul class="social-media">
			
				<?php
					$date1 = "2011-06-01";
					$date2 = $post->post_date;
					if ($date1 > $date2) { ?>
					
					
					<li class="facebook-share">
		
						<a name="fb_share" type="button_count" share_url="<?php the_permalink(); ?>" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
						
					</li>
					
					<li class="tweetmeme">
		
						<script type="text/javascript">
						tweetmeme_url = '<?php the_permalink() ?>';
						tweetmeme_style = 'compact';
						tweetmeme_source = 'shakespeareBT';
						tweetmeme_service = 'bit.ly';
						</script>
						<script type="text/javascript" src="http://tweetmeme.com/i/scripts/button.js"></script>
						
					</li>
					
				<?php } else { } ?>
				
				<li style="float:right;">
				
					<span class="comments"><a href="#dsq-content"><?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments')); ?></a></span>
				
				</li>
				
				<li style="clear:left; float:left; height:70px; width:450px;">
					
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;send=true&amp;layout=standard&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=70" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:70px;" allowTransparency="true"></iframe>
				
				</li>
				
			</ul>
			
		</div>
		
		<div class="entry">
			
			<?php the_content(); ?>
			
			<p class="post_meta tags" style="clear:both; margin-left:20px; margin-top:5px;"><strong>Tags:</strong> <?php the_tags('', ', ', '<br />'); ?></p>
			
			<?php edit_post_link(__('Edit this post.'), ' &#45; ', ''); ?>
			
		</div>
		
		<?php comments_template(); ?>

		<?php endwhile; endif; ?>
		
	</div><!-- / #main -->
		
<?php get_sidebar(); ?>
            
<?php get_footer(); ?>