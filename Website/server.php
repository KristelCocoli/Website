<?php
//BEJME LIDHJEN ME BATABAZEN localhost ME TE DREJTA root TEK BATABAZA signup
$db = mysqli_connect("localhost", "root", "", "signup");

session_start();

//INICIALIZOJME VARIABLAT QE DO MERREN SI INPUT GJATE REGJISTRIMIT
$username="";
$email="";
$pass1="";//PASSWORDI PRIMAR
$pass2="";//PASSWORDI I KONFIRMIMIT
$errors=array();//DO TE RUAJME GABIMET GJATE PROCEDURES SE REGJISTRIMIT

//=======================================================================
//					     REGJISTRIMI I PERDORUESIT
//=======================================================================
if(isset($_POST['register']))
{
	register();//Therrasim funksionin register()
	 
}

function register()
{
	global $db, $errors, $username , $email;//Perdorim variablat globale te inicializuara me larte
	//FUNKSIONI e(input) ESHTE INICIALIZUAR ME POSHTE 
	$username=e($_POST['username']);
    $pass1=e($_POST['pass1']);
    $pass2=e($_POST['pass2']);
    $email=e($_POST['email']);

	if(empty($username))
	{array_push($errors, "Username is required");}

	if(empty($pass1))
	{array_push($errors, "Password is required");}

	if(empty($pass2))
	{array_push($errors, "Re-entering your password is required");}

	if(empty($email))
	{array_push($errors, "email is required");}


	if($pass1 != $pass2)
	{array_push($errors, "Passwords don't match");}

	if(count($errors)==0)
	{
		$qry1="SELECT * FROM users WHERE username='$username'";
		$result1=mysqli_query($db, $qry1);

		if($result1)
		{
			array_push($errors, "Usename is already taken");
		}
		else
		{
			$qry2="SELECT * FROM users WHERE email='$email'";
			$result2=mysqli_query($db, $qry2);
			if($result2)
			{
				array_push($errors, "This email is being used in another account");
			}
		}
	}

	if(count($errors)==0)
	{
		$password= md5($pass1); //Enkripton passwordin
		
		if (isset($_POST['user_type']))//KY KUSHT PLOTESOHET VETEM NESE REGJISTRIMI
		//DO TE  BEHEJ NGA ADMINI PASI TEK SIGNUP PER USER NUK MARRIM user_type
		{
			//REGJISTRIMI NGA PANELI I ADMINISTRATORIT:
				$user_type = e($_POST['user_type']);//Lexojme user_type

				$query = "INSERT INTO users (username, password, user_type, email)
						  VALUES('$username', '$password', '$user_type','$email' )";//Bejme pyestorin
				mysqli_query($db, $query);//Aplikojme mbi databazen $db

			//KRIJIMI I 2 BATABAZAVE TE TJERA data DHE game
			$logged_in_user_id = mysqli_insert_id($db);//Marrim id e perdoruesit qe sapo krijuam

			$query1 = "INSERT INTO data(id) VALUES ('$logged_in_user_id')";
			mysqli_query($db, $query1);//Pyetsor per data

			$query2 = "INSERT INTO game(id, game1, game2) VALUES('$logged_in_user_id', '0','0')";
			mysqli_query($db, $query2);//Pyetsor per game
		
		$_SESSION['success']="New user successfully created";
		//header('location: .../admin/create_user.php');
		}else {
			$query = "INSERT INTO users (username, password, user_type, email)/**pjesa e sql. insert te useri, ato te dhena.Ka rendesi
			renditja.Kete te dhene nga databaza */
            VALUES ('$username', '$password', 'user', '$email')";//shto se eshte automatikisht user nga signupi
			mysqli_query($db, $query);//databaza db qe eshte lidhur me signup , aplikoji pyetsorin

	//marrim id te userit qe u krijua
	$logged_in_user_id = mysqli_insert_id($db);
	$query1 = "INSERT INTO data(id) VALUES ('$logged_in_user_id')";
	mysqli_query($db, $query1);
	$query2 = "INSERT INTO game(id, game1, game2) VALUES('$logged_in_user_id', 0,0)";
	mysqli_query($db, $query2);
	$_SESSION['user'] = getUserById($logged_in_user_id);
	$_SESSION['data'] = getDataById($logged_in_user_id);
	$_SESSION['game'] = getGameById($logged_in_user_id);
	$_SESSION['success'] = "You are now logged in";
	header('location: homepage.php');//i ben redirect ketu . Funksion i php
	}
	}
}

//=======================================================================
//					     SHKYCJA E PERDORUESIT/ADMIN
//=======================================================================

if (isset($_GET['logout'])) 
{
	session_destroy();//Mbyll sesionin e krijuar ne fillim te server.php
		unset($_SESSION['user']);
		unset($_SESSION['data']);//qe kur te bejme login nje perdorues tjeter te jene sessionet e te riut jo e te vjetrit
		unset($_SESSION['game']);
	header("location: login.php");//Bejme redirect tek faqja e login
}

//=======================================================================
//					     UPDATETIMI I TE DHENAVE 
//=======================================================================
//DEKLAROJ VARIABLAT QE DO DUHEN PER UPDATETIMIN E TE DHENAVE NGA PERDORUESI
//DATABAZA data

$name="";
$age;
$birth_date;
$address="";
$gender="";
$errors1=array();

if(isset($_POST['submit']))//Nese perdoruesi klikon sumbit tek MY PROFILE
{
	update(); 
}

