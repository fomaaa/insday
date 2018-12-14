<?php 
/* Template Name: Главная странциа */
  get_header(); 
?>

    <div class="js-scrollbar">
      <div class="out">
        <div id="page-wrapper">
          <div class="page page--main">
            <div class="content">
              <div class="section section--banner">
                <div class="container section__inner">
                  <div class="banner">
                    <div class="banner__inner">
                      <div class="banner__title js-animate" data-animation="fadeInUp">  <?php the_field("title"); ?> </div>
                      <div class="case hidden-desktop js-animate" data-animation="fadeInUp">
                        <a href="<?php the_field("case_link"); ?>" class="case__link"></a>
                        <div class="case__preview">
                          <div class="case__photo" style="background-image: url('<?php the_field("case_img"); ?>');"></div>
                          <div class="case__action" style=""></div>
                        </div>
                        <div class="case__descr"> <?php the_field("case_name"); ?></div>
                      </div>
                      <div class="banner__subtitle js-animate" data-animation="fadeInUp">  <?php the_field("subtitle"); ?> </div>
                      <div class="banner__bottom js-animate" data-animation="fadeInUp">
                        <a href="#callback" class="btn btn-link-arrow js-anchor-link">
                          <span class="btn__text">  <?php the_field("btn_text"); ?> </span>
                          <span class="arrow"></span>
                        </a>
                      </div>
                      <div class="banner__decor" style="background-image: url('<?php the_field("background"); ?>');"></div>
                    </div>
                    <div class="case hidden-mobile js-animate" data-animation="fadeInUp">
                      <a href="<?php the_field("case_link"); ?>" class="case__link"></a>
                      <div class="case__preview">
                        <div class="case__photo" style="background-image: url('<?php the_field('case_img') ?>');"></div>
                        <div class="case__action"></div>
                      </div>
                      <div class="case__descr"> <?php the_field("case_name"); ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="section section--article section--gray">
                <div class="container section__inner">
                  <div class="article js-animate" data-animation="fadeInUp">
                    <div class="article__left">
                      <div class="section__title">Новая статья</div>
                      <a href="/blog" class="btn btn-text">Все статьи</a>
                    </div>
                    <div class="article__right">
                      <div class="card card--article">
                        <a href="#" class="card__title">
                          <span> <?php the_field("article_name"); ?></span>
                        </a>
                        <div class="card__text"><?php the_field("article_desc"); ?></div>
                        <a href="<?php the_field("article_link"); ?>" class="card__photo" style="background-image: url('<?php the_field("article_image"); ?>');"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="section section--aboutPreview section--gray">
                <div class="container section__inner">
                  <div class="aboutPreview">
                    <div class="section__title js-animate" data-animation="fadeInUp"> <?php the_field("w_title"); ?></div>
                    <div class="section__text js-animate" data-animation="fadeInUp">  <?php the_field("w_text"); ?></div>
                    <ul class="servicesList js-animate" data-animation="fadeInUp">
                      <li class="servicesList__item">
                        <div class="servicesList__title">Web</div>
                        <ul class="servicesList__links">
                          <li>
                            <a style="cursor: pointer;">Дизайн интерфейса</a>
                          </li>
                          <li>
                            <a style="cursor: pointer;">Front-end/Back-end</a>
                          </li>
                          <li>
                            <a style="cursor: pointer;">Техподдержка</a>
                          </li>
                        </ul>
                      </li>
                      <li class="servicesList__item">
                        <div class="servicesList__title">Graphic</div>
                        <ul class="servicesList__links">
                          <li>
                            <a style="cursor: pointer;">Иллюстрации</a>
                          </li>
                          <li>
                            <a style="cursor: pointer;">3D визуализации</a>
                          </li>
                        </ul>
                      </li>
                      <li class="servicesList__item">
                        <div class="servicesList__title">Branding</div>
                        <ul class="servicesList__links">
                          <li>
                            <a style="cursor: pointer;">Айдентика</a>
                          </li>
                          <li>
                            <a style="cursor: pointer;">Нейминг</a>
                          </li>
                          <li>
                            <a style="cursor: pointer;">Логотипы</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="section section--start">
                <div class="container section__inner">
                  <div class="section__left">
                    <div class="section__title js-title-animate js-animate" data-animation="fadeInUp"> <?php the_field("i_title"); ?> <div class="animated-words">
                    <?php 
                      $block = get_field("changed_text");
                      if ($block):
                        foreach($block as $item) :
                      ?>
                        <span><?php echo $item['item'] ?></span>
                    <?php endforeach; endif; ?>
                      </div>
                    </div>
                    <div class="section__text js-animate" data-animation="fadeInUp">
                      <article>
                        <?php the_field("i_text"); ?>
                      </article>
                    </div>
                  </div>
                  <div class="section__right js-animate" data-animation="fadeInUp">
                    <img src=" <?php the_field("i_background"); ?>" alt="">
                  </div>
                </div>
              </div>
              <div class="section section--blockqoute section--gray">
                <div class="container section__inner js-animate" data-animation="fadeInUp">
                  <div class="section__title-sm color-primary"> <?php the_field("l_title"); ?> </div>
                  <div class="section__description"> <?php the_field("l_text"); ?></div>
                </div>
              </div>

<?php get_footer(); ?>