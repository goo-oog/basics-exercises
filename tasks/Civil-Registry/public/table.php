<br>
<div class="search-result">
    <table>
        <tr>
            <th></th>
            <th>Personas kods</th>
            <th>Vārds</th>
            <th>Uzvārds</th>
            <th colspan="2">Piezīmes</th>
        </tr>
        <?php
        /** @var \Registry\App\Models\Person[] $searchResult */
        foreach ($searchResult as $person):?>
            <tr>
                <td class="table-columns-with-buttons">
                    <form method="post" action="/delete">
                        <input type="hidden" name="code" value="<?= $person->code() ?>"/>
                        <input type="submit" class="delete-button" value="Dzēst"/>
                    </form>
                </td>
                <td class="table-column-code"><?= substr($person->code(), 0, 6) . '-' . substr($person->code(), 6) ?></td>
                <td class="table-column-name"><?= $person->name() ?></td>
                <td class="table-column-surname"><?= $person->surname() ?></td>
                <td class="table-column-note"><?= $person->note() ?></td>
                <td class="table-columns-with-buttons">
                    <form method="post" action="/edit">
                        <input type="hidden" name="code" value="<?= $person->code() ?>"/>
                        <input type="submit" class="edit-button" value="Labot"/>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>