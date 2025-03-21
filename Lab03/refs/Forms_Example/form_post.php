<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php 
	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		// You can also use isset($_POST)
?>
<div>
	<h2>Example of POST method</h2>
	<br /><br />
	<form action="" method="post">
		<br />
		Name:<input type="text" name="name" maxlength="12" size="12" /><br />
		Gender:<br />
		Male:<input type="radio" name="gender" value="Male" /><br />
		Female:<input type="radio" name="gender" value="Female" /><br />
		Favorite Food:<br />
		Steak:<input type="checkbox" name="food[]" value="Steak" /><br />
		Pizza:<input type="checkbox" name="food[]" value="Pizza" /><br />
		Chicken:<input type="checkbox" name="food[]" value="Chicken" /><br />
		<textarea wrap="physical" cols="20" name="quote" rows="5">Enter your favorite quote!</textarea>
		<br />
		Select a Level of Education:<br>
		<select name="education">
			<option value="Jr.High">Jr.High</option>
			<option value="HighSchool">HighSchool</option>
			<option value="College">College</option>
		</select>
		<br />
		Select your favorite days of week:<br />
		<select multiple="multiple" name="TofD">
			<option value="Monday">Monday</option>
			<option value="Tuesday">Tuesday</option>
			<option value="Thursday">Thursday</option>
			<option value="Friday">Friday</option>
			<option value="Saturday">Saturday</option>
			<option value="Sunday">Sunday</option>
		</select>
		<br />
		Select your favorite time of day:<br />
		<select size="3" name="TofD">
			<option value="Morning">Morning</option>
			<option value="Day">Day</option>
			<option value="Night">Night</option>
		</select>
		<br />
		<input type="reset" value="Reset this form"></input>
		<input type="submit" value="Submit your values!"></input>
	</form>
</div>
<?php 
	}
	else {
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
	}
?>
</body>

</html>
