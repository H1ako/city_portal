<dialog class="new-request-modal" id="new-request-modal">
    <h2 class="new-request-modal__title">Новая заявка</h2>
    <div class="new-request-modal__content">
        <form class="content__form">
            <div class="form__left">
                <div class="left__image-field">
                    <img src="" alt="Фото заявки" class="image-field__image" />
                    <button type="button" class="image-field__button">Выбрать</button>
                </div>
            </div>
            <div class="form__right">
                <input placeholder="Заголовок" type="text" class="right__field" />
                <textarea
                    placeholder="Описание"
                    class="right__field field_description"></textarea>
                <div class="right__category">
                    <select class="category__field">
                        <option value="">cat 1</option>
                        <option value="">cat 2</option>
                        <option value="">cat 3</option>
                        <option value="">cat 4</option>
                    </select>
                    <button type="button" class="category__delete-btn">
                        Удалить
                    </button>
                </div>
            </div>
        </form>
    </div>
</dialog>