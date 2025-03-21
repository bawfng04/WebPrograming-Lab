<?php
// for
function oddNumberForLoop(){
    for ($i = 0; $i <= 100; $i ++){
        if ($i % 2 == 0){
            continue;
        }
        echo $i . " ";
    }
    echo "<br>";
}

oddNumberForLoop();

// while
function oddNumberWhileLoop(){
    $i = 0;
    while($i <= 100){
        if($i % 2 != 0){
            echo $i . " ";
        }
        $i++;
    }
    echo "<br>";
}

oddNumberWhileLoop();

?>