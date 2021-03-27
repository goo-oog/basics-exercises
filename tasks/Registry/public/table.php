<table>
    <tr>
        <th>P.k.</th>
        <th>Vārds</th>
        <th>Uzvārds</th>
        <th>Piezīmes</th>
    </tr>
    <?php /** @var \Registry\App\Repository $db */
    foreach ($db->getAll() as $person):?>
        <tr>
            <td><?= $person->code() ?></td>
            <td><?= $person->name() ?></td>
            <td><?= $person->surname() ?></td>
            <td><?= $person->note() ?></td>
        </tr>
    <?php endforeach; ?>
</table>