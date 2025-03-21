<?php
$a = 123;
echo "is_int($a) = " . (is_int($a) ? "true" : "false") . "\n";

$a = '123';
echo "is_int($a) = " . (is_int($a) ? "true" : "false") . "\n";
?>
<br /><br /><br />
<?php
     $item = 43;
     echo "\$item is of type array: ".is_array($item)."<br />";
     echo "\$item is of type integer: ".is_integer($item)."<br />";
     echo "\$item is numeric: ".is_numeric($item)."<br />";
?>
<br /><br /><br />
<?php 
    $unknownvar = "asdf"; 
    echo gettype ($unknownvar) . "<br />"; 
    if (is_string ($unknownvar)){ 
        echo "Is a string<br />"; 
    } 
?>