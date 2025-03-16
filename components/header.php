<?php

use app\models\Session;

?>

<header class="header">
    <div class="content">
        <?php include('components/logo.php'); ?>
        <?php if (Session::check()) : ?>
            <div class="content__profile">
                <ul class="profile__dropdown">
                    <?php if (Session::user()->is_admin) : ?>
                        <li><a class="dropdown__link" href="<?= Router::getRoute('/admin') ?>">Админка</a></li>
                    <?php endif; ?>
                    <li><a class="dropdown__link" href="<?= Router::getRoute('/profile') ?>">Профиль</a></li>
                    <li><a class="dropdown__link" href="<?= Router::getRoute('/my-requests') ?>">Мои заявки</a></li>
                    <li><button class="dropdown__link link_logout" logout-btn href="<?= Router::getRoute('/api/auth/logout') ?>">Выйти</button></li>
                </ul>
                <button class="profile__preview"><?= Session::user()->full_name ?></button>
            </div>
        <?php else: ?>
            <button class="content__login" open-auth-modal>Вход/Регистрация</button>
        <?php endif; ?>
    </div>
</header>