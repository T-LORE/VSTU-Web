<form action="login.php" method="POST">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" required>
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
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <p>Ещё нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
        </div>
    </div>
</form>
