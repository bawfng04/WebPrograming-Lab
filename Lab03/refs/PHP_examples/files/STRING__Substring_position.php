<?php
   $substr = "index.html";
   $log = "192.168.1.11:/www/htdocs/index.html:";

   $pos = strpos($log, $substr);

   echo "$pos";
?>