                <div id="footer">
				
                <?php 
				if ( $GLOBALS['homepage'] ) 
                	include( TEMPLATEPATH . '/footer-home.php');
                else
                	include( TEMPLATEPATH . '/footer-normal.php');
                ?>

                </div><!-- / #footer -->
            </div><!-- / #contentWrap -->
        </div><!-- / #content -->
		
		<div class="footer">
        
            <div class="col-full">
		
				<div id="copyright" class="fl">
				<?php if($woo_options['woo_footer_left'] == 'true'){
				
						echo stripslashes($woo_options['woo_footer_left_text']);	
		
				} else { ?>
					<p><?php bloginfo(); ?> <?php _e('Copyright', 'woothemes') ?> &copy; <?php echo date('Y'); ?>. <?php _e('All Rights Reserved.', 'woothemes') ?></p>
				<?php } ?>
				</div>
				
				<div id="credit" class="fr">
				<?php if($woo_options['woo_footer_right'] == 'true'){
				
					echo stripslashes($woo_options['woo_footer_right_text']);
				
				} else { ?>
					<p>Baked and Frosted by <a class="misfit-inc" href="http://misfit-inc.com" target="_blank"><span class="display-none">misfit, inc.</span></a></p>
				<?php } ?>
				</div>
			
			</div>

			<div class="col-full privacy">
			    <a target="_blank" href="https://www.shakespeare.org.uk/terms-conditions/">T&amp;Cs, Privacy and Cookies</a>
			</div>
		
		</div>
            
        
<?php wp_footer(); ?>


<!-- Category dropdown --> 
<script type="text/javascript">
<!--
function showlayer(layer){
var myLayer = document.getElementById(layer);
if(myLayer.style.display=="none" || myLayer.style.display==""){
    myLayer.style.display="block";
} else {
    myLayer.style.display="none";
}
}            
-->
</script>

<script>
(function(d, t) {
var g = d.createElement(t),
s = d.getElementsByTagName(t)[0];
g.async = true;
g.src = ‘https://apis.google.com/js/plusone.js’;
s.parentNode.insertBefore(g, s);
})(document, ‘script’);
</script>
    
</body>
</html>