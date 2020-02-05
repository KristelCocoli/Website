<?php 
include('../server.php');

$id_edit = $_GET['edit'];//Marrim variablin edit kur shtypet 'Modifiko' nga databaze.php

//PERZGJEDHIM RRESHTAT E BATABAZEZ QE KANE KETE id 
$edit_sel="SELECT * FROM users WHERE id=$id_edit"; //Te dhenat e log init
$edit_sel2="SELECT * FROM data WHERE id=$id_edit"; //Te dhenat personale

$edit_qry = mysqli_query($db,$edit_sel);
$edit_qry2 = mysqli_query($db,$edit_sel2);

//RUAJME REZULTATET E PYETSOREVE TEK $temp DHE $temp2
$temp = mysqli_fetch_assoc($edit_qry);
$temp2 =mysqli_fetch_assoc($edit_qry2);

//Lexojme te dhenat ekzistuese ne keto dy databaza dhe i ruajme tek variablat e reja
$id = $temp['id'];
$username = $temp['username'];
$email = $temp['email'];
$pass = $temp['password'];
$name = $temp2['name'];
$age = $temp2['age'];
$date_birth=$temp2['date_birth'];
$gender = $temp2['gender'];
$address = $temp2['address'];
$user_type= $temp['user_type'];

//NESE SHTYPET update
if(isset($_POST['update_data']))
{
    //Te dhenat qe nuk do modifikohen:
    $n_id=$id;
    $n_username=$username;
    $n_password=$pass;
    //Te dhenat e reja qe fusim ne si administrator
    $n_name=$_POST['n_name'];
    $n_user_type=$_POST['n_user_type'];
    $n_email=$_POST['n_email'];
    $n_gender=$_POST['n_gender'];
    $n_date_birth=$_POST['n_date_birth'];
    $n_age=$_POST['n_age'];
    $n_address=$_POST['n_address'];

    //Bejme pyetsoret per update te te dhenave
    $edit1="UPDATE users SET username='$n_username', password='$n_password', user_type='$n_user_type', email='$n_email' WHERE id='$n_id'";
    $edit2="UPDATE data SET  name='$n_name', address='$n_address', gender='$n_gender', age='$n_age', date_birth='$n_date_birth' WHERE id='$n_id'";

    //Aplikoj pyetsoret tek databaza db
    $qry_edit1=mysqli_query($db, $edit1);
    $qry_edit2=mysqli_query($db, $edit2);

    if(($qry_edit1)&&($qry_edit2))
    {header("location: databaze.php");}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
<body>
    <form action="" method="POST">
    <input type="text" name="n_name" value="<?php echo $name ?>"> <!--Value sherben per te paraqitur te dhenat ekzistuese
                                        dhe eshte ndihmes per adminin per ato te dhena qe nuk do te modifikohen -->
    <select name="n_user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
    </select>
    <input type="text" name="n_email" value="<?php echo $email ?>">
    <input type="text" name="n_gender" value="<?php echo $gender ?>">
    <input type="date" name="n_date_birth" value="<?php echo $date_birth ?>">
    <input type="text" name="n_age" value="<?php echo $age ?>">
    <input type="text" name="n_address" value="<?php echo $address ?>">
    <input type="submit" name="update_data" value="Update">
    </form>
</body>
</html>   