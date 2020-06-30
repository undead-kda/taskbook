<?php if (!$unVisibleForm): ?>
<div class="header__block">
  Вход в личный кабинет
</div>
<?php endif; ?>
<?php if (!$unVisibleForm):
        echo $msg;
?>
<form action="/enter" method="POST">
  <div class="form-group">
    <label for="loginField">Логин</label>
    <input type="text" class="form-control" name="login" id="loginField" value="" />
  </div>
  <div class="form-group">
    <label for="passwordField">Пароль</label>
    <input type="password" class="form-control" name="password" id="passwordField" value="" />
  </div>
  <button type="submit" class="btn btn-primary">Вход</button>
</form>
<?php else: ?>
  <div class="header__block">
    Личный кабинет пользователя <?=$userName?>
  </div>
  <a href="/enter?out=1">Выйти из кабинета!</a>
<?php endif; ?>