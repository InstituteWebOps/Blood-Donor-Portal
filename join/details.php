<html>

<head>
    <meta charset="utf-8">
    <title>User profile - Blood Donor Portal</title>
    <?php 
    session_start();
//    print_r($_SESSION);
    // To be safe
    // $_SESSION['rollno']=(isset($_SESSION['rollno'])?$_SESSION['rollno']:"AE15B001");
    if(!isset($_SESSION['rollno'])) header("Location: index.php"); 
    require('../config/db.php');

    try{
        // Fetch record
        $statement = "SELECT * FROM donors WHERE rollno = '".$_SESSION['rollno']."';"; 
        $query = $conn->query($statement);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $row = $query->fetch();

      if(isset($_POST['name']))
      {
        if(empty($row))
        {
          // New insert if no previous record
          $statement = "INSERT INTO donors (rollno, name, gender, email, phoneno, whatsappno, bgroup, b_month, b_year, lastdonated, mhistory) VALUES (:rollno, :name, :gender, :email, :phoneno, :whatsappno, :bgroup, :b_month, :b_year, :lastdonated, :mhistory);";
        } else {
          // Update record if already exists
          $statement = "UPDATE donors SET name = :name, gender = :gender, email = :email, phoneno = :phoneno, whatsappno = :whatsappno, bgroup = :bgroup, b_month = :b_month, b_year = :b_year, lastdonated = :lastdonated, mhistory = :mhistory WHERE  rollno = :rollno;";
        }
        // Insert into db
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        $whatsappno = $_POST['whatsappno'];
        $bgroup = $_POST['bgroup'];
        $b_month = $_POST['b_month'];
        $b_year = $_POST['b_year'];
        $lastdonated = $_POST['lastdonated'];
        $mhistory = $_POST['mhistory'];
        
        $insert = $conn->prepare($statement);
        $insert->bindValue(':rollno' , $_SESSION['rollno']);
        $insert->bindValue(':name' , $name);
        $insert->bindValue(':email' , $email);
        $insert->bindValue(':gender' , $gender);
        $insert->bindValue(':phoneno' , $phoneno);
        $insert->bindValue(':whatsappno' , $whatsappno);
        $insert->bindValue(':bgroup' , $bgroup);
        $insert->bindValue(':b_month' , $b_month);
        $insert->bindValue(':b_year' , $b_year);
        $insert->bindValue(':lastdonated' , $lastdonated);
        $insert->bindValue(':mhistory' , $mhistory);
        $insert->execute();

      }
        // Pull details again after update
        $statement = "SELECT * FROM donors WHERE rollno = '".$_SESSION['rollno']."';"; 
        $query = $conn->query($statement);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $row = $query->fetch();

      // For a first time log in
      if(empty($row)){
        $row['name']="";
        $row['gender']="";
        $row['email']="";
        $row['phoneno']="";
        $row['whatsappno']="";
        $row['bgroup']="";
        $row['b_month']="";
        $row['b_year']="";
        $row['lastdonated']="";
        $row['mhistory']="";
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
            <label class="control-label col-sm-4" for="name">Roll NO:</label>
            <div class="col-sm-8">
                <input type="username" class="form-control" id="rollno" placeholder="Enter name" name="rollno" readonly value="<?php echo $_SESSION['rollno'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="name">Name:</label>
            <div class="col-sm-8">
                <input type="username" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $row['name'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="email">Email:</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $row['email'];?>" requireda>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="gender">Gender:</label>
            <div class="col-sm-8">
                <input type="radio" name="gender" value="male" <?php echo ($row['gender']=='male' ? ' checked': ($row['gender']==''?'checked':''));?>>Male
                <input type="radio" name="gender" value="female" <?php echo ($row['gender']=='female' ? ' checked': '');?>>Female
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="phoneno">Phone Number:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="phoneno" placeholder="Enter Phone Number" name="phoneno" value="<?php echo $row['phoneno'];?>" min="10" requireda>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="whatsappno">WhatsApp Number:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="whatsappno" placeholder="Enter WhatsApp Number" name="whatsappno" value="<?php echo $row['whatsappno'];?>" min="10">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="bgroup">Blood Group:</label>
            <div class="col-sm-8">
                <select class="form-control" id="bgroup" name="bgroup" requireda>
                  <option value="A+"<?php echo ($row['bgroup']=='A+'?'selected':'');?>>A+</option>
                  <option value="A-"<?php echo ($row['bgroup']=='A-'?' selected':'');?>>A-</option>
                  <option value="B+"<?php echo ($row['bgroup']=='B+'?'selected':'');?>>B+</option>
                  <option value="B-"<?php echo ($row['bgroup']=='B-'?'selected':'');?>>B-</option>
                  <option value="AB+"<?php echo ($row['bgroup']=='AB+'?'selected':'');?>>AB+</option>
                  <option value="AB-"<?php echo ($row['bgroup']=='AB-'?'selected':'');?>>AB-</option>
                  <option value="O+"<?php echo ($row['bgroup']=='O+'?'selected':'');?>>O+</option>
                  <option value="O-"<?php echo ($row['bgroup']=='O-'?'selected':'');?>>O-</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-4" for="age">Age:</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="b_month" name="b_month" placeholder="Enter Birth Month" name="b_month" min="1" max="12" value="<?php echo $row['b_month'];?>" requireda>
            </div>
            <!-- <label class="control-label col-sm-2" for="age">Age:</label> -->
            <div class="col-sm-4">
                <input type="number" class="form-control" id="b_year" name="b_year" placeholder="Enter Year of Birth" name="b_year" min="1970" max="2000" value="<?php echo $row['b_year'];?>" requireda>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="lastdonated">Date of Last Blood Donation:<br><small class="text-muted">(Leave Empty if you have ever donated before)</small></label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="lastdonated" name="lastdonated" value="<?php echo $row['lastdonated'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="mhistory">Medical History, if any:</label>
            <div class="col-sm-8">
                <textarea id="mhistory" class="form-control" name="mhistory" rows="3" width="100%" placeholder="Enter comments about any previous medical history"><?php echo $row['mhistory'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary center-block btn-block">Submit Details</button>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-info center-block btn-block" href="logout.php">Logout</a>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </form>
    <div class="col-lg-3 col-md-2 col-sm-1 hidden-xs"></div>
</body>
<script>
    // function validate() {
    //     //Checks against the valid rol number format of \w{2}\d{2}\w{1}\d{3}
    //     var rno_format = new RegExp(/(^([A-Z]{2})([0-9]{2})([A-Z]{1})([0-9]{3})$)/i);
    //     if (!(rno_format.test($("#  ").val()))) {
    //         alert("Incorrect Roll No.");
    //         return false;
    //     }
    //     return true;

    // }
</script>

</html>
