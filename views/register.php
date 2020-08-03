<?php
/**
 * @var \Src\View $this
 */
?>

<h1 class="h1 text-center mt-3">Регистрация</h1>

<a href="/login" class="btn-block btn btn-info text-center w-25 ml-auto mr-auto">Вход</a>

<form action="/register" method="post" class="d-block mt-2 w-25 ml-auto mr-auto">
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
        <label for="email">E-mail</label>
        <input type="text"
               class="form-control"
               id="email"
               name="email"
               value="<?php echo $this->old('email') ?>">
        <?php if ($this->hasError('email')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('email') ?>
            </small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text"
               class="form-control"
               id="name"
               name="name"
               value="<?php echo $this->old('name') ?>">
        <?php if ($this->hasError('name')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('name') ?>
            </small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="surname">Фамилия</label>
        <input type="text"
               class="form-control"
               id="surname"
               name="surname"
               value="<?php echo $this->old('surname') ?>">
        <?php if ($this->hasError('surname')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('surname') ?>
            </small>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="patronymic">Отчество</label>
        <input type="text"
               class="form-control"
               id="patronymic"
               name="patronymic"
               value="<?php echo $this->old('patronymic') ?>">
        <?php if ($this->hasError('patronymic')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('patronymic') ?>
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
    <div class="form-group">
        <label for="password_confirm">Повторите пароль</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        <?php if ($this->hasError('password_confirm')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('password_confirm') ?>
            </small>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Регистрация</button>
</form>
