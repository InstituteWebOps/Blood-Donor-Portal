<html>

<head>
    <meta charset="utf-8">
    <title>User profile</title>
    <?php 
    require('db.php');
    try{
      if(isset($_POST['name']))
      {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        $whatsappno = $_POST['whatsappno'];
        $bgroup = $_POST['bgroup'];
        $age = $_POST['age'];
        $lastdonated = $_POST['lastdonated'];
        $mhistory = $_POST['mhistory'];
        
        $statement = "INSERT INTO donors (name, gender, email, phoneno, whatsappno, bgroup, age, lastdonated, mhistory) VALUES (:name, :gender, :email, :phoneno, :whatsappno, :bgroup, :age, :lastdonated, :mhistory);";
        $insert = $conn->prepare($statement);
        $insert->bindValue(':name' , $name);
        $insert->bindValue(':email' , $email);
        $insert->bindValue(':gender' , $gender);
        $insert->bindValue(':phoneno' , $phoneno);
        $insert->bindValue(':whatsappno' , $whatsappno);
        $insert->bindValue(':bgroup' , $bgroup);
        $insert->bindValue(':age' , $age);
        $insert->bindValue(':lastdonated' , $lastdonated);
        $insert->bindValue(':mhistory' , $mhistory);
        $insert->execute();
      }
    } catch(PDOException $e) {
      echo "Error" .$e->getMessage();
    }
?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo|Merriweather" rel="stylesheet">
    <style>
        h2 {
            /*font-family: 'Exo', sans-serif;*/
        }
        
        form {
            border-radius: 5px;
            background-color: #d0edd0;
        }
    </style>
</head>

<body class="container">
    <h2 class="text-center"><strong>Enter your details here</strong></h2><br>
    <div class="col-lg-3 col-md-2 col-sm-1 hidden-xs"></div>

    <form class="form-horizontal col-xs-12 col-sm-10 col-md-8 col-lg-6" action="" method="post" name="signupform">
        <br>
        <div class="form-group">
            <label class="control-label col-sm-4" for="name">Name:</label>
            <div class="col-sm-8">
                <input type="username" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">Email:</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" requireda>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="gender">Gender:</label>
            <div class="col-sm-8">
                <input type="radio" name="gender">Male
                <input type="radio" name="gender">Female
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="phoneno">Phone Number:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" name="phoneno" requireda>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="whatsappno">WhatsApp Number:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="whatsappno" placeholder="Enter Phone Number" name="whatsappno">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="bgroup">Blood Group:</label>
            <div class="col-sm-8">
                <select class="form-control" id="bgroup" name="bgroup" requireda>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="age">Age:</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" name="age" min="18" max="60" requireda>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="lastdonated">Date of Last Blood Donation:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="lastdonated" placeholder="Leave Empty if not donated before" name="lastdonated">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="mhistory">Medical History, if any:</label>
            <div class="col-sm-8">
                <textarea id="mhistory" class="form-control" name="mhistory" rows="3" width="100%" placeholder="Enter comments about any previous medical history"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary center-block btn-block">Submit Details</button>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </form>
    <div class="col-lg-3 col-md-2 col-sm-1 hidden-xs"></div>
    <!--</div>-->
</body>

</html>

</html>