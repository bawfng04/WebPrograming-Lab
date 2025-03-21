<?php 

$mydatestrings = array("now", "today", "tomorrow", "yesterday", 
"Thursday", "this Thursday", "last Thursday", "+2 hours", "-1 month", "+10 minutes", 
"30 seconds", "+2 years -1 month", "next week","last month", "last year", "2 weeks ago" 
); 

foreach($mydatestrings as $mydate) 
    echo "$mydate:" . date('r', strtotime($mydate)) ;
?>