function update()
{
    global $db,$errors1, $name, $address, $birth_date, $gender, $age;
    	$name=e($_POST['name']); 
		$address=e($_POST['address']);//kjo e merr nga inputi i jashtem 
    	$birth_date=e($_POST['birth_date']);
    	$age=e($_POST['age']);
    	$gender= e($_POST['gender']);
	
	if(empty($name))
	{array_push($errors1, "Name is required");}

	if(empty($address))
	{array_push($errors1, "Address is required");}

	if(empty($gender))
	{array_push($errors1, "Gender is required");}

	if( $age <1 && $age >120 )//Kontrollojme nese mosha eshte nje numer qe ka kuptim	
	{array_push($errors1, "Wrong number for age");}

	if(empty($birth_date))
	{array_push($errors1, "Birthday date is required");}

    if(count($errors1)==0)
	{//updateimi i te dhenave do te kerkohet vetem nga perdoruesi sepse admini ka algoritem tjeter
		//perdoruesi eshte already logged in . pra nqs logohemi i kemi te gjithe te dhenat e userit.
		$id= $_SESSION['user']['id'];//Marrim id e perdoruesit qe ka kerkuar update te dhenash
		
		$query3 =  "UPDATE data SET name='$name',address='$address', gender='$gender', age='$age',date_birth='$birth_date'
					WHERE id='$id'";//Modifikojme te dhenat kur id eshte sa id qe ka kerkuar perditesim
		//ketu eshte name = $name sepse do te veme name te ri. Nqs do e linim njesoj do e benim name = name. pra dhe nqs s do ta 
		//ndryshosh nje variabel prape do  e vesh por psh user = user
		$result3=mysqli_query($db, $query3) or die("bad query: $query3");

		//Mbyll sesionin ekzistues te data qe te hapim te riun me te dhenat e updateuara
		unset($_SESSION['data']);
		$_SESSION['data']=getDataById($id);
    }
}

//=======================================================================
//					     KYCJA E PERDORUESIT 
//=======================================================================

if (isset($_POST['login']))
{
	login();
}

function login()
{
	global $db, $username, $errors; 
	//LEXOJME TE DHENAT NGA INPUTET ME FUNKSIONIN e 
		$username = e($_POST['username']);
		$password = e($_POST['password']);//lexoj 

	if (empty($username)) 
	{array_push($errors, "Username is required");}

	if (empty($password)) 
	{array_push($errors, "Password is required");}

	if (count($errors) == 0) //Nese perdoruesi nuk ka bere gabime gjate loginit
	{
		$password = md5($password);//Perdor te njejtin hash qe te jete si passwordi ne databaz

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";//limiti 1 se s mund te ket 2 me te dyja
		$results = mysqli_query($db, $query);

		//KONTROLLOJ NESE EKZISTON NJE PERDORUES ME TE DHENAT E MARRA
		if (mysqli_num_rows($results) == 1) 
		{
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') //Nese eshte admin
			{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "Ju jeni te kycur ne panelin e administrimit";
				header('location: admin/home.php');		  
			}
			else //Nese eshte user
			{
				$_SESSION['user'] = $logged_in_user;//Inicializoj sesionin qe do perdoret.Pra i kam marre tere te dhenat e user dhe i aksesoj kur dua
				$_SESSION['success']  = "You are now logged in";
				$log_id=$_SESSION['user']['id'];
				$_SESSION['data'] = getDataById($log_id);//Inicializoj sesionin qe do perdoret 
				$_SESSION['game'] = getGameById($log_id);//Inicializoj sesionin qe do perdoret
				header('location: user/index.php');
			}
		}
		else 
		{array_push($errors, "Wrong username/password combination");}
	}
}

//FUNKSIONET 

//Kthen rreshtin e databazes user me id sa inputi
function getUserById($id)
{
    global $db;
    	$query = "SELECT * FROM users WHERE id=" .$id;/**sql. Kthen perdoruesin me id qe merr si input */
   		$result = mysqli_query($db, $query);
    	$user=mysqli_fetch_assoc($result);//komplet c ka useri 
    return $user;//ktheje komplet permbajtjen
}

//Kthen rreshtin e databazes game me id sa inputi
function getGameById($id)
{
    global $db;
    	$query = "SELECT * FROM game WHERE id=" .$id;/**sql. Kthen perdoruesin me id qe merr si input */
    	$result = mysqli_query($db, $query);
    	$user=mysqli_fetch_assoc($result);
    return $user;
}

//Kthen rreshtin e data user me id sa inputi
function getDataById($id)
{
    global $db;
    	$query = "SELECT * FROM data WHERE id=" .$id;/**sql. Kthen perdoruesin me id qe merr si input */
    	$result = mysqli_query($db, $query);
    	$user=mysqli_fetch_assoc($result);
    return $user;
}

//Kthen stringen e lexuar nga inputi
function e($val)
{
    global $db;
    	return mysqli_real_escape_string($db, trim($val));
}

function display_error()
{
    global $errors;
    if(count($errors)>0)
    {
    	echo '<div class ="error">';
     	foreach($errors as $error)
    		{
    		echo $error .'<br>';
			}
	}
}	

function isLoggedIn()
{
    if (isset($_SESSION['user']))//Nqs eshte inicializuar nje session user 
    	{return true;}
	else 
		{return false;}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) 
		{return true;}
	else
		{return false;}
}
?>