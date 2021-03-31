<?php
declare(strict_types=1);

require 'header.php';
?>
    <br>
    <h2>Labot adresi</h2>
    <div class="edit-address">
        <form method="post" action="/edit-address/execute">
            <label for="code">Personas kods:</label>
            <input type="text" class="text-input" id="code" name="code"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->code() ?>" readonly/>
            <br><br>
            <label for="name">Vārds:</label>
            <input type="text" class="text-input" id="name" name="name"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->name() ?>" readonly/>
            <br><br>
            <label for="surname">Uzvārds:</label>
            <input type="text" class="text-input" id="surname" name="surname"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->surname() ?>" readonly/>
            <br><br>
            <label for="address">Adrese</label>
            <input type="text" class="text-input" id="address" name="address"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->address() ?>"/>

            <input type="hidden" id="gender" name="gender"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->gender() ?>"/>
            <input type="hidden" id="note" name="note"
                   value="<?= $this->db->getByCode($_POST['code'])[0]->note() ?>"/>
            <br><br>
            <p>
                <input type="submit" class="button-green" value="Labot">
            </p>
        </form>
    </div>
<?php
require 'home-button.php';
require 'footer.php';