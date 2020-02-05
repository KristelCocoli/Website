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
    <table>
    <tr>
        <?php
            $sel = "SELECT * FROM users WHERE user_type='user'";//Zgjedhim te gjithe perdoruesat te tipit user ne databaze
            $qry_display1= mysqli_query($db, $sel);
        while($row1=mysqli_fetch_array($qry_display1) )
        {
           
                $f_id=$row1['id'];
                $f_username=$row1['username'];
                $f_email=$row1['email'];
                $sel2= "SELECT * FROM data WHERE id='$f_id'";
                $qry_display2= mysqli_query($db, $sel2);
                    while($row2=mysqli_fetch_array($qry_display2))
                        {
                            $f_fullname=$row2['name'];
                            $f_address=$row2['address'];
                            $f_gender=$row2['gender'];
                            $f_age=$row2['age'];
                            $f_date_of_birth=$row2['date_birth'];
                        }

            echo "<tr><td>".$f_id."</td><td>".$f_username."</td><td>".$f_email."</td><td>"
            .$f_fullname."</td><td>".$f_address."</td><td>"
            .$f_gender."</td><td>".$f_age."</td><td><a href='edit.php?edit=".$f_id."'>Modifiko</a></td><td><a href='delete.php?delete=".$f_id."'>Fshi</a></td></tr>";
        }
?>

</tr>
</table>   
</body>
</html>