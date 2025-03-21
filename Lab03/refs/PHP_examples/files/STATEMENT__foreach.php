<html>
<head>
<title>Foreach Demo</title>
</head>
<body>
<?

$list = array("A", "B", "C", "D", "E");

print "<ul>\n";
foreach ($list as $value){
  print " <li>$value</li>\n";
} // end foreach
print "</ul>\n";

?>
</body>
</html>