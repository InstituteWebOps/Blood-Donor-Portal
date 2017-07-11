<html>

<head>
    <title>List of Donors - Blood Donor Portal</title>
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
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

        body {
               /*background-color: #3e94ec;*/
        background-color: rgba(249, 239, 239, 0.7);
        font-family: "Roboto", helvetica, arial, sans-serif;
        font-size: 16px;
        font-weight: 400;
        text-rendering: optimizeLegibility;
	overflow-x: hidden;
    }
</style>

<body>
    <h3 class="text-center">List of Donors <br><button class="text-center btn btn-small" onclick="window.location='/savealife/'"><span class="glyphicon 
glyphicon-home"></span> Back to Main Page</button></h3>
    <div class="table">
        <div class=" text-center row thead">
            <div class="col-xs-1 th text-center">
                <a href="list.php?sortby=name">Name<small><span class="glyphicon glyphicon-eject"></span></small></a>
            </div>
            <div class="col-xs-2 th text-center">Email ID</div>
            <div class="col-xs-2 th text-center">Phone Number</div>
            <div class="col-xs-1 th text-center">Whatsapp</div>
            <div class="col-xs-1 th text-right">
                <a href="list.php?sortby=bgroup">Blood Grp<small><span class="glyphicon glyphicon-eject"></span></small></a></div>
            <div class="col-xs-1 th text-center">
                <a href="list.php?sortby=age">Age<small><span class="glyphicon glyphicon-eject"></span></small></a></div>
            <div class="col-xs-2 th text-center">
                <a href="list.php?sortby=lastdonated">Last Date of Donation<small><span class="glyphicon glyphicon-eject"></span></small></a></div>
            <div class="col-xs-2 th text-center">Medical History</div>
        </div>
        <?php
require('../config/db.php');
//selecting and displaying data in a table
;
$query = $conn->query('SELECT * FROM donors ORDER BY '.(isset($_GET['sortby'])?$_GET['sortby']:"name").' ASC;');
    while($row = $query->fetch()) {
        echo 
    "<div class=\"text-center row trow tr\">
        <div class=\"col-xs-1 td text-center\">".$row['name']."</div>
        <div class=\"col-xs-2 td text-left\">".$row['email']."</div>
        <div class=\"col-xs-2 td text-right\">".$row['phoneno']."</div>
        <div class=\"col-xs-1 td text-center\">".$row['whatsappno']."</div>
        <div class=\"col-xs-1 td text-right\">".$row['bgroup']."</div>
        <div class=\"col-xs-1 td text-center\">".((date('Y')-$row['b_year'])+floor((1/12)*(date('m')-$row['b_month'])))."</div>
        <div class=\"col-xs-2 td text-center\">".($row['lastdonated']==""?"Never Donated Before":$row['lastdonated'])."</div>
        <div class=\"col-xs-2 td text-center\">".$row['mhistory']."</div>
    </div>";}
?>
    </div>
</body>

</html>
