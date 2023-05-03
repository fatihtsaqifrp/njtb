<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="<?= base_url() ?>res/css/bootstrap.min.css" rel="stylesheet">
	<script src="<?= base_url() ?>res/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>res/js/jquery.js"></script>
	<style>
.vertical-offset-100{
    padding-top:100px;
}
	</style>
</head>
<body>

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Register</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" method="POST" action="<?= base_url("auth/goregister") ?>">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="username" name="username" type="text">
			    		</div>
						<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="email">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Register">
						<hr>
						<a href="<?= base_url("auth/login") ?>">Have Account?</a>
					</fieldset>
			      	</form>

			    </div>
			</div>
		</div>
	</div>
</div>

</body>
</html>