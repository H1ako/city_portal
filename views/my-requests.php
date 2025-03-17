<?php

use app\models\Request;
use app\models\Session;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Городской портал</title>
  <?php include_once('components/base-head.php'); ?>
  <link rel="stylesheet" href="<?= Router::getAssets('/styles/css/my-requests.css') ?>" />
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
      <h2 class="news__bg-title">Мои заявки</h2>
      <div class="content">
        <h2 class="content__main-title">Мои заявки</h2>
        <?php if (Session::check()): ?>
          <?php if (Session::user()->requests->count() > 0): ?>
            <ul class="content__list">
              <?php foreach (Session::user()->requests as $request) : ?>
                <?php if ($request->status === 'done') : ?>
                  <li class="list__item">
                    <img src="<?= Router::getRoute($request->image) ?>" alt="" class="item__img" />
                    <div class="item__wrapper">
                      <ul class="wrapper__tags">
                        <li class="tags__item"><?= $request->category ? $request->category->title : '' ?></li>
                      </ul>
                      <h3 class="wrapper__title">
                        <?= $request->title ?>
                      </h3>
                      <div class="wrapper__actions">
                        <span class="actions__status" data-status="solved">Решено</span>
                      </div>
                      <div class="wrapper__secondary-actions">
                        <button class="secondary-actions__more">Подробнее</button>
                        <time class="secondary-actions__date"><?= $request->created_at_formatted ?></time>
                      </div>
                    </div>
                  </li>
                <?php elseif ($request->status === 'rejected') : ?>
                  <li class="list__item">
                    <img src="<?= Router::getRoute($request->image) ?>" alt="" class="item__img" />
                    <div class="item__wrapper">
                      <ul class="wrapper__tags">
                        <li class="tags__item"><?= $request->category ? $request->category->title : '' ?></li>
                      </ul>
                      <h3 class="wrapper__title">
                        <?= $request->title ?>
                      </h3>
                      <div class="wrapper__actions">
                        <span class="actions__status" data-status="rejected">Отклонено</span>
                      </div>
                      <div class="wrapper__secondary-actions">
                        <button class="secondary-actions__more">Подробнее</button>
                        <time class="secondary-actions__date"><?= $request->created_at_formatted ?></time>
                      </div>
                    </div>
                  </li>
                <?php else : ?>
                  <li class="list__item">
                    <img src="<?= Router::getRoute($request->image) ?>" alt="image" class="item__img" />
                    <div class="item__wrapper">
                      <ul class="wrapper__tags">
                        <li class="tags__item"><?= $request->category ? $request->category->title : '' ?></li>
                      </ul>
                      <h3 class="wrapper__title">
                        <?= $request->title ?>
                      </h3>
                      <div class="wrapper__actions">
                        <span class="actions__status" data-status="waiting">На рассмотрении</span>
                      </div>
                      <div class="wrapper__secondary-actions">
                        <button class="secondary-actions__more">Подробнее</button>
                        <time class="secondary-actions__date"><?= $request->created_at_formatted ?></time>
                      </div>
                    </div>
                  </li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p class="content__empty">У вас нет заявок</p>
          <?php endif; ?>
          <button class="news__all-btn" open-new-requests>Новая заявка</button>
        <?php else: ?>
          <p class="content__empty">Авторизуйтесь, чтобы видеть свои заявки</p>
        <?php endif; ?>
      </div>
    </section>
  </main>
  <?php include_once('components/footer.php'); ?>
  <?php include_once('components/new-request-modal.php'); ?>
  <?php include_once('components/auth-modal.php'); ?>
</body>

</html>