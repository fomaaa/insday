<?php 
/* Template Name: Портфолио */
  get_header(); 
?>
    <div class="js-scrollbar">
      <div class="out">
        <div id="page-wrapper">
          <div class="page page--portfolio">
            <div class="content">
              <div class="section section--portfolio">
                <div class="container section__inner">
                  <div class="section__head js-animate" data-animation="fadeInUp">
                    <div class="section__title section__title--lg"><?php the_title(); ?></div>
                    <div class="section__text section__text--xs"> <?php the_field("description"); ?></div>
                  </div>
                  <div class="portfolio js-animate" data-animation="fadeInUp" data-action="load_items" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                        <?php 
                        $terms = get_terms( array(
							    'taxonomy' => 'portfolio',
							    'hide_empty' => false,
							    'orderby'=> 'id'
							) ); 
						?>
                    <nav class="portfolio__nav">
                      <ul>
                        <li>
                          <a href="#" class="is-active all">все</a>
                        </li>
						<?php if ($terms) {
							foreach ($terms as $term) { ?>
		                        <li>
		                          <a href="<?php echo get_term_link($term) ?>" class="<?php echo $term->slug ?>"><?php echo $term->name ?></a>
		                        </li>
							<?php }
						} ?>
                      </ul>
                    </nav>
                    <div class="portfolio__grid">
					<?php
						$args = array(
						    'post_type' => 'portfolio',
						    'orderby' => 'date_add',
						    'post_per_page' => '999'
						);

						$child_query = new WP_Query( $args );
					?>
	                    
	                    <?php $counter = 1; ?>
	                    <?php $_counter = 1; ?>
	                    <?php $count =  $child_query->post_count; ?>
						<?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
						<?php $cats =  get_the_terms($post->ID, 'portfolio'); ?>
							<?php if ($counter == 1): ?><div class="portfolio__row"><?php endif ?>

	                        <div class="card card--work <?php getPortfolioBlockClass($counter, $_counter); ?> is-unloaded <?php if (!empty($cats[0])) echo $cats[0]->slug ?>" data-id="<?php echo get_the_ID(); ?>">
	                          <div class="card__inner">
	                          </div>
	                        </div>

							<?php if ($counter == 3 || $_counter == $count) : ?>  </div> <?php $counter = 0; endif; ?>
							<?php $counter++; ?>
							<?php $_counter++; ?>
						<?php endwhile; ?>
	                  

					<?php wp_reset_postdata(); ?>
                    </div>
                  </div>
                </div>
              </div>
<?php get_footer(); ?>