<div id="ex-sidebar" class="fl">
	<a href="<?php the_field('me_sidebar_advertisement_url'); ?>" target="_blank">
	<img src="<?php the_field('me_sidebar_advertisement_image'); ?>" alt="<?php the_field('me_sidebar_advertisement_title'); ?>" title="<?php the_field('me_sidebar_advertisement_title'); ?>" />
	</a>

	<h3>Music Exhibition Navigation</h3>

	<ul class="ex-sidebar-nav">
	  <?php
		  global $id;
		  wp_list_pages("title_li=&child_of=$id&show_date=modified
		  &date_format=$date_format"); 
	  ?>
	</ul>
</div>