              <div class="section section--callback js-animate"  data-animation="fadeInUp" id="callback">
                <div class="container section__inner">
                  <div class="callback">
                    <div class="callback__left">
                      <div class="section__title-sm"><?php the_field("c_title", 'option'); ?></div>
                      <div class="callback__contacts">
                        <div class="phone">
                          <a href="tel:<?php the_field("c_phone", 'option'); ?>"><?php the_field("c_phone", 'option'); ?></a>
                        </div>
                        <div class="mail">
                          <a href="mailto:hello@insday.ru"><?php the_field("c_email", 'option'); ?></a>
                        </div>
                        <ul class="socials">
                          <li class="socials__item">
                            <a href=" <?php the_field("c_behance", 'option'); ?>" target="_blank" class="behance">Behance</a>
                          </li>
                          <li class="socials__item">
                            <a href=" <?php the_field("c_instagram", 'option'); ?>" target="_blank" class="instagram">
                              <span class="state-1">instagram</span>
                              <span class="state-2">instagram</span>
                            </a>
                          </li>
                        </ul>
                        <div class="callback__brief">
                          <a href="#" target="_blank">
                            <span>Заполнить бриф на разработку сайта</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="callback__right">
                      <?php echo do_shortcode('[contact-form-7 id="19" title="Главная форма" html_class="form form--callback"]') ?>
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
