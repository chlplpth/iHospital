<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>      
    <br><br><br>
            <div id ="logo">
            <img src="image/iHospital-logo.png" id = "logoImg"> 
            </div>
            <form id = "loginForm">
                <div>Please Login</div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="usernameInputLabel">Username</span>
                    <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" id="usernameInput">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="passwordInputLabel">Password&nbsp</span>
                    <input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" id="passwordInput">
                </div>
                <a href=# id= "forgetPassword">forget password</a>
                <br>
                <button class="btn btn-default" type="button" id="loginButton">Login</button>
            </form>
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
