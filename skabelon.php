<?php

require ("core/init.php");



headers();

$a = array();

$a[] = "NULL";
unset($a[0]);
$a[] = "dyr";
$a[] = "natur";
$a[] = "vandfald";
$a[] = "nude";
$a[] = "beauty";
$a[] = "bygninger";
$a[] = "solnedgang";
$a[] = "action";
$a[] = "portrat";
$a[] = "mænd med chokolade";

?>

<select name="idk">
    
    <option value="" disabled="disabled" selected="selected">Vælg en</option>
    
    <?php foreach ($a as $key => $value): ?>
    <option value="<?=$key;?>"><?=$value;?></option>
    <?php endforeach; ?>
</select>

<?php


echo "<pre>";
print_r($a);
echo "</pre>";

echo "brugernavn: ".$CURUSER['brugernavn'];

footer();

?>