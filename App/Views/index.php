<div class="header__block">
    <p>Задачи</p>
</div>

<div class="radio__block">
    Сортировка
    <div class="form-check">
        <input type="radio" class="form-check-input main-radio" name="radio-1" id="radio1" value="0" <?= $checkStatus0; ?>>
        <label class="form-check-label" for="radio1">
            По email
        </label>
    </div>
    <div class="form-check">
        <input type="radio" class="form-check-input main-radio" name="radio-1" id="radio2" value="1" <?= $checkStatus1; ?>>
        <label class="form-check-label" for="radio2">
            По статусу
        </label>
    </div>
    <a href="/index?page=<?= $page; ?>&sort=<?= $sort; ?>" class="btn btn-primary task-link">Выполнить</a>
</div>

<?php foreach ($records as $record): ?>
    <div class="task__block">
        <h3><?= $record['name'] ?></h3>
        <h4><?= $record['email'] ?></h4>
        <div class="text-justify">
            <p><?= $record['content'] ?></p>
        </div>
        <?php if ($record['status'] > 0) $status = 'Выполнена'; else $status = "Не выполнена"; ?>
        <p><b>Cтатус задачи:</b>  <?= $status; ?></p>
    </div>
<?php endforeach; ?>
<nav aria-label="Задачи">
    <ul class="pagination">
        <?php for ($i = 1; $i <= $intervalCount; $i++): ?>
            <li><a class="page-link task-link" href="/index?page=<?= $i; ?>&sort=<?= $sort; ?>"><?= $i; ?></a></li>
        <?php endfor; ?>
    </ul>
</nav>
