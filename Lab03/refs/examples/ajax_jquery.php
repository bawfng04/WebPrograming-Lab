<!DOCTYPE html>
<html>
<head>
<script language="javascript" type="text/javascript" src="script/jquery-1.9.1.min.js"></script>
<script>
function loadXMLDoc()
{
	$.ajax({
		// The link we are accessing.
		url: "ajax_info.php",
			
		// The type of request.
		type: "get",
			
		// The type of data that is getting returned.
		dataType: "html",

		success: function( strData ){
			document.getElementById("myDiv").innerHTML = strData;
		}
	});
}
</script>
</head>
<body>

<div id="myDiv"><h2>AJAX will change this text</h2></div>
<button type="button" onclick="loadXMLDoc()">Change Content</button>

</body>
</html>

