<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style>
a {
	text-decoration:none;
	color:#000000;
	font-size:14px
}
a:hover {
	text-decoration:underline;
}
</style>
</head>

<body>
<?php
  $current_file = isset($_GET['file']) ? $_GET['file'] : "DATETIME__Check_date.php";
  $_GET['file'] = $current_file;
  function numfilesindir ($thedir){
    if (is_dir ($thedir)){
      $scanarray = scandir ($thedir);
      for ($i = 0; $i < count ($scanarray); $i++){
        if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
          if (is_file ($thedir . "/" . $scanarray[$i])){
          	$bold_elem = ($scanarray[$i] == $_GET['file']) ? " style='font-weight:bold'" : "";
            echo "<a".$bold_elem." href='index.php?file=" . $scanarray[$i] . "'>" . $scanarray[$i] . "</a>" . "<br />";
          }
        }
      }
    } else {
      echo "Sorry, this directory does not exist.";
    }
  }

?>
<table style="width: 100%">
	<tr>
		<td rowspan="2" style="width: 250px;border-right:3px solid #000;vertical-align:top">
			<h2 style="color:blue">Menu</h2>
			<?php 
			echo numfilesindir ("files");
			?>
		</td>
		<td style="vertical-align:top;height:100%">
			<h2 style="color:blue">Code</h2>
			<div style="width:100%">
				<pre style="padding-left: 40px; background-color:#DBDBDB; padding-top:20px; padding-bottom:20px"><?php 
					$code = file_get_contents('files/'.$current_file);
					echo trim(htmlspecialchars($code));
				?></pre>
			</div>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;">
			<h2 style="color:blue">Result</h2>
			<div style="width:100%">
				<iframe style="width:100%; border:1px solid blue" src="files/<?php echo $current_file ?>"></iframe>
			</div>
		</td>
	</tr>
</table>

</body>

</html>
