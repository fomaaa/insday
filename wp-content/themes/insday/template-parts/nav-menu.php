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
              <a href="<?php echo $link ?>"><?php echo $item['name'] ?> <span class="line"></span></a>
            </li>
            
          <?php endforeach; endif; ?>
        </ul>
      </nav>
