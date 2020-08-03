<?php
/**
 * @var \Src\View $this
 */
?>

<h1 class="h1 text-center mt-3">Вход</h1>

<a href="/register" class="btn-block btn btn-info text-center w-25 ml-auto mr-auto">Регистрация</a>

<form action="/login" method="post" class="d-block mt-2 w-25 ml-auto mr-auto">
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text"
               class="form-control"
               id="login"
               name="login"
               value="<?php echo $this->old('login') ?>">
        <?php if ($this->hasError('login')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('login') ?>
            </small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password">
        <?php if ($this->hasError('password')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('password') ?>
            </small>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>