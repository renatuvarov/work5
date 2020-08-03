<div class="text-center">
    <a href="/fullname" class="btn btn-info mr-3">Изменить ФИО</a>
    <a href="/password" class="btn btn-info mr-3">Изменить пароль</a>
    <a href="/logout" class="btn btn-danger">Выход</a>
</div>
<ul class="mt-5">
    <li>Логин: <?php echo $user->login ?></li>
    <li>E-mail: <?php echo $user->email ?></li>
    <li>Имя: <?php echo $user->name ?></li>
    <li>Фамилия: <?php echo $user->surname ?></li>
    <li>Отчество: <?php echo $user->patronymic ?></li>
</ul>
