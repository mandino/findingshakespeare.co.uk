<?php
/*
Template Name: Music Exhibition Theme
*/

$postid = get_the_ID();
?>
<div id="the-post">

	<h3 class="section-title"><?php the_field('me_theme_title',$postid); ?></h3>

	<div class="me-section">
		<div class="me-section-divider">
			<div class="theme-quote">
				<h3><?php the_field('me_theme_quote', $postid); ?></h3>
				<p><span class="bookquote"><?php the_field('me_theme_author_of_quote', $postid); ?></span>, <span class="bookact"><?php the_field('me_theme_book_act', $postid); ?></span></p>
			</div>
		</div>

		<div class="me-section-divider">
			<div class="theme-introduction"><?php the_field('me_theme_introduction', $postid); ?></div>
		</div>
	
		<div class="music-theme slidedeck">
			<?php the_field('me_theme_slidedeck', $postid); ?>
		</div>

	</div>

	<h3 class="section-title"><?php the_field('me_theme_resources_title',$postid); ?></h3>

	<div class="me-section">
		<div class="links-to-blog">

			<?php if (get_field('me_theme_links_to_blog', $postid)) : ?>

				<ul>

					<?php while (has_sub_field('me_theme_links_to_blog', $postid)) : ?>

						<li><a target="_blank" href="<?php the_sub_field('me_theme_link_url'); ?>"><?php the_sub_field('me_theme_link_name'); ?></a></li>

					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>
	</div>

</div>

