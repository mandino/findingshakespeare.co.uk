<?php
function woo_options(){
// VARIABLES
$themename = "Aperture";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/aperture/';
$shortname = "woo";

$GLOBALS['template_path'] = get_bloginfo('template_directory');

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "ALL");   
     
//Access the Blog Categories via an Array
$woo_blog_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_blog_categories[$woo_cat->slug] = $woo_cat->cat_name;
    }
$categories_tmp = array_unshift($woo_blog_categories, "Select a category:");    

//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       


$GLOBALS['template_path'] = get_bloginfo('template_directory');

      
//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$ad_template = "advertising";
$nav_template = "nav";
$image_template = "image";

// ALBUM CATEGORIES BOXES (homepage)
function category_boxes($options) {        
    $cats = get_categories('hide_empty=0');
    foreach ($cats as $cat) {
        $options[] = array(    "name" =>  $cat->cat_name,
                    "desc" => "Check this box if you wish to exclude this category in the photo album categories",
                    "id" => "woo_cat_box_".$cat->cat_ID,
                    "std" => "",
                    "type" => "checkbox");                    
    }
    return $options;
    
}// ALBUM CATEGORIES BOXES IMAGES (homepage)
function category_boxes_images($options) {        
    $cats = get_categories('hide_empty=0');
    foreach ($cats as $cat) {
        $options[] = array(    "name" =>  $cat->cat_name,
                    "desc" => "Upload an image to replace the dynamic homepage images.",
                    "id" => "woo_cat_box_".$cat->cat_ID.'_image',
                    "std" => "",
                    "type" => "upload");                    
    }
    return $options;
}

// THIS IS THE DIFFERENT FIELDS

$options = array();
$options[] = array(    "name" => "General Settings", 
						"icon" => "general",
                    "type" => "heading");
                        
$options[] = array(    "name" => "Theme Stylesheet",
                                        "desc" => "Select your themes alternative color scheme.",
                                        "id" => $shortname."_alt_stylesheet",
                                        "std" => "default.css",
                                        "type" => "select",
                                        "options" => $alt_stylesheets);

$options[] = array(    "name" => "Custom Logo",
                                        "desc" => "Upload a logo for your theme, or specify an image URL directly.",
                                        "id" => $shortname."_logo",
                                        "std" => "",
                                        "type" => "upload");                                                     

 $options[] = array(    "name" => "Custom Favicon",
                                        "desc" => "Upload a 16px x 16px <a href='http://www.faviconr.com/'>ico image</a> that will represent your website's favicon.",
                                        "id" => $shortname."_custom_favicon",
                                        "std" => "",
                                        "type" => "upload"); 
                                        
$options[] = array(    "name" => "Tracking Code",
                                        "desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
                                        "id" => $shortname."_google_analytics",
                                        "std" => "",
                                        "type" => "textarea");        

$options[] = array(    "name" => "RSS URL",
                                    "desc" => "Enter your preferred RSS URL. (Feedburner or other)",
                                    "id" => $shortname."_feedburner_url",
                                    "std" => "",
                                    "type" => "text");
                                    
$options[] = array( "name" => "Custom CSS",
                                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                                    "id" => $shortname."_custom_css",
                                    "std" => "",
                                    "type" => "textarea");
                    
$options[] = array(    "name" => "Layout",
						"icon" => "layout",
                                        "type" => "heading");        
                    
$options[] = array(    "name" => "Blog Category",
                                        "desc" => "Select a <strong>Category</strong> which you want to show a normal blog layout. All sub categories of this category will also inherit the same blog layout. Add this category to your navigation by using <a href='".home_url()."/wp-admin/nav-menus.php'>WP Menus</a>.",
                                        "id" => $shortname."_blog_cat",
                                        "std" => "Select a category:",
                                        "type" => "select2", 
                                        "options" => $woo_blog_categories);    
                                        
