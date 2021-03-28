<?php
declare(strict_types=1);

use Registry\App\Register;

$db = new Register();

require 'header.php';
?>
    <br><br>
    <h2>Labot piezīmi</h2>
    <div class="edit-note">
        <form method="post" action="/">
            <label for="code">Personas kods:</label>
            <input type="text" class="edit-note-text-input" id="code" name="code"
                   value="<?= $db->getByCode($_POST['code'])[0]->code() ?>" readonly/><br><br>

            <label for="name">Vārds:</label>
            <input type="text" class="edit-note-text-input" id="name" name="name"
                   value="<?= $db->getByCode($_POST['code'])[0]->name() ?>" readonly/><br><br>

            <label for="surname">Uzvārds:</label>
            <input type="text" class="edit-note-text-input" id="surname" name="surname"
                   value="<?= $db->getByCode($_POST['code'])[0]->surname() ?>" readonly/><br><br>

            <label for="note">Piezīmes</label>
            <input type="text" class="edit-note-text-input" id="note" name="note"
                   value="<?= $db->getByCode($_POST['code'])[0]->note() ?>"/><br>

            <input type="hidden" name="action" value="edit">
            <p style="text-align: center"><input type="submit" class="button" value="Pievienot"></p>
        </form>
    </div>
<?php
require 'home-button.php';
require 'footer.php'; ?>