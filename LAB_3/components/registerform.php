<form action="register.php" method="POST">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="full_name">ФИО:</label>
            <input type="text" class="form-control" name="full_name" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="birthdate">Дата рождения:</label>
            <input type="date" class="form-control" name="birthdate" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="address">Адрес:</label>
            <input type="text" class="form-control" name="address">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="gender">Пол:</label>
            <select class="form-control" name="gender" required>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
                <option value="other">Другой</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="interests">Интересы:</label>
            <input type="text" class="form-control" name="interests">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="vk_profile">Ссылка на профиль ВК:</label>
            <input type="text" class="form-control" name="vk_profile">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="blood_group">Группа крови:</label>
            <select class="form-control" name="blood_group">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="rhesus_factor">Резус-фактор:</label>
            <select class="form-control" name="rhesus_factor">
                <option value="+">+</option>
                <option value="-">-</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="password">Пароль:</label>
            <input type="password" class="form-control" name="password" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="confirm_password">Повторите пароль:</label>
            <input type="password" class="form-control" name="confirm_password" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <p>Уже есть аккаунт? <a href="#">Войти в аккаунт</a></p>
        </div>
    </div>
</form>