$options[] = array(    "name" => "Blog posts on the Homepage",
                                        "desc" => "Select the number of blog posts you'd like to display on the Homepage. <br />NOTE: Set the total number of blog posts to show on in <a href='".home_url()."/wp-admin/options-reading.php'>WP Settings</a>.",
                                        "id" => $shortname."_featured_posts",
                                        "std" => "Select a number:",
                                        "type" => "select",
                                        "options" => $other_entries);    

$options[] = array(    "name" => "Homepage Options",
						"icon" => "homepage",
                                        "type" => "heading");
                                        
$options[] = array(    "name" => "Homepage Slider Posts",
                                        "desc" => "Select the number of posts to display in your Homepage slider.",
                                        "id" => $shortname."_scroller_posts",
                                        "std" => "Select a number:",
                                        "type" => "select",
                                        "options" => $other_entries);
                        
$options[] = array( "name" => "Featured Category",
					"desc" => "Select the category that you would like to have displayed in the featured slider. Leave on your homepage.",
					"id" => $shortname."_featured_category",
					"std" => "ALL",
					"type" => "select",
					"options" => $woo_categories);                                                   
    
$options[] = array(    "name" => "About Title",
                                        "desc" => "Include a short title for your about module on the Homepage.",
                                        "id" => $shortname."_about_header",
                                        "std" => "",
                                        "type" => "text");
                    
$options[] = array(    "name" => "About Text",
                                        "desc" => "Include a short paragraph of text describing your product/service/company.",
                                        "id" => $shortname."_about_text",
                                        "std" => "",
                                        "type" => "textarea");    
                    
$options[] = array(    "name" => "Read More Button Text",
                                        "desc" => "Please enter the text you want to appear on the first button. Leave empty to remove.",
                                        "id" => $shortname."_about_button",
                                        "std" => "",
                                        "type" => "text");
                    
$options[] = array(    "name" => "Read More Button URL",
                                        "desc" => "Please enter the URL of the page you want linked to button 1",
                                        "id" => $shortname."_button_link",
                                        "std" => "",
                                        "type" => "text");
                    
$options[] = array(    "name" => "About Photo",
                                        "desc" => "Please enter the url of the photo you would like to appear in the about module. Leave empty to remove.",
                                        "id" => $shortname."_about_photo",
                                        "std" => "",
                                        "type" => "text");    
                                        
$options[] = array(    "name" =>  "Category Box Exclude",
						"icon" => "homepage",
                                        "type" => "heading");
                    

$options = category_boxes($options);    

$options[] = array(    "name" =>  "Category Box Images",
						"icon" => "homepage",
                                        "type" => "heading");
                    
$options = category_boxes_images($options);    

                                        
//Advertising

$options[] = array(        "name" => "Dynamic Images",
						"icon" => "image",
                                       "type" => "heading");  
                                       
$options[] = array( "name" => "WP Post Thumbnail",
					"desc" => "Use WordPress post thumbnail to assign a post thumbnail.",
					"id" => $shortname."_post_image_support",
					"std" => "true",
					"class" => "collapsed",
					"type" => "checkbox"); 

$options[] = array( "name" => "WP Post Thumbnail - Dynamically Resize",
					"desc" => "The post thumbnail will be dynamically resized using native WP resize functionality. <em>(Requires PHP 5.2+)</em>",
					"id" => $shortname."_pis_resize",
					"std" => "true",
					"class" => "hidden",
					"type" => "checkbox"); 									   
					
$options[] = array( "name" => "WP Post Thumbnail - Hard Crop",
					"desc" => "The image will be cropped to match the target aspect ratio.",
					"id" => $shortname."_pis_hard_crop",
					"std" => "true",
					"class" => "hidden last",
					"type" => "checkbox"); 									   

$options[] = array(    "name" => "Enable Dynamic Image Re-sizer",
                                        "desc" => "This will enable the thumb.php script. It dynamically resizes images on your site.",
                                        "id" => $shortname."_resize",
                                        "std" => "true",
                                        "type" => "checkbox");    
                    
