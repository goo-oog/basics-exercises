<form method="post">
    <input type="radio" id="rock" name="element" value="Rock"
        <?php if (isset($_POST['element']) && $_POST['element'] === 'Rock'): ?> checked="checked"> <?php endif; ?>
    <label for="rock">Rock</label>
    <input type="radio" id="paper" name="element" value="Paper"
        <?php if (isset($_POST['element']) && $_POST['element'] === 'Paper'): ?> checked="checked"> <?php endif; ?>
    <label for="paper">Paper</label>
    <input type="radio" id="scissors" name="element" value="Scissors"
        <?php if (isset($_POST['element']) && $_POST['element'] === 'Scissors'): ?> checked="checked"> <?php endif; ?>
    <label for="scissors">Scissors</label>
    <input type="radio" id="lizard" name="element" value="Lizard"
        <?php if (isset($_POST['element']) && $_POST['element'] === 'Lizard'): ?> checked="checked"> <?php endif; ?>
    <label for="lizard">Lizard</label>
    <input type="radio" id="spock" name="element" value="Spock"
        <?php if (isset($_POST['element']) && $_POST['element'] === 'Spock'): ?> checked="checked"> <?php endif; ?>
    <label for="spock">Spock</label>
    <br><br>
    <input class="button" type="submit" value="Make your choice">
</form>