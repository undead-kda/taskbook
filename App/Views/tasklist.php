<div class="header__block">
    Список записей:
</div>

<?php $i = 1; ?>

<table class="table table-bordered" >
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Email</th>
            <th scope="col">Текст задачи</th>
            <th scope="col">Отметка</th>
            <th scope="col">Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($records as $record): ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $record['name']; ?></td>
                <td><?= $record['email']; ?></td>
                <td><?= mb_strimwidth(htmlspecialchars($record['content']), 0, 250, "..."); ?></td>
                <?php if ($record['status'] == 1): ?>
                    <td>Выполнена</td>
                <?php else: ?>
                    <td>Не выполнена</td>
                <?php endif; ?>
                <td><a href="/edit?page=<?= $record['id']; ?>">Правка</a> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?

?>