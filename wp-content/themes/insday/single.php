<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package insday
 */

get_header();
$showFooter = false;
?>
		<?php
		while ( have_posts() ) :
			the_post();
			$type = get_post_type($post);

			if ($type == 'portfolio') {
				get_template_part( 'template-page/constructor-page');
			} else {
				$showFooter == true;
			}
		endwhile;
		?>
<?php
if ($showFooter) get_footer();