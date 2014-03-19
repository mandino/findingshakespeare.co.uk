<?php
/*
Template Name: ME - Find out more
*/

$postid = get_the_ID();
?>
<div id="the-post">

	<h3 class="section-title">Find Out More</h3>

	<div class="me-section find-out-more">
		<div class="me-section-divider me-contributors">
			
			<h4><?php the_field("contributors_title", $postid); ?></h4>
			
			<?php if(get_field("me_credits_contributors_one", $postid)): ?>
				<div class="shakespeare-staff">
					<ul>
						<?php while(has_sub_field("me_credits_contributors_one")): ?>
							<li><?php the_sub_field("contributors_header_two"); ?> <?php the_sub_field("contributors_name_two"); ?></li>
						<?php endwhile; ?>
					</ul>
				</div>
			<?php endif; ?>
			
			<?php if(get_field("me_credits_contributors_two", $postid)): ?>
				<?php while(has_sub_field("me_credits_contributors_two")): ?>
					<h4><?php the_sub_field("contributors_header_one"); ?></h4>
						<ul>
					<?php if(get_sub_field("contributors_name_one")): ?>
						<?php while(has_sub_field("contributors_name_one")): ?>
							<li><?php the_sub_field("contributors_name_li"); ?></li>
						<?php endwhile; ?>
					<?php endif; ?>
						</ul>
				<?php endwhile; ?>
			<?php endif; ?>
			
		</div>

		<div class="me-section-divider me-links-to-sites lower">

			<?php if (get_field('me_credits_links_to_other_sites', $postid)) : ?>

				<h4><?php the_field('me_credits_links_to_other_sites_title',$postid); ?></h4>

				<ul>

					<?php while (has_sub_field('me_credits_links_to_other_sites', $postid)) : ?>

						<li><a href="<?php the_sub_field('me_credits_site_url'); ?>" target="_blank"><?php the_sub_field('me_credits_site_name'); ?></a></li>

					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>

		<div class="me-section-divider me-recommendations lower">

			<?php if (get_field('me_credits_other_recommendations', $postid)) : ?>

				<h4><?php the_field('me_credits_other_recommendations_title',$postid); ?></h4>

				<ul>

					<?php while (has_sub_field('me_credits_other_recommendations', $postid)) : ?>

						<li><a href="<?php the_sub_field('me_credits_recommendation_url'); ?>" target="_blank"><?php the_sub_field('me_credits_recommendation_name'); ?></a></li>

					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>

		<div class="me-credits">
			<?php the_field('me_credits_contact_details',$postid); ?>
		</div>

	</div>

</div>

