<?php
function printMatrix(){
    for ($i = 1; $i <= 7; $i++){
        for($j = 1; $j <= 7; $j++){
            echo $i * $j . " ";
        }
        echo "<br>";
    }
}

printMatrix();

?>