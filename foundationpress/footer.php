<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */
?>

<footer class="footer">
    <div class="main-container" id="footerBlock">
        <div class="footer-grid">
            <?php dynamic_sidebar( 'footer-widgets' ); ?>
        </div>
         <div class="legal_menu">
   <?php wp_nav_menu( array( 'theme_location' => 'footer_legal_menu' ) ); ?>
    </div>
    <div class="footerCopyright">
      <p>Copyright &copy; 2018 HealthCare Connections Inc. </p>
    </div>
    </div>
   
</footer>


<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas content -->
<?php endif; ?>

<script>
jQuery(
    "#upper-home-cta-block .wpb_column.vc_column_container .vc_column-inner"
).each(function() {
    var background = jQuery("<div class='background-overlay'></div>");
    var that = this;
    var linkText = jQuery(this).find(".wpb_wrapper h2");
    jQuery(that).prepend(background);
    jQuery(linkText).on("hover", function() {
        console.log("item hovered");
    });
});


</script>


<?php wp_footer(); ?>
</body>
</html>
