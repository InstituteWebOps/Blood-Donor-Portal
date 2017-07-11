<html>
<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="container">
<h3 align="center">Sign in with your LDAP account</h1>

<div class="container">
    <div class="hide-xs col-sm-1 col-md-2 col-lg-3"></div>
    <form class="form-horizontal col-sm-10 col-md-8 col-lg-6" action="auth.php" method="post" name="signupform" onsubmit="return validate_roll()">
        <div class="form-group">
            <label for="rollno" class="control-label col-sm-4">Roll Number: </label>
            <div class="col-sm-6 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" name="rollno" id="rollno" class="form-control" placeholder="eg: AE15B015" required/>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="form-group">
            <label for="password" class="control-label col-sm-4">Password: </label>
            <div class="col-sm-6 input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required/>
            </div>
            <div class="col-sm-2"></div>
        </div>
        <div class="row">
            <div class="col-sm-1 col-md-2 col-lg-3"></div>
            <div class="col-sm-5 col-md-4 col-lg-3">
                <button id="submitbtn" type="submit" class="btn btn-primary center-block btn-block btn-lg">Log In</button>
            </div>
            <div class="col-sm-5 col-md-4 col-lg-3">
                <a class="btn btn-info center-block btn-block btn-lg" href="index.html">Go Back</a>
            </div>
            <div class="col-sm-1 col-md-2 col-lg-3"></div>
        </div>
    </form>
    <div class="hide-xs col-sm-1 col-md-2 col-lg-3"></div>
</div>
</body>
<script>
  function validate_roll() {
      //Checks against the valid rol number format of \w{2}\d{2}\w{1}\d{3}
      var rno_format = new RegExp(/(^([A-Z]{2})([0-9]{2})([A-Z]{1})([0-9]{3})$)/i);
      if (!(rno_format.test($("#rollno").val())))
      {
        alert("Incorrect Roll No.");
        return false;
      }
      return true;
  }
</script>
</html>

