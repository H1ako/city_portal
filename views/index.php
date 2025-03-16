<?php

use app\models\Request;
use app\models\Session;

global $SITE_URL, $session;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Городской портал</title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= Router::getAssets('/styles/css/index.css') ?>" />
  <script src="<?= Router::getAssets('/scripts/index.js') ?>" defer></script>
</head>

<body>
  <?php include_once('components/header.php'); ?>

  <main class="main-content">
    <section class="main-content__hero">
      <div class="content">
        <div class="content__left">
          <h1 class="left__title">
            Ваш <b>город</b>, ваш <b>голос</b> - Создаем Лучшее Вместе
          </h1>
          <p class="left__subtitle">
            Делитесь своими идеями и проблемами – давайте совместно создадим
            город, о котором мечтаем
          </p>
          <?php if (Session::check()): ?>
            <button class="left__action-btn" open-new-requests>Оставить заявку</button>
          <?php else: ?>
            <button class="left__action-btn" open-auth-modal>Оставить заявку</button>
          <?php endif; ?>
        </div>
        <div class="content__right">
          <div class="right__requests-counter">
            <ul class="requests-counter__num-tabs">
              <?php 
              $requestsAmount = Request::where('status', '=', 'done')->count();
              $stringAmount = (string)$requestsAmount;
              for ($i = 0; $i < strlen($stringAmount); $i++): ?>
              <li class="num-tabs__item">
                <div class="delimeter"></div>
                <span><?= $stringAmount[$i] ?></span>
              </li>
              <?php endfor; ?>
            </ul>
            <div class="requests-counter__description">
              проблемы уже было решено
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="main-content__news">
      <h2 class="news__bg-title">Новости</h2>
      <div class="content">
        <h2 class="content__main-title">Новости</h2>
        <ul class="content__list">
          <li class="list__item">
            <img src="<?= Router::getAssets('/images/news.png') ?>" alt="" class="item__img" />
            <div class="item__wrapper">
              <ul class="wrapper__tags">
                <li class="tags__item">Общество</li>
                <li class="tags__item">Погода</li>
              </ul>
              <h3 class="wrapper__title">
                Февраль в Москве будет на 3–4 градуса теплее нормы
              </h3>

              <div class="wrapper__actions">
                <button class="actions__more">Подробнее</button>
                <time class="actions__date">12 января 2024</time>
              </div>
            </div>
          </li>
          <li class="list__item">
            <img src="<?= Router::getAssets('/images/news.png') ?>" alt="" class="item__img" />
            <div class="item__wrapper">
              <ul class="wrapper__tags">
                <li class="tags__item">Общество</li>
                <li class="tags__item">Погода</li>
              </ul>
              <h3 class="wrapper__title">
                Февраль в Москве будет на 3–4 градуса теплее нормы
              </h3>

              <div class="wrapper__actions">
                <button class="actions__more">Подробнее</button>
                <time class="actions__date">12 января 2024</time>
              </div>
            </div>
          </li>
          <li class="list__item">
            <img src="<?= Router::getAssets('/images/news.png') ?>" alt="" class="item__img" />
            <div class="item__wrapper">
              <ul class="wrapper__tags">
                <li class="tags__item">Общество</li>
                <li class="tags__item">Погода</li>
              </ul>
              <h3 class="wrapper__title">
                Февраль в Москве будет на 3–4 градуса теплее нормы
              </h3>

              <div class="wrapper__actions">
                <button class="actions__more">Подробнее</button>
                <time class="actions__date">12 января 2024</time>
              </div>
            </div>
          </li>
          <li class="list__item">
            <img src="<?= Router::getAssets('/images/news.png') ?>" alt="" class="item__img" />
            <div class="item__wrapper">
              <ul class="wrapper__tags">
                <li class="tags__item">Общество</li>
                <li class="tags__item">Погода</li>
              </ul>
              <h3 class="wrapper__title">
                Февраль в Москве будет на 3–4 градуса теплее нормы
              </h3>

              <div class="wrapper__actions">
                <button class="actions__more">Подробнее</button>
                <time class="actions__date">12 января 2024</time>
              </div>
            </div>
          </li>
          <li class="list__item">
            <img src="<?= Router::getAssets('/images/news.png') ?>" alt="" class="item__img" />
            <div class="item__wrapper">
              <ul class="wrapper__tags">
                <li class="tags__item">Общество</li>
                <li class="tags__item">Погода</li>
              </ul>
              <h3 class="wrapper__title">
                Февраль в Москве будет на 3–4 градуса теплее нормы
              </h3>

              <div class="wrapper__actions">
                <button class="actions__more">Подробнее</button>
                <time class="actions__date">12 января 2024</time>
              </div>
            </div>
          </li>
        </ul>
        <button class="news__all-btn">Все новости</button>
      </div>
    </section>
  </main>
  <?php include_once('components/footer.php'); ?>
  <?php include_once('components/auth-modal.php'); ?>
  <?php include_once('components/new-request-modal.php'); ?>
</body>

</html>