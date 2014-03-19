<?php 

$postid = $postid = get_the_ID();
global $postid;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title><?php woo_title(); ?></title>
<meta name="google-site-verification" content="qjB-r99uuU3uPdciuIkZ8zgIdDxTkeyOsR3n6spwmSk" />
<?php woo_meta(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/960.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

<!--[if IE 6]>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/includes/js/pngfix.js"></script>
<![endif]--> 

<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/ie.css" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/menu.js"></script>
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="shortcut icon" href="/favicon.ico" />

<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php if (is_page_template('template-ex_frame.php')) { ?> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<?php } else {} ?>

<script src="/wp-content/themes/aperture/includes/js/content-loader.js"></script>

<script type="text/javascript" src="http://use.typekit.com/prd1zsi.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<script src="<?php bloginfo('template_directory'); ?>/includes/superfish.js"></script> 
 
<script> 
 
    $(document).ready(function(){ 
        $("ul.nav").superfish(); 
    }); 
 
</script>

<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
    
</head>

<body <?php if ( is_front_page() || is_home() ) { ?> id="home"<?php } ?> class="custom">
                
		<div id="header">
            <div class="container_16">
                <div class="grid_8 alpha">
				
					<a style="display: block; position: relative; right: 0; top: 27px; z-index: 999;" href="http://shakespeare.org.uk/" title="Shakespeare Birthplace Trust" target="_blank"><img class="fr" style="margin-left: -122px;" src="<?php bloginfo('template_directory'); ?>/images/shakespeare-birthplace-trust-logo.png" alt="Shakespeare Birthplace Trust Logo" /></a>
                
                    <h1 id="logo"><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><img src="<?php if ( get_option('woo_logo') <> "" ) {  echo get_option('woo_logo'); } else { ?><?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/logo.png<?php } ?>" alt="" /></a></h1>
            
                </div><!-- / #grid_8 -->
                <div class="grid_8 omega">
                
               <!-- Top Banner Ad or Dropdown Starts -->
                <?php 
             $ad_yes =     get_option('woo_ad_header');
             $ad_code =      get_option('woo_ad_header_code');
             $ad_image =     get_option('woo_ad_header_image');
             $ad_url =      get_option('woo_ad_header_url');
             
             if($ad_yes == 'true'){
             ?>
            <div class="header_banner_ad">
            <?php 
            if($ad_code != ''){ echo stripcslashes($ad_code); }
            else { 
            ?>
            <a href="<?php echo $ad_url;  ?>" title="<?php _e('Advert',woothemes); ?>"><img class="title" src="<?php echo $ad_image; ?>" alt="" /></a>
            <?php
             } 
             ?>
            </div>
            <?php }
            
            else {
              ?>
              <!-- <div id="button"> 
                    <img src="<?php bloginfo('template_directory'); ?>/<?php woo_style_path(); ?>/button.png" width="184" height="32" alt="" class="menu_class" />
                    <ul class="the_menu">
                        <?php wp_list_categories('sort_column=menu_order&depth=3&title_li=&exclude='.get_option('woo_nav_exclude')); ?>
                    </ul>
              </div> -->    
            
 
            
            <?php } ?>
            
             <!-- Top Banner Ad or Dropdown Ends -->                  
    
                </div><!-- / #grid_8 -->
            </div><!-- / #container_16 -->
		</div><!-- / #header -->
		
		<div id="navigation">

			<div class="navigation-container">

				<?php
					if ( function_exists('has_nav_menu') && has_nav_menu('primary-menu') ) {
						wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'nav', 'menu_class' => 'nav', 'theme_location' => 'primary-menu' ) );
					?>
		
					<div id="search-bar">
					
						<div class="search-input fr">
						
							<form method="get" class="searchform" action="<?php bloginfo('url'); ?>" >
								<input type="text" class="field s" name="s" value="<?php _e('Search...', 'woothemes') ?>" onfocus="if (this.value == '<?php _e('Search...', 'woothemes') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...', 'woothemes') ?>';}" />
							</form>
						
						</div><!-- /.search-input -->
						
						<div class="fix"></div>
						
					</div><!-- /#search-bar -->

					<a class="sbt" href="http://shakespeare.org.uk" target="_blank">SBT Website</a>

			</div>

			<?php } else {
			?>
			<ul id="nav" class="nav">
				<?php
				if ( isset($woo_options['woo_custom_nav_menu']) AND $woo_options['woo_custom_nav_menu'] == 'true' ) {
					if ( function_exists('woo_custom_navigation_output') )
						woo_custom_navigation_output();
				} else { ?>
					<?php if ( is_page() ) $highlight = "page_item"; else $highlight = "page_item current_page_item"; ?>
					<li class="home <?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>"><span class="display-none"><?php _e('Home', 'woothemes') ?></span></a></li>
					<?php
						wp_list_pages('sort_column=menu_order&depth=6&title_li=&exclude=');
				}
				?>
				
				<div id="search-bar">
			
					<div class="search-input fr">
					
						<form method="get" class="searchform" action="<?php bloginfo('url'); ?>" >
							<input type="text" class="field s" name="s" value="<?php _e('Search...', 'woothemes') ?>" onfocus="if (this.value == '<?php _e('Search...', 'woothemes') ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search...', 'woothemes') ?>';}" />
						</form>
					
					</div><!-- /.search-input -->
					
					<div class="fix"></div>
					
				</div><!-- /#search-bar -->
				
				<li class="sbt"><a href="http://shakespeare.org.uk" target="_blank">SBT Website</a></li>
		
			</ul><!-- /#nav -->
						
			<?php } ?>
			
			<?php if ( function_exists('has_nav_menu') && has_nav_menu('cat-menu') ) { ?>
			
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'cat-nav', 'menu_class' => 'nav', 'theme_location' => 'cat-menu' ) ); ?>
			
			<?php } ?>
			
		</div><!-- /#navigation -->

        <div id="content">
			<div id="contentWrap" class="container_16">