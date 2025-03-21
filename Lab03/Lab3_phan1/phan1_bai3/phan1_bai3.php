<?php
// for
function oddNumberForLoop(){
    echo "Odd numbers from 0 to 100 using for loop: " . "<br>";
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
    echo "Odd numbers from 0 to 100 using while loop: " . "<br>";
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