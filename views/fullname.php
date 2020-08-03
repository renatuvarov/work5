<?php
/**
 * @var \Src\View $this
 */
?>

<h1 class="h1 text-center mt-3">Изменить ФИО</h1>

<form action="/fullname" method="post" class="d-block mt-2 w-25 ml-auto mr-auto">
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text"
               class="form-control"
               id="name"
               name="name"
               value="<?php echo $this->old('name', $user->name) ?>">
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
               value="<?php echo $this->old('surname', $user->surname) ?>">
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
               value="<?php echo $this->old('patronymic', $user->patronymic) ?>">
        <?php if ($this->hasError('patronymic')): ?>
            <small class="form-text text-muted ml-2" style="color: #c82333 !important;">
                <?php echo $this->firstError('patronymic') ?>
            </small>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>