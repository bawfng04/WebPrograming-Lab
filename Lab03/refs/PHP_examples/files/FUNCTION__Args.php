<?php

    function dynamic_func() {
        echo "There are: ".func_num_args()." Arguments passed.<BR>";
        $args = func_get_args();

        for($i = 0; $i < count($args); $i++) {
            echo "Passed Value: {$args[$i]}<BR>";
        }

      }

    dynamic_func(1,2,3,4,5);

?>