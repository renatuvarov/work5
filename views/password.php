<?php
/**
 * @var \Src\View $this
 */
?>

<h1 class="h1 text-center mt-3">Смена пароля</h1>

<form action="/password" method="post" class="d-block mt-2 w-25 ml-auto mr-auto">
    <div class="form-group">
        <label for="password">Новый пароль</label>
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
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>