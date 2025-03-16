<?php

use app\models\Session;

?>
<dialog class="edit-request-modal" id="edit-request-modal">
    <div class="edit-request-modal__content">
        <h2 class="edit-request-modal__title">Обработка заявки</h2>
        <div class="edit-request-modal__content">
            <form class="content__form" id="edit-request-form">
                <?php Session::set_csrf() ?>
                <select status-field name="status" class="form__status">
                    <option value="new">Новая</option>
                    <option value="in_progress">В решении</option>
                    <option value="done">Решено</option>
                    <option value="rejected">Отменено</option>
                </select>
                <input response-field name="response" placeholder="Решение" type="text" class="form__field" />
                <div class="form__image-field">
                    <img response-image-field src="" id="response-image" alt="Фото заявки" class="image-field__image" />
                    <label class="image-field__button">
                        <input type="file" name="response_image" style="display: none" onchange="
                            const file = this.files[0];
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('response-image').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        "/>
                        <span>Выбрать</span>
                    </label>
                </div>
                <button type="submit" class="form__submit">Отправить</button>
            </form>
        </div>
    </div>
</dialog>