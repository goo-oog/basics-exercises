<br><br>
<div class="search-form">
    <form method="get">
        <label for="query">Ko meklēt:</label>
        <input type="text" class="search-text-input" id="query" name="query" value="<?= $_GET['query'] ?? '' ?>"/>
        <label for="column">Meklēšanas kritērijs:</label>
        <select class="search-select" id="column" name="search">
            <option value="code"
                <?php if (isset($_GET['search']) && $_GET['search'] === 'code'): ?>
                    selected<?php endif; ?>>personas kods
            </option>
            <option value="name" <?php if (isset($_GET['search']) && $_GET['search'] === 'name'): ?>
                selected<?php endif; ?>>vārds
            </option>
            <option value="surname" <?php if (isset($_GET['search']) && $_GET['search'] === 'surname'): ?>
                selected<?php endif; ?>>uzvārds
            </option>
        </select>
        <input type="submit" class="button" value="Meklēt">
    </form>
</div>