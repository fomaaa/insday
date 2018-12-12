<?php 
/* Template Name: Конструктор */
  get_header(); 
?>

    <div class="js-scrollbar">
      <div class="out">
        <div id="page-wrapper">
          <div class="work">
            <div class="work__block work__block--banner" style="background-color: <?php the_field('background-color') ?>;">
              <div class="container">
                <div class="banner">
                  <div class="banner__title" style="color: <?php the_field("title_color"); ?>;">  <?php the_field("title"); ?></div>
                  <ul class="worksList" style="color: <?php the_field("subtitle_color"); ?>;">
                  	<?php 
                  	$block = get_field("subtitle");
                  	if ($block):
                  		foreach($block as $item) :
                  	?>
                    	<li><?php echo $item['row'] ?></li>
                  		
                  	<?php endforeach; endif; ?>
                  </ul>
                  <div class="date"> <?php the_field("date"); ?></div>
                </div>
              </div>
              <div class="banner__image">
                <img src=" <?php the_field("image"); ?>" alt="">
              </div>
            </div>
      			<?php if (get_field('shablon')) : ?>
      				<?php construct_template(get_field('shablon')); ?>
      			<?php endif; ?>

            <div class="work__block work__block--full">
              <a href=" <?php the_field("footer_link"); ?>" style="background: <?php the_field("footer_link_background"); ?>; color: <?php the_field("footer_link_color"); ?>; " class="btn btn-link-arrow" onmouseover="this.style.background ='<?php the_field("footer_link_background_hover"); ?>';" onmouseout="this.style.background='<?php the_field("footer_link_background"); ?>';">
                <span class="btn__text"> Перейти на сайт </span>
                <span class="arrow"></span>
              </a>
            </div>
            <div class="work__block work__block--footer" style="background-image: url('<?php the_field("footer_background"); ?>');">
              <div class="finishBox" style="color: <?php the_field('footer_color') ?>;">
                <div class="container">
                  <div class="finishBox__head">
                    <div class="finishBox__title" style="color: <?php the_field("footer_title_color"); ?>;"><?php the_field("footer_title"); ?></div>
                    <div class="finishBox__subtitle"> <?php the_field("footer_subtitle"); ?></div>
                  </div>
                  <div class="finishBox__body">
                    <div class="creators">
                    	<?php 
                    	$block = get_field("footer_team");
                    	if ($block):
                    		foreach($block as $item) :
                    	?>
	                      <div class="creators__item">
	                        <div class="creators__title"><?php echo $item['position'] ?></div>
	                        <div class="creators__subtitle"><?php echo $item['name'] ?></div>
	                      </div>
                    	<?php endforeach; endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
      </div>
    </footer>
    <?php get_template_part( 'template-parts/widjet' ) ?>
	  <?php get_template_part( 'template-parts/cookie' ) ?>

    <!-- END content -->
    <?php wp_footer(); ?>
    <!-- BEGIN scripts -->
    <script src="<?php echo get_template_directory_uri() ?>/js/app.js"></script>
    <!-- END scripts -->
  </body>

</html>
