<dialog class="auth-modal" id="auth-modal">
    <nav class="auth-modal__nav">
        <ul>
            <li>
                <button data-state="login">Вход</button>
            </li>
            <li>
                <button data-state="register">Регистрация</button>
            </li>
        </ul>
    </nav>
    <div class="auth-modal__content">
        <form class="content__form content__login">
            <input type="email" class="form__field" placeholder="Email" />
            <input type="password" class="form__field" placeholder="Пароль" />
            <label class="form__checkbox-field">
                <input type="checkbox" />
                <span>Запомнить меня</span>
            </label>
            <button class="form__submit" type="submit">Вход</button>
        </form>
        <form class="content__form content__register">
            <input type="email" class="form__field" placeholder="Email" />
            <input type="text" class="form__field" placeholder="Имя" />
            <input type="text" class="form__field" placeholder="Фамилия" />
            <input type="password" class="form__field" placeholder="Пароль" />
            <input
                type="password"
                class="form__field"
                placeholder="Повторите пароль" />
            <label class="form__checkbox-field">
                <input type="checkbox" />
                <span>Я даю свое согласие на обработку персональных данных</span>
            </label>
            <button class="form__submit" type="submit">Регистрация</button>
        </form>
    </div>
</dialog>