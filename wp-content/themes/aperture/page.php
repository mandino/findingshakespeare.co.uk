<?php get_header(); ?>

	<div id="main" class="grid_8 alpha">
			
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<h2 class="single"><?php the_title(); ?></h2>
		
		<!-- <?php if(!is_page('7')) { ?>
            
            <ul class="social-media">
			
					
				<li class="facebook-share">
	
					<a name="fb_share" type="button_count" share_url="<?php the_permalink(); ?>" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
					
				</li>

				<li class="twitter-tweet">
				
					<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-count="horizontal" data-via="ShakespeareBT" data-related="ShakespeareBT">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				
				</li>
				
				<li class="facebook-send">
				
					<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:send href="<?php the_permalink(); ?>" font=""></fb:send>
				
				</li>
				
				<li class="stumble-upon">
				
					<script src="http://www.stumbleupon.com/hostedbadge.php?s=2&r=<?php the_permalink(); ?>"></script>
				
				</li>
				
				<li style="clear:left; float:left; height:80px; margin-top:10px; width:450px;">
					
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink() ?>&amp;send=true&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
				
				</li>
				
			</ul>
			
		<?php } ?> -->
		
        <div class="entry">
		
			<?php the_content(); ?>
                 
        </div>
        
		<?php endwhile; endif; ?>
			
	</div><!-- / #main -->

<?php get_sidebar(); ?>
<?php get_sidebar("2"); ?>
<div class="clear"></div>
<?php get_footer(); ?>