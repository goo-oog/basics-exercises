<?php
declare(strict_types=1);

require 'header.php';
?>
    <br>
    <h2>Pievienot personu</h2>
    <h3 class="error-message"><?= $_SESSION['memory']['message'] ?? '' ?></h3>
    <div class="add-person">
        <form method="post" action="/add/execute">
            <label for="code">Personas kods:</label>
            <input type="text" class="text-input" id="code" name="code"
                   value="<?= $_SESSION['memory']['code'] ?? '' ?>"/>
            <br><br>
            <label for="name">Vārds:</label>
            <input type="text" class="text-input" id="name" name="name"
                   value="<?= $_SESSION['memory']['name'] ?? '' ?>"/>
            <br><br>
            <label for="surname">Uzvārds:</label>
            <input type="text" class="text-input" id="surname" name="surname"
                   value="<?= $_SESSION['memory']['surname'] ?? '' ?>"/>
            <br><br>
            <label for="gender">Dzimums:</label>
            <select class="add-person-gender" id="gender" name="gender">
                <option value=""></option>
                <option value="M"
                    <?php if (isset($_SESSION['memory']['gender']) && $_SESSION['memory']['gender'] === 'M'): ?>
                        selected<?php endif; ?>>vīrietis
                </option>
                <option value="F"
                    <?php if (isset($_SESSION['memory']['gender']) && $_SESSION['memory']['gender'] === 'F'): ?>
                        selected<?php endif; ?>>sieviete
                </option>
            </select>
            <br><br>
            <label for="address">Adrese:</label>
            <input type="text" class="text-input" id="address" name="address"
                   value="<?= $_SESSION['memory']['address'] ?? '' ?>"/>
            <br><br>
            <label for="note">Piezīmes</label>
            <input type="text" class="text-input" id="note" name="note"
                   value="<?= $_SESSION['memory']['note'] ?? '' ?>"/>
            <br>
            <p style="text-align: center">
                <input type="submit" class="button" value="Pievienot">
            </p>
        </form>
    </div>
<?php
require 'home-button.php';
require 'footer.php';