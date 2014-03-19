<?php
/*
Template Name: ME - Introduction
*/

$postid = get_the_ID();
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<div id="the-post">
	
	<?php if (get_field('me_music_title', $postid) == "") { ?><div class="section-title empty"></div><?php } else { ?>
		<h3 class="section-title"><?php the_field('me_music_title', $postid); ?></h3>
	<?php } ?>

	<div class="me-section me-intro">
		<div class="me-section-divider first">
			
			<?php while(has_sub_field("intro_video_above" , $postid)): ?>
				<?php if(get_row_layout() == "single_video"): ?>
					<div class="singlevideo"><?php the_sub_field("single_video_iframe"); ?></div>
				<?php elseif(get_row_layout() == "double_video"): ?>
					<div class="doublevideo">
						<div class="fl"><?php the_sub_field("first_video"); ?></div>
						<div class="rt"><?php the_sub_field("second_video"); ?></div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			
			<?php if (get_field('me_music_quote', $postid) == "") { ?><div class="section-title empty"></div><?php } else { ?>
				<div class="me-section-divider intro-quote">
					<div class="theme-quote">
						<h3><?php the_field('me_music_quote', $postid); ?></h3>
						<p><span class="bookquote"><?php the_field('me_music_book_quote', $postid); ?></span>, <span class="bookact"><?php the_field('me_music_book_act', $postid); ?></span></p>
					</div>
				</div>
			<?php } ?>
			
			<?php the_field('me_music_introduction', $postid); ?>

			<?php if (get_field('me_music_main_link_to_blog_url_1', $postid) == "") { ?><?php } else { ?><div class="me-main-link-to-blog"><?php } ?>
				<?php if (get_field('me_music_main_link_to_blog_url_1', $postid) == "") { ?><?php } else { ?><div class="linktoblogone"><a target="_blank" href="<?php the_field('me_music_main_link_to_blog_url_1', $postid); ?>"><?php the_field('me_music_main_link_to_blog_title_1', $postid); ?></a></div><?php } ?>
				<?php if (get_field('me_music_main_link_to_blog_url_2', $postid) == "") { ?><?php } else { ?><div class="linktoblogtwo"><a target="_blank" href="<?php the_field('me_music_main_link_to_blog_url_2', $postid); ?>"><?php the_field('me_music_main_link_to_blog_title_2', $postid); ?></a></div><?php } ?>
				<?php if (get_field('me_music_main_link_to_blog_url_3', $postid) == "") { ?><?php } else { ?><div><a target="_blank" href="<?php the_field('me_music_main_link_to_blog_url_3', $postid); ?>"><?php the_field('me_music_main_link_to_blog_title_3', $postid); ?></a></div><?php } ?>
			</div>

			<?php while(has_sub_field("intro_video_below" , $postid)): ?>
				<?php if(get_row_layout() == "single_video"): ?>
					<div class="singlevideo below"><?php the_sub_field("single_video_iframe"); ?></div>
				<?php elseif(get_row_layout() == "double_video"): ?>
					<div class="doublevideo below">
						<div class="fl"><?php the_sub_field("first_video"); ?></div>
						<div class="rt"><?php the_sub_field("second_video"); ?></div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			
		</div>
		
		<?php if (get_field('me_music_slidedeck', $postid) == "") { ?><div class="section-title empty"></div><?php } else { ?>
			<div class="me-section-divider slidedeck">
				<?php the_field('me_music_slidedeck', $postid); ?>
			</div>
		<?php } ?>

		<div class="me-section-divider playlist">
			<?php the_field('me_music_playlist_embed', $postid); ?>
		</div>

		<div class="me-section-divider last">

			<?php if (get_field('me_music_videos', $postid)) : ?>

				<ul>

					<?php while (has_sub_field('me_music_videos', $postid)) : ?>

						<li>
							<h4><?php the_sub_field('me_music_video_title'); ?></h4>
							<?php the_sub_field('me_music_video_embed'); ?>
							<div class="me-video-divider"></div>
						</li>

					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>
	</div>

</div>

