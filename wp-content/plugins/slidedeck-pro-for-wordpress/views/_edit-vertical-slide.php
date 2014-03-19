<?php
/**
 * Vertical slide template
 * 
 * SlideDeck Pro for WordPress 1.3.72 - 2011-03-30
 * Copyright (c) 2011 digital-telepathy (http://www.dtelepathy.com)
 * 
 * BY USING THIS SOFTWARE, YOU AGREE TO THE TERMS OF THE SLIDEDECK 
 * LICENSE AGREEMENT FOUND AT http://www.slidedeck.com/license. 
 * IF YOU DO NOT AGREE TO THESE TERMS, DO NOT USE THE SOFTWARE.
 * 
 * More information on this project:
 * http://www.slidedeck.com/
 * 
 * Full Usage Documentation: http://www.slidedeck.com/usage-documentation 
 * 
 * @package SlideDeck
 * @subpackage SlideDeck Pro for WordPress
 * 
 * @author digital-telepathy
 * @version 1.3.72
 * 
 * @uses slidedeck_dir()
 */

$is_template = (boolean) !isset( $i );
if( $is_template ) {
    $is_vertical = false;
}
$editor_id = $is_template ? "" : ('slide_' . $count . '_content_vertical_' . ( $i + 1 ) . '_parent');
?>

<h3 class="hndle vertical">
    <span class="name"><?php echo $is_template ? '&nbsp;' : ( empty( $slide['title'] ) ? "Slide " . $slide['slide_order'] : $slide['title'] ); ?></span>
     - 
    <span class="index"><?php echo $is_template ? '&nbsp;' : ( $i + 1 ); ?></span>
</h3>
<a class="slide-delete-vertical" href="#<?php echo $i + 1 ?>">Delete Slide</a>

<div class="vertical-editor-wrapper">
    <span class="vertical-slide-media">
	    <?php include( slidedeck_dir( '/views/_editor_media_buttons.php' ) ); ?>
    </span>
    
	<div class="editor-container">
		<textarea class="vertical<?php echo $is_vertical ? ' slide-content' : ''; ?>" id="<?php echo $editor_id; ?>" name="<?php echo !$is_template ? 'slide[' . $count . '][vertical_content][]' : ''; ?>"><?php echo htmlspecialchars( slidedeck_process_slide_content( $vertical_content[$i], true ), ENT_QUOTES ); ?></textarea>
	</div>
</div>