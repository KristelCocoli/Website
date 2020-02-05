<?php 
include('../server.php');

//NESE FUNKSINI I DEKLARUAR TEK server.php NUK KTHEN true ATEHERE DUHET TE DALIM NGA PANELI I ADMINISTRIMIT
if (!isAdmin()) {
	$_SESSION['msg'] = "Duhet te logohesh serisht per te hyre ne kete panel";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header 
			{
			background: #003366;
			}
		button[name=register_btn] 
			{
			background: #003366;
			}
	</style>
</head>

<body>
	<div class="header">
		<h2>Qendra e kontrollit te admineve</h2>
	</div>
	<div class="content">
		<!-- Kontrollon serisht nese jemi loguar ne rregull duke kontrolluar a eshte gjeneruar sesioni 'succes'  -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- INFORMACIONET E ADMINISTRATORIT -->
		<div class="profile_info">
			<div>
				
				<?php  //KODI PHP PER MENUTE DHE TE DHENAT E ADMINIT
				if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br><!--Sherben per te afishuar llojin e perdoruesit (admin)-->
					   	<br> <a href="create_user.php" target="_blank"> + Shto perdorues</a>
					  	<br> <a href="databaze.php"> + Akseso dhe modifiko databazen</a>
						  <br> <a href="afisho_gjini.php"> + Kerkim Sipas Gjinise</a>
						  <br> <a href="afisho_mosh.php"> + Kerkim Sipas Moshes</a>
					   	<br> <a href="statistika.php"> + Bilancet e blerjeve</a>
					  	<br><br> <a href="home.php?logout='1'" style="color: red;">Shkycu</a>
					</small>
				<?php endif ?>

			</div>
		</div>
	</div>
</body>
</html>