<?php
    if (!isset($taskMsg)) $taskMsg = '';
    if (!isset($unVisibleTaskForm)) $unVisibleTaskForm = false;
    if (!isset($name)) $name='';
    if (!isset($email)) $email='';
    if (!isset($content)) $content='';
?>
<?php if (!$unVisibleTaskForm): ?>
    <div class="header__block">
        Добавить задачу:
    </div>
    <form action="/add" method="POST">
        <div class="form-group">
            <label for="loginField">Имя пользователя</label>
            <input type="text" class="form-control" name="name" id="loginField" value="<?=$name?>">
        </div>
        <div class="form-group">
            <label for="emailField">Email</label>
            <input type="email" class="form-control" name="email" id="emailField" value="<?=$email?>">
        </div>
        <div class="form-group">
            <label for="taskField">Текст задачи</label>
            <textarea class="form-control" name="content" id="taskField" rows="10"><?=$content?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
<?php else: ?>
    <div class="header__block">
        <p>Задача успешно добавлена!</p>
    </div>
<?php endif; ?>
<?php echo $taskMsg; ?>
<br>
<a href="/"><p>На главную</p></a>