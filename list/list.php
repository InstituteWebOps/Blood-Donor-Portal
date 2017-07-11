<html>

<head>
    <title>List of Donors - Blood Donor Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="list_style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
        a,
    a:hover,
    a:visited,
    a:active {
        text-decoration: none;
        color: #eee;
    }
</style>

<body class="container">
    <!--<h1><span class="blue">List of </span>Donors<span class="blue"></span><br>
        <span class="yellow">Responsive</pan></h1>
    <h2>Created with love by <a href="http://pablogarciafernandez.com" target="_blank">Pablo García Fernández</a></h2>-->
    <div class="table">
        <div class=" text-center row thead">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 th text-center">Email ID</div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 th text-center">
                <a href="list.php?sortby=name">Name<small><span class="glyphicon glyphicon-eject"></span></small></a>
                </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 th text-center">Phone Number</div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 th text-center">Whatsapp Number</div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 th text-center">
                <a href="list.php?sortby=bgroup">Blood Grp<small><span class="glyphicon glyphicon-eject"></span></small></a></div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 th text-center">
                <a href="list.php?sortby=age">Age<small><span class="glyphicon glyphicon-eject"></span></small></a></div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 th text-center">
                <a href="list.php?sortby=lastdonated">Last Date of Donation<small><span class="glyphicon glyphicon-eject"></span></small></a></div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 th text-center">Medical History</div>
        </div>
        <div class="height"></div>
        <?php
require('../config/db.php');
//selecting and displaying data in a table
;
$query = $conn->query('SELECT * FROM donors ORDER BY '.(isset($_GET['sortby'])?$_GET['sortby']:"name").' ASC;');
    while($row = $query->fetch()) {
        echo 
    "<div class=\"text-center row trow tr\">
        <div class=\"col-lg-2 col-md-2 col-sm-12 col-xs-12 td text-center\">".$row['email']."</div>
        <div class=\"col-lg-2 col-md-2 col-sm-12 col-xs-12 td text-center\">".$row['name']."</div>
        <div class=\"col-lg-1 col-md-1 col-sm-12 col-xs-12 td text-center\">".$row['phoneno']."</div>
        <div class=\"col-lg-1 col-md-1 col-sm-12 col-xs-12 td text-center\">".$row['whatsappno']."</div>
        <div class=\"col-lg-1 col-md-1 col-sm-12 col-xs-12 td text-center\">".$row['bgroup']."</div>
        <div class=\"col-lg-1 col-md-1 col-sm-12 col-xs-12 td text-center\">".$row['age']."</div>
        <div class=\"col-lg-2 col-md-2 col-sm-12 col-xs-12 td text-center\">".$row['lastdonated']."</div>
        <div class=\"col-lg-2 col-md-2 col-sm-12 col-xs-12 td text-center\">".$row['mhistory']."</div>
    </div>";}
?>
    </div>
</body>

</html>