<html>
<body>
<?php 
	if($_SERVER['REQUEST_METHOD'] != 'POST') {
?>
	<form action="" method="POST" enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="Submit">
	</form>
<?php 
	}
	else {
		//add some restrictions to the file upload, filter: .gif, .jpeg, and .png files; and the file size must be under 2MB
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$nameParts = explode(".", $_FILES["file"]["name"]);
		$extension = end($nameParts);
		if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/png")
				|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& ($_FILES["file"]["size"] < 2000000)
				&& in_array($extension, $allowedExts)) {
		  if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		  }
		  else {
		    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		
		    if (file_exists("upload/" . $_FILES["file"]["name"])) {
		      echo $_FILES["file"]["name"] . " already exists. ";
		    }
		    else {
		      move_uploaded_file($_FILES["file"]["tmp_name"],
		      "upload/" . $_FILES["file"]["name"]);
		      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		    }
		  }
		}
		else {
		  echo "Invalid file";
		}
	}
?>
</body>
</html> 