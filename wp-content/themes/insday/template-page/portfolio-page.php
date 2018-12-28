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
                  <div class="portfolio js-animate tabs" data-animation="fadeInUp" data-action="load_items" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
                    <nav class="portfolio__nav">
                      <ul class="tabsList">
                        <li>
                          <a href="#" class="tab1 is-active">все</a>
                        </li>
                        <li>
                          <a href="#" class="tab2">web</a>
                        </li>
                        <li>
                          <a href="#" class="tab3">graphic</a>
                        </li>
                        <li>
                          <a href="#" class="tab4">branding</a>
                        </li>
                      </ul>
                    </nav>
                    <div class="tabsBox">
                       <div class="tabs__con tabs__con_tab1 is-active">
                          <div class="portfolio__grid">
                          	<?php 
                          	$rows = get_field("portfolio_all");
                          	
                          	if ($rows):
                          		foreach($rows as $row) :
                          	?>
                							<div class="portfolio__row">
                							<?php 
                								if (!empty($row['row'])) :
                									foreach($row['row'] as $item) :
                								?>
                			            <div class="card card--work <?php echo $item['size'] ?> <?php echo $item['offset'] ?>  is-unloaded " data-id="<?php echo $item['work'] ?>">
                			                <div class="card__inner">
                			                </div>
                			            </div>
                								<?php endforeach; endif; ?>
                							</div> 
                          	<?php endforeach; endif; ?>
                          </div>
                      </div>
                      <div class="tabs__con tabs__con_tab2">
                          <div class="portfolio__grid">
                            <?php 
                            $rows = get_field("portfolio_web");
                            
                            if ($rows):
                              foreach($rows as $row) :
                            ?>
                              <div class="portfolio__row">
                              <?php 
                                if (!empty($row['row'])) :
                                  foreach($row['row'] as $item) :
                                ?>
                                              <div class="card card--work <?php echo $item['size'] ?> <?php echo $item['offset'] ?>  is-unloaded " data-id="<?php echo $item['work'] ?>">
                                                <div class="card__inner">
                                                </div>
                                              </div>
                                <?php endforeach; endif; ?>
                              </div> 
                            <?php endforeach; endif; ?>
                          </div>
                      </div>
                      <div class="tabs__con tabs__con_tab3">
                          <div class="portfolio__grid">
                            <?php 
                            $rows = get_field("portfolio_graphic");
                            
                            if ($rows):
                              foreach($rows as $row) :
                            ?>
                              <div class="portfolio__row">
                              <?php 
                                if (!empty($row['row'])) :
                                  foreach($row['row'] as $item) :
                                ?>
                                              <div class="card card--work <?php echo $item['size'] ?> <?php echo $item['offset'] ?>  is-unloaded " data-id="<?php echo $item['work'] ?>">
                                                <div class="card__inner">
                                                </div>
                                              </div>
                                <?php endforeach; endif; ?>
                              </div> 
                            <?php endforeach; endif; ?>
                          </div>
                      </div>
                      <div class="tabs__con tabs__con_tab4">
                          <div class="portfolio__grid">
                            <?php 
                            $rows = get_field("portfolio_branding");
                            
                            if ($rows):
                              foreach($rows as $row) :
                            ?>
                              <div class="portfolio__row">
                              <?php 
                                if (!empty($row['row'])) :
                                  foreach($row['row'] as $item) :
                                ?>
                                              <div class="card card--work <?php echo $item['size'] ?> <?php echo $item['offset'] ?>  is-unloaded " data-id="<?php echo $item['work'] ?>">
                                                <div class="card__inner">
                                                </div>
                                              </div>
                                <?php endforeach; endif; ?>
                              </div> 
                            <?php endforeach; endif; ?>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<?php get_footer(); ?>