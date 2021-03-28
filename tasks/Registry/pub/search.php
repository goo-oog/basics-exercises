<br><br>
<div class="search-form">
    <form method="post">
        <label for="query">Ko meklēt:</label>
        <input type="text" class="search-text-input" id="query" name="query" value="<?= $_POST['query'] ?? '' ?>"/>
        <label for="column">Meklēšanas kritērijs:</label>
        <select class="search-select" id="column" name="action">
            <option value="code"
                <?php if (isset($_POST['action']) && $_POST['action'] === 'code'): ?>
                    selected<?php endif; ?>>personas kods
            </option>
            <option value="name" <?php if (isset($_POST['action']) && $_POST['action'] === 'name'): ?>
                selected<?php endif; ?>>vārds
            </option>
            <option value="surname" <?php if (isset($_POST['action']) && $_POST['action'] === 'surname'): ?>
                selected<?php endif; ?>>uzvārds
            </option>
        </select>
        <input type="submit" class="button" value="Meklēt">
    </form>
</div>