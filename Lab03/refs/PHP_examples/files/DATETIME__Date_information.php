<html>
<head>
<title>Acquiring Date Information with getdate()</title>
</head>
<body>
<div>
<?php
$date_array = getdate(); 
foreach ( $date_array as $key => $val ) {
  print "$key = $val<br/>";
}
?>
<hr/>
<p>
<?
print "Today's date: ";
print $date_array['mon']."/".$date_array['mday']."/".$date_array['year'];
?>
</p>
</div>
</body>
</html>