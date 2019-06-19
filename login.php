<?php 

session_start();

if ( isset ($_POST ["submit"]) ) {

if ($_POST ["username"] == "admin" && $_POST["password"] == "nanz" ) {

$_SESSION ["login"] = true;

header ("Location: admin.php");
exit;

} else {
	$salah = true;
}



}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/mmx.css">
</head>
<body>

	<?php if ( isset ($salah) ) : ?>
	<p style="color:red; font-style: italic;" >username / password tidak cocok</p>
	<?php endif ?>

	<br><br>
	<div class="avatar">
		<img src="img/img_avatar.png" widht="80" height="80">
		<img src="img/img_avatar2.png" widht="80" height="80">
	</div>
		<h2 id="li">PLEASE LOGIN ADMIN</h2>
		<br><br><br>
	<div class="login">
		<form method="post" action="">
				<label for="username">username : </label>
				<input type="text" name="username" id="username" class="lo">
				<br><br>
				<label for="password">password : </label>
				<input type="Password" name="password" id="password" class="lo">
				<br><br>
				<label for=""><input type="checkbox">Remember Me</label>
				<br><br>
				<button type="submit" name="submit">Berangkat</button>
			
			
		</form>
	</div>

	
</body>
</html>