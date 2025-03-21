<?php
/*
Modes:
r        Open the file for reading.
r+       Open the file for reading and writing.
w        Open the file for writing, overwriting existing files, and creating the file if it does not exist.
w+       Open the file for reading and writing, overwriting existing files, and creating the file if it does not exist.
a        Open the file for writing, creating the file if it does not exist, and appending to the file if it does.
a+       Open the file for reading and writing, creating the file if it does not exist, and appending to the file if it does.
b        Open the file in binary reading/writing mode (applicable only on Windows systems; however, recommended in all scripts).
*/

$fh = fopen('file.txt','r') or die("can't open file.txt: $php_errormsg");
?>