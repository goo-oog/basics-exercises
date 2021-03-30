<?php
declare(strict_types=1);

require 'header.php';
?>
    <br><br>
    <h2>Labot piezīmi</h2>
    <div class="edit-note">
        <form method="post" action="/edit/execute">
            <label for="code">Personas kods:</label>
            <input type="text" class="edit-note-text-input" id="code" name="code"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->code() ?>" readonly/><br><br>

            <label for="name">Vārds:</label>
            <input type="text" class="edit-note-text-input" id="name" name="name"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->name() ?>" readonly/><br><br>

            <label for="surname">Uzvārds:</label>
            <input type="text" class="edit-note-text-input" id="surname" name="surname"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->surname() ?>" readonly/><br><br>

            <label for="note">Piezīmes</label>
            <input type="text" class="edit-note-text-input" id="note" name="note"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->note() ?>"/><br>

            <p style="text-align: center"><input type="submit" class="button" value="Labot"></p>
        </form>
    </div>
<?php
require 'home-button.php';
require 'footer.php';