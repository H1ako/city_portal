<?php

use app\models\Request;
use app\models\Session;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Городской портал|Профиль</title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= Router::getAssets('/styles/css/profile.css') ?>" />
  <script src="<?= Router::getAssets('/scripts/index.js') ?>" defer></script>
</head>

<body>
  <?php include_once('components/header.php'); ?>
  <main class="main-content">
    <section class="main-content__hero">
      <div class="content">
        <div class="content__left">
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
          </div>
        </div>
      </div>
    </section>
    <section class="main-content__news">
      <h2 class="news__bg-title">ПРОФИЛЬ</h2>
      <div class="content">
        <h2 class="content__main-title">Профиль</h2>
        <form id="settings-form" class="content__settings-form">
          <input value="<?= Session::user()->first_name ?>" name="first_name" placeholder="Имя" type="text" class="settings-form__field" />
          <input value="<?= Session::user()->last_name ?>" name="last_name" placeholder="Фамилия" type="text" class="settings-form__field" />
          <input value="<?= Session::user()->email ?>" name="email" placeholder="Email" type="email" class="settings-form__field" />
          <input name="password" placeholder="Пароль" type="password" class="settings-form__field" />
          <button type="submit" class="settings-form__submit">Сохранить</button>
        </form>
      </div>
    </section>
  </main>
  <?php include_once('components/footer.php'); ?>
  <?php include_once('components/new-request-modal.php'); ?>
  <?php include_once('components/auth-modal.php'); ?>
</body>

</html>