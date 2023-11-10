<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register/Login Forms</title>
  <!-- Add Bootstrap CSS link -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/login_register.css" rel="stylesheet">
    <script src="js/login_register.js" defer></script>
</head>
<body>
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
		<div class="form-holder">
		<form action="signup-check.php" method="post">
			<input type="text" class="input" name="uname" placeholder="Name" />
			<input type="password" class="input" name="password" placeholder="Password" />
			<input type="password" class="input" name="re_password" placeholder="Reapt Password" />
		</div>
		<button class="submit-btn">Sign up</button>
		</form>
	</div>
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
			<div class="form-holder">
			<form action="login.php" method="post">
				<input type="text" class="input" name="uname" placeholder="Username" />
				<input type="password" class="input" name="password" placeholder="Password" />
			
			</div>
			<button class="submit-btn">Log in</button>
			</form>
		</div>
	</div>
</div>
</body>
<script>

</script>
</html>
