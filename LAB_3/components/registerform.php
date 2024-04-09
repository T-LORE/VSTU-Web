<form action="register.php" method="POST">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="full_name">ФИО:</label>
            <input type="text" class="form-control" name="fullname" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="birthdate">Дата рождения:</label>
            <input type="date" class="form-control" name="birthdate" value="<?php echo isset($birthdate) ? htmlspecialchars($birthdate) : ''; ?>" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="address">Адрес:</label>
            <input type="text" class="form-control" name="address" value="<?php echo isset($address) ? htmlspecialchars($address) : ''; ?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="gender">Пол:</label>
            <select class="form-control" name="gender" required>
                <option value="Мужской" <?php echo isset($gender) && $gender == 'Мужской' ? 'selected' : ''; ?>>Мужской</option>
                <option value="Женский" <?php echo isset($gender) && $gender == 'Женский' ? 'selected' : ''; ?>>Женский</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="interests">Интересы:</label>
            <input type="text" class="form-control" name="interests" value="<?php echo isset($interests) ? htmlspecialchars($interests) : ''; ?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="vk_profile">Ссылка на профиль ВК:</label>
            <input type="text" class="form-control" name="vk" value="<?php echo isset($vk) ? htmlspecialchars($vk) : ''; ?>">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="blood_group">Группа крови:</label>
            <select class="form-control" name="bloodType">
                <option value="A" <?php echo isset($bloodType) && $bloodType == 'A' ? 'selected' : ''; ?>>A</option>
                <option value="B" <?php echo isset($bloodType) && $bloodType == 'B' ? 'selected' : ''; ?>>B</option>
                <option value="AB" <?php echo isset($bloodType) && $bloodType == 'AB' ? 'selected' : ''; ?>>AB</option>
                <option value="O" <?php echo isset($bloodType) && $bloodType == 'O' ? 'selected' : ''; ?>>O</option>
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <label for="rhesus_factor">Резус-фактор:</label>
            <select class="form-control" name="Rh">
                <option value="+" <?php echo isset($Rh) && $Rh == '+' ? 'selected' : ''; ?>>+</option>
                <option value="-" <?php echo isset($Rh) && $Rh == '-' ? 'selected' : ''; ?>>-</option>
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
            <input type="password" class="form-control" name="passwordConfirm" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <button type="submit" class="btn btn-primary" name="action" value="signup">Зарегистрироваться</button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <p>Уже есть аккаунт? <a href="login.php">Войти в аккаунт</a></p>
        </div>
    </div>

    <?php if (isset($errors) && !empty($errors)): ?>
        <div class="row mt-3">
            <div class="col-md-6 offset-md-3">
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</form>
