<?php if (empty($_COOKIE['accept'])) : ?>   
    <div class="cookie">
      <div class="cookie__title"> Этот сайт использует cookies: посмотрите нашу <a href="#" target="_blank">политику приватности</a>
      </div>
      <div class="cookie__button">
        <a href="#" onclick="document.cookie = 'accept=true; path=/;';" class="btn btn-primary">Ок, спасибо</a>
      </div>
    </div>
<?php endif; ?>
