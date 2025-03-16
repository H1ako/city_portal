<?php

use app\models\RequestCategory;
use app\models\Session;

$categories = RequestCategory::all();
?>
<dialog class="new-request-modal" id="new-request-modal">
    <h2 class="new-request-modal__title">Новая заявка</h2>
    <div class="new-request-modal__content">
        <form class="content__form" id="new-request-form">
            <?php Session::set_csrf() ?>
            <div class="form__left">
                <div class="left__image-field">
                    <img src="" alt="Фото заявки*" class="image-field__image" id="new-request-image" />
                    <label type="button" class="image-field__button">
                        <input required type="file" name="image" style="display: none" onchange="
                            const file = this.files[0];
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('new-request-image').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        "/>
                        <span>Выбрать</span>
                    </label>
                </div>
            </div>
            <div class="form__right">
                <input name="title" placeholder="Заголовок*" required type="text" class="right__field" />
                <textarea
                    required
                    name="description"
                    placeholder="Описание*"
                    class="right__field field_description"></textarea>
                <div class="right__category">
                    <select required name="category" class="category__field" id="new-request-category">
                        <option value="">Не выбрано*</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->title ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" class="category__delete-btn" onclick="
                        const select = document.getElementById('new-request-category');
                        select.value = '';
                    ">
                        Удалить
                    </button>
                </div>
                <button type="submit" class="right__submit">Оставить заявку</button>
            </div>
        </form>
    </div>
</dialog>