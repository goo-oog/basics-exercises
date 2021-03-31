<br>
<div class="container-shaded">
    <form method="get">
        <label for="query">Ko meklēt:</label>
        <input type="text" class="text-input" id="query" name="query" value="<?= $_GET['query'] ?? '' ?>"/>
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
            <option value="gender" <?php if (isset($_GET['search']) && $_GET['search'] === 'gender'): ?>
                selected<?php endif; ?>>dzimums
            </option>
            <option value="address" <?php if (isset($_GET['search']) && $_GET['search'] === 'address'): ?>
                selected<?php endif; ?>>adrese
            </option>
        </select>
        <input type="submit" value="Meklēt" class="button-blue">
    </form>
</div>