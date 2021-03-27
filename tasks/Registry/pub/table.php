<table>
    <tr>
        <th>X</th>
        <th>P.k.</th>
        <th>Vārds</th>
        <th>Uzvārds</th>
        <th>Piezīmes</th>
        <th>Labot</th>
    </tr>
    <?php
    /** @var \Registry\App\Person[] $searchResult */
    foreach ($searchResult as $person):?>
        <tr>
            <td><form method="post">
                    <input type="hidden" name="code" value="<?= $person->code() ?>">
                    <button type="submit" name="action" value="delete">Dzēst</button>
                </form></td>
            <td><?= $person->code() ?></td>
            <td><?= $person->name() ?></td>
            <td><?= $person->surname() ?></td>
            <td><?= $person->note() ?></td>
            <td><form method="post">
                    <input type="hidden" name="code" value="<?= $person->code() ?>">
                    <button type="submit" name="action" value="edit">Labot</button>
                </form></td>
        </tr>
    <?php endforeach; ?>
</table>