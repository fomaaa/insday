<?php 
/* Template Name: О нас */
  get_header(); 
?>

    <div class="js-scrollbar">
      <div class="out">
        <div id="page-wrapper">
          <div class="page page--about">
            <div class="content">
              <div class="section section--about">
                <div class="container section__inner">
                  <div class="about">
                    <div class="about__title js-animate" data-animation="fadeInUp">  <?php the_title(); ?> </div>
                    <div class="about__photo js-animate" data-animation="fadeIn" style="background-image: url('<?php the_field('f_background') ?>');"></div>
                    <div class="about__text js-animate" data-animation="fadeInUp">
                      <?php the_field("f_text"); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="section section--steps">
                <div class="container section__inner">
                  <div class="section__title js-animate" data-animation="fadeInUp"> <?php the_field("steps_title"); ?></div>
                  <div class="stepsList">
                    <?php 
                    $block = get_field("steps");
                    if ($block):
                      foreach($block as $item) :
                    ?>
                      <div class="stepsList__item js-accordion js-animate" data-animation="fadeInUp">
                        <div class="steps__head js-accordion-head"> <?php echo $item['title'] ?> </div>
                        <div class="steps__body js-accordion-body">
                          <ul>
                          <?php 
                            $steps = $item['step'];
                            if ($steps):
                              foreach($steps as $step) :
                            ?>
                              <li>
                                <h5> <?php echo $step['title'] ?></h5>
                                <p> <?php echo $step['text'] ?></p>
                              </li>
                          <?php endforeach; endif; ?>
                          </ul>
                        </div>
                      </div>
                    <?php endforeach; endif; ?>
                  </div>
                </div>
              </div>
              <div class="section section--principles">
                <div class="container section__inner js-animate" data-animation="fadeInUp">
                  <div class="section__title">  <?php the_field("text_title"); ?> </div>
                  <div class="principles">
                    <div class="principles__left">
                      <article>
                        <?php the_field("text_block"); ?>
                      </article>
                    </div>
                    <div class="principles__right"></div>
                  </div>
                </div>
              </div>
<?php get_footer(); ?>