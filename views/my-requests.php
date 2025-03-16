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
            <button class="left__action-btn">Оставить заявку</button>
          </div>
          <div class="content__right">
            <div class="right__requests-counter">
              <ul class="requests-counter__num-tabs">
                <li class="num-tabs__item">
                  <div class="delimeter"></div>
                  <span>1</span>
                </li>
                <li class="num-tabs__item">
                  <div class="delimeter"></div>
                  <span>2</span>
                </li>
                <li class="num-tabs__item">
                  <div class="delimeter"></div>
                  <span>3</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="main-content__news">
        <h2 class="news__bg-title">Мои заявки</h2>
        <div class="content">
          <h2 class="content__main-title">Мои заявки</h2>
          <ul class="content__list">
            <li class="list__item">
              <img src="news.png" alt="" class="item__img" />
              <div class="item__wrapper">
                <ul class="wrapper__tags">
                  <li class="tags__item">Общество</li>
                  <li class="tags__item">Погода</li>
                </ul>
                <h3 class="wrapper__title">
                  Февраль в Москве будет на 3–4 градуса теплее нормы
                </h3>

                <div class="wrapper__secondary-actions">
                  <button class="secondary-actions__more">Подробнее</button>
                  <time class="secondary-actions__date">12 января 2024</time>
                </div>
                <div class="wrapper__actions">
                  <button delete-request class="actions__delete">Удалить</button>
                  <span class="actions__status" data-status="solved"
                    >Решено</span
                  >
                </div>
              </div>
            </li>
            <li class="list__item">
              <img src="news.png" alt="" class="item__img" />
              <div class="item__wrapper">
                <ul class="wrapper__tags">
                  <li class="tags__item">Общество</li>
                  <li class="tags__item">Погода</li>
                </ul>
                <h3 class="wrapper__title">
                  Февраль в Москве будет на 3–4 градуса теплее нормы
                </h3>

                <div class="wrapper__secondary-actions">
                  <button class="secondary-actions__more">Подробнее</button>
                  <time class="secondary-actions__date">12 января 2024</time>
                </div>
                <div class="wrapper__actions">
                  <button delete-request class="actions__delete">Удалить</button>
                  <span class="actions__status" data-status="rejected"
                    >Отклонено</span
                  >
                </div>
              </div>
            </li>
            <li class="list__item">
              <img src="news.png" alt="" class="item__img" />
              <div class="item__wrapper">
                <ul class="wrapper__tags">
                  <li class="tags__item">Общество</li>
                  <li class="tags__item">Погода</li>
                </ul>
                <h3 class="wrapper__title">
                  Февраль в Москве будет на 3–4 градуса теплее нормы
                </h3>

                <div class="wrapper__secondary-actions">
                  <button class="secondary-actions__more">Подробнее</button>
                  <time class="secondary-actions__date">12 января 2024</time>
                </div>
                <div class="wrapper__actions">
                  <button delete-request class="actions__delete">Удалить</button>
                  <span class="actions__status" data-status="waiting"
                    >На рассмотрении</span
                  >
                </div>
              </div>
            </li>
          </ul>
          <button class="news__all-btn" open-new-requests>Новая заявка</button>
        </div>
      </section>
    </main>
    <?php include_once('components/footer.php'); ?>
    <?php include_once('components/auth-modal.php'); ?>
    <?php include_once('components/new-request-modal.php'); ?>
    <?php include_once('components/delete-request-confirm-modal.php'); ?>
  </body>
</html>
