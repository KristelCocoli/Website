<?php 

//$db=  mysqli_connect('localhost', 'root', '', 'signup');
include('db.php');
$name="";
$age;
$birth_date;
$address="";
$gender="";
$errors1=array();

$get_id=$_SESSION['user']['id']; 

if(isset($_POST['submit']))
{
    update();
}

function update()
{
    global $db,$errors1, $name, $address, $birth_date, $gender, $age;
    $name=e($_POST['name']);//e eshte funksion me vete. Merr si info names te input groups 
    $address=e($_POST['address']);
    $birth_date=e($_POST['birth_date']);
    $age=e($_POST['age']);
    $gender= e($_POST['gender']);



if(empty($name)){
array_push($errors1, "Name is required");
}

if(empty($address)){
array_push($errors1, "Address is required");
}

if(empty($gender)){
array_push($errors1, "Gender is required");
}

if( $age <1 && $age >120 ){
array_push($errors1, "Wrong number for age");
}

if(empty($birth_date) ){
    array_push($errors1, "Birthday date is required");
}


    if(count($errors1)==0)
    {
        //$get_id = $_GET('edit');
        /**Pjesa afishimit
        $selassoc=mysqli_fetch_assoc($qry);
        $id = $selassoc['id'];
        /**Pjesa updatetimit */
        $seledit ="UPDATE 'data' SET name=$name , address=$address, gender=$gender, age=$age, birth_date=$birth_date
        WHERE id=6";
        $qry = mysqli_query($db, $seledit);
        if($qry)
        {
            header("location: login.php");
        }
        
    }
}


function getUserById_data($id)
{
    global $db;
    $query = "SELECT * FROM data WHERE id=" .$id;/**sql. Kthen perdoruesin me id qe merr si input */
    $result = mysqli_query($db, $query);
    $user=mysqli_fetch_assoc($result);
    return $user;
}
 
function e1($val)
{
    global $db1;
    return mysqli_real_escape_string($db1, trim($val));
}

function display_error_data(){
    global $errors1;

    if(count($errors1)>0)
    {
     echo '<div class ="error">';
     foreach($errors1 as $error)
     {
      echo $error .'<br>';
	 }
	}
}
?>