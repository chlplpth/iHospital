<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      {!! Form::open(array('url' => 'login')) !!}
        <h3>Please login</h3>
        {!!Form::label('username', 'ชื่อผู้ใช้งาน');!!}
        {!!Form::text('username', '', [
              'class'=>'form-signin form-control']);!!}
        @if( $errors->has('username') )
          <p class="text-danger"> {{ $errors->first('username') }} <br></p> 
        @endif

        {!!Form::label('password', 'รหัสผ่าน');!!}
        {!!Form::password('password', [
              'class'=>'form-signin form-control']);!!}
        @if( $errors->has('password') )
          <p class="text-danger"> {{ $errors->first('password') }} <br></p> 
        @endif

        <div class ="forgetAndRegis"><a href = "{!! url('forgetPassword')  !!}">forget password</a> / <a href = "{!! url('register') !!}">register</a></div><br>
        {!!Form::submit('Click Me!', ["class" => "btn btn-success"]);!!}
      

      {!! Form::close() !!}

      

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>