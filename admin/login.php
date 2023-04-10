<?php
    include '../classes/adminlogin.php';
?>
<?php
  $class = new adminlogin();
  if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $AdminUser = $_POST['admin_user'];
    $AdminPass = $_POST['admin_pass'];

    $login_check = $class->login_admin($AdminUser, $AdminPass);
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - login/signup form animation</title>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
		<div class="form-holder">
			<input type="text" class="input" placeholder="Name" />
			<input type="email" class="input" placeholder="Email" />
			<input type="password" class="input" placeholder="Password" />
		</div>
		<button class="submit-btn">Sign up</button>
	</div>
	<form action="login.php" method="post">
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
			<div class="form-holder">
				<input type="text" name="admin_user" class="input" placeholder="User" />
				<input type="password" name="admin_pass" class="input" placeholder="Password" />
			</div>
			<button class="submit-btn">Log in</button>
		</div>
	</div>
	</form>
</div>
<!-- partial -->
  <script  src="css/script.js"></script>

</body>
</html>
