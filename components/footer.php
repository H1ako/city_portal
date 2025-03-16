<?php

use app\models\Stat;

?>

<footer class="footer">
    <div class="footer__top">
        <?php include('components/logo.php'); ?>
        <nav class="top__nav">
            <ul>
                <li>
                    <a href="<?= Router::getRoute('/') ?>">Главная</a>
                </li>
                <li>
                    <a href="<?= Router::getRoute('/news') ?>">Новости</a>
                </li>
            </ul>
        </nav>
        <ul class="top__socials">
            <li class="socials__item">
                <button class="item__wrapper">
                    <?php include_once('icons/discord.php'); ?>
                </button>
            </li>
        </ul>
    </div>
    <div class="footer__bottom">
        <h5 class="bottom__rights">Copyright © 2025 All Rights Reserved</h5>
        <h5 class="bottom__rights">Посещений сайта: <?= Stat::get_value_by_key('visits_count'); ?></h5>
    </div>
</footer>
<?php include_once('components/loading-screen.php'); ?>