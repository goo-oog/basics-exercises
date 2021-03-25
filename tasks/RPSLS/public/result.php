<table>
    <?php /** @var \RPSLS\App\Game $game */
    $human = $game->human()->choice()->name();
    $computer = $game->computer()->choice()->name() ?>
    <tr>
        <td class="<?= $human ?>">You</td>
        <td class="<?= $computer ?>">Computer</td>
    </tr>
    <tr>
        <td class="<?= $human ?>"><?= $human ?></td>
        <td class="<?= $computer ?>"><?= $computer ?></td>
    </tr>
    <tr>
        <td colspan="2" class="result">
            <?= $game->winner() ?></td>
    </tr>
</table>
<br>