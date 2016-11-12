<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div id="login-container">
        <form id="form-login" class="bootstrap-form-with-validation">
            <h2 class="text-center">Log In</h2>
            <div class="form-group has-success has-feedback">
                <label class="control-label" for="text-input">Username</label>
                <input class="form-control" type="text" name="text-input" id="text-input"><span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span></div>
            <div class="form-group has-warning has-feedback">
                <label class="control-label" for="password-input">Password</label>
                <input class="form-control" type="password" name="password-input" id="password-input"><span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span></div>
            <div class="form-group"><a href="#"><span><em>Forgot Password ?</em></span></a></div>
            <div class="clear"></div>
            <div class="form-group has-warning">
                <button class="btn btn-primary" type="submit" id="login">Log In</button>
                <button class="btn btn-default" type="button" id="register">Register </button>
            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>