<?
$now = time();
$later = strtotime('Thursday',$now);
$before = strtotime('last thursday',$now);
print strftime("now: %c \n", $now)."<br />";
print strftime("later: %c \n", $later)."<br />";
print strftime("before: %c \n", $before)."<br />";
?>