<html lang="en">
<body>

<?php
$greeting = 'Hello, ';
$name = 'World';
echo "$greeting $name<br/>";
echo $greeting . htmlspecialchars($_GET['name']).'<br/>';

$arr=Array('cat','dog','cow');
$arr[]='duck';
var_dump($arr);
array_splice($arr,0,1);
echo '<br/>';
print_r($arr);


?>


</body>
</html>


