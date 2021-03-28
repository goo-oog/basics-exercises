<form method="post" name="returnback" action="/add">
    <input type="hidden" name="code" value="<?= $_POST['code'] ?>"/>
    <input type="hidden" name="name" value="<?= $_POST['name'] ?>"/>
    <input type="hidden" name="surname" value="<?= $_POST['surname'] ?>"/>
    <input type="hidden" name="note" value="<?= $_POST['note'] ?>"/>
    <input type="hidden" name="message" value="<?= $message ?>"/>
</form>

<script type="text/javascript">
    document.returnback.submit();
</script>
