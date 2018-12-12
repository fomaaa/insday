<!doctype html>
<html>

  <head>
    <meta charset="utf-8" />
    <title><?php the_title() ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#fff" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="shortcut icon" type="image/ico" href="<?php echo get_template_directory_uri() ?>/img/favicon.ico" />
    <?php wp_head(); ?>
  </head>

  <body class="is-show-cookie">
    <div class="preloader">
      <div class="line-scale-party">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- BEGIN content -->
    <header class="header">
      <div class="container-fluid header__inner">
        <div class="header__logo logo">
          <a href="/">
            <span class="hidden-mobile">
              <svg width="400" height="22" viewBox="0 0 400 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M148 9.00001V0L159.776 10.2542C159.776 10.2542 159.797 1.16134 159.776 1.11865C159.797 1.16134 165 1.11865 165 1.11865V22L153.224 11.839V20.8814H148V13L7.64152 13V16.2H10V20H0V16.2H2.35848V4.79999H0V1H10V4.79999H7.64152V9L148 9.00001ZM393.876 1L390.24 5.97619L386.124 1H380L387.369 10.1381V16.2H384.88V20H395.12V16.2H392.633V10.1381L400 1H393.876ZM206 18.8125L209.065 14.875C210.763 16.2554 213.051 17.5196 216.113 17.5C218.016 17.5196 219.406 16.8185 219.382 15.8125C219.39 14.6452 217.521 14.2981 215.216 13.8701C211.52 13.1836 206.703 12.2891 206.715 7.46875C206.695 4.04774 209.839 1 215.5 1C219.042 1 222.121 1.97533 224.489 3.8125L221.425 7.56251C219.54 6.12391 217.089 5.48029 214.887 5.5C213.249 5.48029 212.322 6.08993 212.333 6.90625C212.33 8.02515 214.196 8.39375 216.497 8.84818C220.189 9.57752 225 10.5279 225 15.1563C225 19.2874 221.723 22 215.806 22C211.33 22 208.217 20.7199 206 18.8125ZM279.196 10.3169C279.196 12.6337 277.63 15.0216 274.496 15.0216H271.497V5.52163H274.496C277.541 5.52163 279.196 7.88378 279.196 10.3169ZM284.998 10.319C284.995 5.72968 281.423 1 274.599 1H266V20H274.599C281.545 20 285.087 15.1889 284.998 10.319ZM334.689 13.9904L332.685 10.2239L330.538 13.9904H334.689ZM336.695 17.7569L337.888 20H343L332.685 0L322 20H327.11L328.389 17.7569H336.695Z" fill="url(#paint0_linear)" />
                <defs>
                  <linearGradient id="paint0_linear" x1="-4.93548" y1="11.7333" x2="444.194" y2="11.7333" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0DD9EE" />
                    <stop offset="1" stop-color="#6100FF" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
            <span class="hidden-desktop">
              <svg width="40" height="13" viewBox="0 0 40 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0V2.59961H1.88672V10.4004H0V13H8V10.4004H6.11328V8H30.5264V10.4004H28.6602V13H36.3398V10.4004H34.4746V6.25195L40 0H35.4062L32.6797 3.4043L29.5938 0H25L29.4199 5H6.11328V2.59961H8V0H0Z" fill="url(#paint0_linear1)" />
                <defs>
                  <linearGradient id="paint0_linear1" x1="-0.483871" y1="6.93329" x2="43.5484" y2="6.93329" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#0DD9EE" />
                    <stop offset="1" stop-color="#6100FF" />
                  </linearGradient>
                </defs>
              </svg>
            </span>
          </a>
        </div>
        <div class="header__right">
          <ul class="headerLinks">
            <li class="headerLinks__item">
              <a href="#callback" class="js-anchor-link">контакты</a>
            </li>
          </ul>
          <ul class="lang">
            <li>
              <a href="#">En</a>
            </li>
          </ul>
        </div>
        <div class="header__burger hidden-desktop">
          <button class="btn btn-burger">
            <span class="bar"></span>
            <span class="bar"></span>
          </button>
        </div>
      </div>
      <div class="menuBox">
        <div class="container-fluid">
        <?php 
          global $wp;  
          $current_url = home_url(add_query_arg(array(),$wp->request)) . '/';
         ?>
        <nav class="nav">
          <ul class="menu">
            <?php 
            $block = get_field("menu", 'option');
            if ($block):
              foreach($block as $key => $item) :
                 $link = get_the_permalink($item['page'][0]->ID);
            ?>
              <li class="<?php if($current_url == $link) echo 'is-active'; ?>">
                <a href="<?php echo $link ?>"><?php echo $item['name'] ?></a>
              </li>
            <?php endforeach; endif; ?>
            <li><a href="#callback">Контакты</a></li>
          </ul>
        </nav>

          <div class="callback__contacts">
            <div class="phone">
              <a href="tel:<?php the_field("c_phone", 'option'); ?>"><?php the_field("c_phone", 'option'); ?></a>
            </div>
            <div class="mail">
              <a href="mailto:<?php the_field("c_email", 'option'); ?>"><?php the_field("c_email", 'option'); ?></a>
            </div>
            <ul class="socials">
              <li class="socials__item">
                <a href="<?php the_field("c_behance", 'option'); ?>" target="_blank">Behance</a>
              </li>
              <li class="socials__item">
                <a href="<?php the_field("c_instagram", 'option'); ?>" target="_blank">instagram</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <div class="page__column page__column--left">
      <?php get_template_part( 'template-parts/nav-menu' ) ?>
    </div>