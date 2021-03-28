<?php
declare(strict_types=1);

require 'header.php';
?>
    <br><br>
    <h2>Pievienot personu</h2>
    <h3 class="error-message"><?= $_POST['message'] ?? '' ?></h3>
    <div class="add-person">
        <form method="post" action="/">
            <label for="code">Personas kods:</label>
            <input type="text" class="edit-note-text-input" id="code" name="code"
                   value="<?= $_POST['code'] ?? '' ?>"/><br><br>

            <label for="name">Vārds:</label>
            <input type="text" class="edit-note-text-input" id="name" name="name"
                   value="<?= $_POST['name'] ?? '' ?>"/><br><br>

            <label for="surname">Uzvārds:</label>
            <input type="text" class="edit-note-text-input" id="surname" name="surname"
                   value="<?= $_POST['surname'] ?? '' ?>"/><br><br>

            <label for="note">Piezīmes</label>
            <input type="text" class="edit-note-text-input" id="note" name="note"
                   value="<?= $_POST['note'] ?? '' ?>"/><br><br>

            <input type="hidden" name="action" value="add">
            <p style="text-align: center"><input type="submit" class="button" value="Pievienot"></p>
        </form>
    </div>
<?php
require 'home-button.php';
require 'footer.php';
?>