$options[] = array(    "name" => "Automatic Image Thumbs",
                                    "desc" => "If no image is specified in the 'image' custom field then the first uploaded post image is used.",
                                    "id" => $shortname."_auto_img",
                                    "std" => "false",
                                    "type" => "checkbox");    
                                                            
$options[] = array(    "name" => "Disable Thumbnail Single Post",
                                    "desc" => "Don't show the resized image on single post page.",
                                    "id" => $shortname."_disable_single",
                                    "std" => "false",
                                    "type" => "checkbox");    

$options[] = array( "name" => "Show Image in RSS feed",
					"desc" => "Will show the image uploaded to 'image' custom field in the RSS feed.",
					"id" => $shortname."_rss_thumb",
					"std" => "false",
					"type" => "checkbox");    


// - Header Banner (468x60px)
$options[] = array(    "name" => "Header (468x60px)",
						"icon" => "ads",
                    "type" => "heading");

$options[] = array(    "name" => "Enable this Ad",
                    "desc" => "Enable this Ad space, but disable the Recent Post insert.",
                    "id" => $shortname."_ad_header",
                    "std" => "false",
                    "type" => "checkbox");    

$options[] = array(    "name" => "Adsense code",
                    "desc" => "Enter your adsense code (or other ad network code) here.",
                    "id" => $shortname."_ad_header_code",
                    "std" => "",
                    "type" => "textarea");

$options[] = array(    "name" => "Image Location",
                    "desc" => "Enter or upload the Ad Image from here.",
                    "id" => $shortname."_ad_header_image",
                    "std" => "http://www.woothemes.com/ads/468x60a.jpg",
                    "type" => "upload");

$options[] = array(    "name" => "Image Destination",
                    "desc" => "Enter the destination URL for this banner advert.",
                    "id" => $shortname."_ad_header_url",
                    "std" => "http://www.woothemes.com",
                    "type" => "text");   
                                        
// - Homepage Leaderboard Ad (728x90px)  
                    
$options[] = array( "name" => "Homepage (728 x 90px)",
						"icon" => "ads",
                    "type" => "heading");

$options[] = array( "name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_top",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_top_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_top_image",
					"std" => "http://www.woothemes.com/ads/468x60a.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_top_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");  
					
// - Archive Leaderboard Ad (728x90px)                       

$options[] = array( "name" => "Archive (728 x 90px)",
						"icon" => "ads",
					"type" => "heading");

$options[] = array( "name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_content",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_content_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL for this banner ad.",
					"id" => $shortname."_ad_content_image",
					"std" => "http://www.woothemes.com/ads/728x90a.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_content_url",
					"std" => "http://www.woothemes.com",
					"type" => "text"); 
					
// - Sodebar Widget Ad (220px width)                          

$options[] = array( "name" => "Widget (300px width)",
						"icon" => "ads",
					"type" => "heading");

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_300_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL for this banner ad. Please note this advert needs to have a maximum width of 300 pixels in order to fit into the widgetized footer or sidebar spaces.",
					"id" => $shortname."_ad_300_image",
					"std" => "http://www.woothemes.com/ads/300x250a.jpg",
					"type" => "upload");

$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_300_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");    


$woo_metaboxes = array(


        "image" => array (
            "name"        => "image",
            "std"     => "",
            "label"     => "Image",
            "type"         => "upload",
            "desc"      => "Upload a file for image to be used by the Dynamic Image resizer."
        )
    );
    
                        
        update_option('woo_template',$options);
        update_option('woo_themename',$themename);      
        update_option('woo_shortname',$shortname ); 
        update_option('woo_manual',$manualurl ); 
        
// Add extra metaboxes through function
if ( function_exists("woo_metaboxes_add") )
	$woo_metaboxes = woo_metaboxes_add($woo_metaboxes);
    
if ( get_option('woo_custom_template') != $woo_metaboxes) update_option('woo_custom_template',$woo_metaboxes);
 
 
    
}

add_action('init','woo_options')
 
?>