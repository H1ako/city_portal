<?php

use app\models\RequestCategory;

$requestCategories = RequestCategory::all();
?>

<dialog id="edit-categories-modal" class="edit-categories-modal">
    <div class="edit-categories-modal__content">
        <h3 class="edit-categories-modal__title">Управление категорями</h3>
        <ul class="edit-categories-modal__categories">
            <?php foreach ($requestCategories as $category) : ?>
                <li>
                    <span><?= $category->title ?></span>
                    <button type="button" delete-category="<?= $category->id ?>">Удалить</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <button class="edit-categories-modal__new" new-category>Новая</button>
    </div>
</dialog>