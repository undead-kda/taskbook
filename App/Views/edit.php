<div class="header__block">
  Редактирование записи:
</div>
<b>Автор:</b> <?= $author; ?><br>
<b>Email:</b> <?= $authorEmail; ?><br>
<form action="/update" method="POST">
    <input type="hidden" name="id" value="<?= $id; ?>">
    <div class="form-group">
        <label for="taskField">Текст задачи</label>
        <textarea class="form-control" name="content" id="taskField" rows="10"><?=$content?></textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="status" class="form-check-input" id="exampleCheck1" value="1" <?=$checked?>>
        <label class="form-check-label" for="exampleCheck1">Выполнено</label>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
