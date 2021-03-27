<form method="post">
    <label for="query">Ko meklēt:</label>
    <input type="text" id="query" name="query"/>
    <label for="column">Meklēšanas kritērijs:</label>
    <select id="column" name="column">
        <option value="getByCode" selected>personas kods</option>
        <option value="getByName">vārds</option>
        <option value="getBySurname">uzvārds</option>
    </select>
    <input type="submit" value="Meklēt">
</form>