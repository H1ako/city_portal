<?php

use app\models\Request;
use app\models\Session;

$requests = Request::all();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Городской портал</title>
    <?php include_once('components/base-head.php'); ?>
    <link rel="stylesheet" href="<?= Router::getAssets('/styles/css/my-requests-control.css') ?>" />
    <script src="<?= Router::getAssets('/scripts/index.js') ?>" defer></script>
  </head>
  <body>
    <?php include_once('components/header.php'); ?>
    <main class="main-content">
      <section class="main-content__hero">
        <div class="content">
          <div class="content__left">
            <h2>Панель администратора</h2>
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
        <h2 class="news__bg-title">Управеление заявками</h2>
        <div class="content">
          <div class="content__top">
            <h2 class="top__main-title">Управеление заявками</h2>
            <button edit-categories>
              <span>Категории</span>
              <svg
                width="40"
                height="40"
                viewBox="0 0 40 40"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0 32.5C0 33.8828 1.11719 35 2.5 35H6.77344C7.73438 37.2109 9.9375 38.75 12.5 38.75C15.0625 38.75 17.2656 37.2109 18.2266 35H37.5C38.8828 35 40 33.8828 40 32.5C40 31.1172 38.8828 30 37.5 30H18.2266C17.2656 27.7891 15.0625 26.25 12.5 26.25C9.9375 26.25 7.73438 27.7891 6.77344 30H2.5C1.11719 30 0 31.1172 0 32.5ZM10 32.5C10 31.837 10.2634 31.2011 10.7322 30.7322C11.2011 30.2634 11.837 30 12.5 30C13.163 30 13.7989 30.2634 14.2678 30.7322C14.7366 31.2011 15 31.837 15 32.5C15 33.163 14.7366 33.7989 14.2678 34.2678C13.7989 34.7366 13.163 35 12.5 35C11.837 35 11.2011 34.7366 10.7322 34.2678C10.2634 33.7989 10 33.163 10 32.5ZM25 20C25 19.337 25.2634 18.7011 25.7322 18.2322C26.2011 17.7634 26.837 17.5 27.5 17.5C28.163 17.5 28.7989 17.7634 29.2678 18.2322C29.7366 18.7011 30 19.337 30 20C30 20.663 29.7366 21.2989 29.2678 21.7678C28.7989 22.2366 28.163 22.5 27.5 22.5C26.837 22.5 26.2011 22.2366 25.7322 21.7678C25.2634 21.2989 25 20.663 25 20ZM27.5 13.75C24.9375 13.75 22.7344 15.2891 21.7734 17.5H2.5C1.11719 17.5 0 18.6172 0 20C0 21.3828 1.11719 22.5 2.5 22.5H21.7734C22.7344 24.7109 24.9375 26.25 27.5 26.25C30.0625 26.25 32.2656 24.7109 33.2266 22.5H37.5C38.8828 22.5 40 21.3828 40 20C40 18.6172 38.8828 17.5 37.5 17.5H33.2266C32.2656 15.2891 30.0625 13.75 27.5 13.75ZM15 10C14.337 10 13.7011 9.73661 13.2322 9.26777C12.7634 8.79893 12.5 8.16304 12.5 7.5C12.5 6.83696 12.7634 6.20107 13.2322 5.73223C13.7011 5.26339 14.337 5 15 5C15.663 5 16.2989 5.26339 16.7678 5.73223C17.2366 6.20107 17.5 6.83696 17.5 7.5C17.5 8.16304 17.2366 8.79893 16.7678 9.26777C16.2989 9.73661 15.663 10 15 10ZM20.7266 5C19.7656 2.78906 17.5625 1.25 15 1.25C12.4375 1.25 10.2344 2.78906 9.27344 5H2.5C1.11719 5 0 6.11719 0 7.5C0 8.88281 1.11719 10 2.5 10H9.27344C10.2344 12.2109 12.4375 13.75 15 13.75C17.5625 13.75 19.7656 12.2109 20.7266 10H37.5C38.8828 10 40 8.88281 40 7.5C40 6.11719 38.8828 5 37.5 5H20.7266Z"
                  fill="currentColor"
                />
              </svg>
            </button>
          </div>
          <ul class="content__list">
            <?php foreach ($requests as $request) : ?>
              <?php if ($request->status === 'done') : ?>
                <li class="list__item">
                  <img src="<?= Router::getRoute($request->image) ?>" alt="" class="item__img" />
                  <div class="item__wrapper">
                    <h3 class="wrapper__title">
                      <?= $request->title ?>
                    </h3>

                    <div class="wrapper__secondary-actions">
                      <button class="secondary-actions__more">Подробнее</button>
                      <time class="secondary-actions__date">12 января 2024</time>
                      <button change-cat class="secondary-actions__cat">
                        <?= $request->category->title ?>
                      </button>
                    </div>
                    <div class="wrapper__actions">
                      <button edit-request class="actions__delete">
                        Редактировать
                      </button>
                      <!-- <button decline-request class="actions__delete">
                        Отклонить
                      </button> -->
                      <span class="actions__status" data-status="solved"
                        >Решено</span
                      >
                    </div>
                  </div>
                </li>
              <?php elseif ($request->status === 'rejected') : ?>
                <li class="list__item">
                  <img src="<?= Router::getRoute($request->image) ?>" alt="" class="item__img" />
                  <div class="item__wrapper">
                    <h3 class="wrapper__title">
                      <?= $request->title ?>
                    </h3>

                    <div class="wrapper__secondary-actions">
                      <button class="secondary-actions__more">Подробнее</button>
                      <time class="secondary-actions__date">12 января 2024</time>
                      <button change-cat class="secondary-actions__cat">
                        <?= $request->category->title ?>
                      </button>
                    </div>
                    <div class="wrapper__actions">
                      <button edit-request class="actions__delete">
                        Редактировать
                      </button>
                      <!-- <button decline-request class="actions__delete">
                        Отклонить
                      </button> -->
                      <span class="actions__status" data-status="rejected"
                        >Отклонено</span
                      >
                    </div>
                  </div>
                </li>
              <?php else : ?>
                <li class="list__item">
                  <img src="<?= Router::getRoute($request->image) ?>" alt="" class="item__img" />
                  <div class="item__wrapper">
                    <h3 class="wrapper__title">
                      <?= $request->title ?>
                    </h3>

                    <div class="wrapper__secondary-actions">
                      <button class="secondary-actions__more">Подробнее</button>
                      <time class="secondary-actions__date">12 января 2024</time>
                      <button change-cat class="secondary-actions__cat">
                        <?= $request->category->title ?>
                      </button>
                    </div>
                    <div class="wrapper__actions">
                      <button edit-request class="actions__delete">
                        Редактировать
                      </button>
                      <!-- <button decline-request class="actions__delete">
                        Отклонить
                      </button> -->
                      <span class="actions__status" data-status="waiting"
                        >На рассмотрении</span
                      >
                    </div>
                  </div>
                </li>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
    </main>
    <?php include_once('components/footer.php'); ?>
    <?php include_once('components/auth-modal.php'); ?>
    <?php include_once('components/new-request-modal.php'); ?>
    <?php include_once('components/delete-request-confirm-modal.php'); ?>
    <?php include_once('components/edit-categories-modal.php'); ?>
    <?php include_once('components/edit-request-modal.php'); ?>
    <?php include_once('components/decline-request-modal.php'); ?>
  </body>
</html>
