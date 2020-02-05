<?php
include('../server.php');
?>

<!DOCTYPE html>
<html><!--Funksionaliteti  i adminit qe ti behet add user-->
<head>
<title></title>
    <style type="text/css">
        table
        {
        border:1px solid black;
        border-collapse: collapse;
        }
        td
        {
        border:1px solid black;
        padding:10px;
        }
    </style>
</head>

<body>
<form action = "afisho_gjini.php" method = "post">
<select name = "gender">
        <option value = 'female'>Femer</option>
        <option value = 'male'>Mashkull</option>

</select>
<button type = "submit">Kerko</button>
</form>





    <table>
    <tr>
        <?php
        if(isset($_POST['gender'])){
        $gender = $_POST['gender'];//NIVEL TJETER

        $sel = "SELECT * FROM data WHERE gender='$gender'";;//Zgjedhim te gjithe perdoruesat te tipit user ne databaze
        $qry_display1= mysqli_query($db, $sel);
    while($row1=mysqli_fetch_array($qry_display1) )
    {
        $f_id=$row1['id'];
        $f_fullname=$row1['name'];
                        $f_address=$row1['address'];
                        $f_gender=$row1['gender'];
                        $f_age=$row1['age'];
                        $f_date_of_birth=$row1['date_birth'];
      

        echo "<tr><td>".$f_id."</td><td>".$f_fullname."</td><td>".$f_address."</td><td>"
        .$f_gender."</td><td>".$f_age."</td><td>".$f_date_of_birth."</td></tr>";
    }
}
    



?>

</tr>
</table>   
</body>
</html>
