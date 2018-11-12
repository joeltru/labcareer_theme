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
	</div>
</div>
<script>
  jQuery(document).ready(function(){
jQuery("h3#blog-post-intro-message").html(function(){
  var text= $(this).text().trim().split(" ");
  var first = text.shift();
  return (text.length > 0 ? "<span class='redLarge'>"+ first + "</span> " : first) + text.join(" ");
});
jQuery("h6.counted-headline").each(function(){
jQuery(this).html(function(){
  var text= $(this).text().trim().split(" ");
  var first = text.shift();
  return (text.length > 0 ? "<span class='redLargeCount'>"+ first + "</span> " : first) + text.join(" ");
});
  
  
  
})

});
</script>

<?php get_footer();
