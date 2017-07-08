<html>
<head>
<style>
    td:hover{
        background-color:grey;
    }
    table{
    background-color: white;
    border-style: solid;
    border-width: 5%;
    border-color: grey;
    }
</style>    
<?php
require('db.php');
//selecting and displaying data in a table

$query = $conn->query('SELECT * FROM donors');

    echo '<table style="width:100%" border: 5px solid black" > <tr>';
    echo '<th> Name </th>';
    echo '<th> Email ID </th>';
    echo '<th> Phone Number </th>';
    echo '<th> Whatsapp Number </th>';
    echo '<th> Blood Group </th>';
    echo '<th> Age </th>';
    echo '<th> Last Date Of Donation </th>';
    echo '<th> Medical History </th>';
    echo '</tr>';
    while($row = $query->fetch()) {
        
        echo '<tr>';
        echo '<td>';
        echo $row['name'];
        echo '</td>';
        echo '<td>';
        echo $row['email'];
        echo '</td>';
        echo '<td>';
        echo $row['phoneno'];
        echo '</td>';
        echo '<td>';
        echo $row['whatsappno'];
        echo '</td>';
        echo '<td>';
        echo $row['bgroup'];
        echo '</td>';
        echo '<td>';
        echo $row['age'];
        echo '</td>';
        echo '<td>';
        echo $row['lastdonated'];
        echo '</td>';
        echo '<td>';
        echo $row['mhistory'];
        echo '</td>';
        echo '</tr>';

    } 
    echo '</table>';

    ?>