<?php
//session_start();
require '../database/database.php';

if (isset($_POST['sign-in'])) {
	$query = 'SELECT firstname, lastname, username, password FROM user WHERE username = "' . $_POST['sign-in-username'] . '"';
	$user = $db->query($query);
	$user = fetchAll(PDO::FETCH_ASSOC);
	$pass2 = crypt($_POST['sign-in-password'], CRYPT_BLOWFISH);
		if ($user[0]['password'] == $pass2) {
			/*$_SESSION['logged-in'] = 'logged-in';
			$_SESSION['firstname'] = $user[0]['firstname'];*/
			header('Location: homepage.php');
		} else {
			$error = 'Please provide valid login';`
		}
	}
require '../dynamic/header.php';

?>
<h1 id="main-h1">Assignments</h1>

<?php echo $error; ?>

  <h2>Sign In</h2>
	<form id="sign-in-form" action="sign-in.php" method="post">
		<div class="form-group">
			<label for="sign-in-username">Username</label>
			<input type="email" class="form-control" name="sign-in-username" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="sign-in-password">Password</label>
			<input type="password" class="form-control" name="sign-in-password" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-default" form="sign-in-form" value="Sign In" name="sign-in">
		</div>
	</form>

<?php require '../dynamic/footer.php'; ?>