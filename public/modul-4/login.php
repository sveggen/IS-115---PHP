<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Log in</title>
</head>
<body>

<div class="login">
<form action="" method="get">

  <div class="form-group">
<h3>Log in</h3>
  </div>
<div class="form-row">
<div class="form-group">
<label for="username">username: </label>
<input type="text" class="form-control" name="username" placeholder="username"/>
</div>

<div class="form-group ">
<label for="password">password: </label>
 <input type="password" class="form-control" name="password" placeholder="*******"/>
</div>
</div>
<div class="form-group">
    <button class="btn btn-primary btn-block" type="submit">Log in</button>
</div>
</form>
</div>

<?php
echo "<p> ". $_GET['username'] ." is invalid </p>";
?>
</body>
</html>
