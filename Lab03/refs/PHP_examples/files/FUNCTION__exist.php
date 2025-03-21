<?php
    if (function_exists("imagepng")) {
            echo "You have the GD extension loaded.";
    } else {
            echo "Can't find imagepng( ) - do you have GD loaded?";
    }
?>