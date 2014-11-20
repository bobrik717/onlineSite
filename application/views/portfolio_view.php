<h1>Портфолио</h1>
<p>
<table>
    Данные о пользователях
    <tr><td>E-Mail</td><td>Дата регистрации</td></tr>
    <?php foreach($data as $person): ?>
    <tr><td><?=$person['email']?></td><td><?=$person['date']?></td></tr>
    <?php endforeach ?>
</table>
</p>