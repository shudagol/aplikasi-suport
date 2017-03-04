<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title>Suport IT CEP</title>
	
	<link href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/asset_login/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/asset_login/css/styles.css" />
</head>
<body>

	<section class="container">
			<section class="login-form">
				<div class="panel panel-default">
					<div class="panel-heading">USER LOGIN</div>
					<div class="panel-body">
					    <form method="post" action="login/login_process" role="login">
						
        					<input type="text" class="form-control input-lg" name="username" placeholder="username" required>
        					<input type="password" name="password" class="form-control input-lg" placeholder="password" required>
							
							<button type="submit" name="go" class="btn btn-lg btn-info btn-block">Masuk</button>
						</form>
					</div>
				</div>
				
				<!-- <div class="external-links">
					<a href="#">Do you need something ?</a>
				</div> -->
				
			</section>
	</section>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="<?= base_url(); ?>/asset_login/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>