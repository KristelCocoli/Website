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
    <tr><td>ID</td><td>Emri</td><td>Email</td><td>Parabellum1</td><td>Parabellum2</td></tr>
    <tr>
        <?php
            $sel = "SELECT * FROM users WHERE user_type='user'";//Zgjedhim te gjithe perdoruesat te tipit user ne databaze
            $qry_display1= mysqli_query($db, $sel);
        while($row1=mysqli_fetch_array($qry_display1) )
        {
                $f_id=$row1['id'];
                $f_username=$row1['username'];
                $f_email=$row1['email'];
                $sel2= "SELECT * FROM game WHERE id='$f_id'";
                $qry_display2= mysqli_query($db, $sel2);
                    while($row2=mysqli_fetch_array($qry_display2))
                        {
                            $f_game1=$row2['game1'];
                            $f_game2=$row2['game2'];
                           
                        }

                        echo "<tr><td>".$f_id."</td><td>".$f_username."</td><td>".$f_email."</td><td>"
            .$f_game1."</td><td>".$f_game2."</td></tr>";
           /* echo "<tr><td>".$f_id."</td><td>".$f_username."</td><td>".$f_email."</td><td>"
            .$f_game1."</td><td>".$f_game2."</td></tr>";*/
        }
?>

</tr>
</table>   
</body>
</html>