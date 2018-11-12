<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid">
		<main class="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', '' ); ?>
				<?php the_post_navigation(); ?>
				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
    <aside class="sidebar" id="jobPostingsSingleSidebar">
    <section>

  <?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=false]'); ?>
    </section>
    </div>

	</div>
</div>
<script>
jQuery(document).ready(function(){
  var domain = window.location.pathname;
var domain = domain.split("/")[1];
console.log(domain)
if(domain === "jobs"){
  jQuery("#menu-item-2181").addClass("top-bar current-menu-parent")

}


})
</script>
<?php get_footer();
