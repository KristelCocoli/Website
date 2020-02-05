<?php 
	include('server.php');
	//include('user/data.php');
	if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Parabellum</title>
    <link rel = "icon" href ="Image/logo.png"type = "image/x-icon"> 
    <link rel="stylesheet" href="user/CSS/styleLogin.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>

	<!-- Lidhja me bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Lidhja me JS -->
    <script src="JS/caroufredsel.js" type="text/JavaScript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <a href="" class="Logo"><img src="Image/logo.png"></a>
            <nav>
            <ul>
                <li><a href="user/index.php">HOME</a> </li>
                <li><a href="user/game.php">GAME</a> </li>
                <li><a href="user/download.php" >DOWNLOAD</a></span></li>
                <li><a href="user/about.php">ABOUT</a> </li>
                <li><a href="homepage.php">MY PROFILE</a> </li>
            </ul>
            </nav>
        </div>
    </div>
</header>

<?php if (isset($_SESSION['success'])) : ?>
	<div class="error success" >
		<h3>
			<?php  unset($_SESSION['success']); 	?>
		</h3>
	</div>
<?php endif ?>

<section class="background">
	<div class="content">
		<div class="row">
                <div class="col-sm-12 text-center">
					<div class="title">
						<!--<img src="images/user_profile.png"  >-->
						<h3>WELCOME TO YOUR PERSONAL <span>HELL</span></h3>
						<p>Now that you created your account you can access the full features of our website. <br>
						<span >!!Also if this is your first time logging in, please update your personal informations below !!</span><br>
						in order to have the right informations during the purchase of the game</p>
						<style>
							.content h3
								{
									color:white;
									font-family:prototype;
									font-size: 55px;
								}
							.btn-half:hover
								{color: rgb(51, 0, 51);}		
							.content
								{margin-top:-100px;	}
							.content .title span
								{color: rgb(168, 0, 168);} 
							.content p span
								{color:rgb(168, 0, 168);}
							.content p
								{
									color:white;
									font-family:Arial;
									font-size: 16px;
								}
						</style>
					</div>
					<div class="profile_info text-center">
				
						<?php  if (isset($_SESSION['user'])) : ?>
							<BR><br> <strong class="username"> INFORMATIONS</strong>
							<BR>	<strong class="username"> USERNAME: <span><?php echo $_SESSION['user']['username']; ?></span> </strong>
							<br>	<strong class="username"> EMAIL:<span> <?php echo $_SESSION['user']['email']; ?></span></strong>
							<br>    <strong class="username"> USER TYPE: <span><?php echo $_SESSION['user']['user_type']; ?></span></strong>
									<br><br><br>
								<small>
									<a href="homepage.php?logout='1'">LOGOUT</a>
								</small>
								<style>
									.username
										{
										font-family:prototype;;
										font-size:20px;
										color:white;
										}
									.profile_info a:hover
										{
										color:rgb(168, 0, 168);
										text-decoration:none;
										transition:.5s ease;
										}
								</style>
						<?php endif ?>
					</div>
				</div>
		</div>
	</div>

</section>


<section class="intro-area white" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h2 class="tit">PERSONAL INFORMATION</h2>
                    <div class="sub-head">
                        <p>
							The following information is needed for the generation of the purchase receipt <br>
							if you choose to purchase any of our products</p>
					</div>

				</div>
			</div>	
				
			<div class="row">
				<div class="col-sm-6 text-left">
					<div class="intro-block">
								<h6>UPDATE INFORMATIONS</h6>
					<form action="" method="POST">
						<?php echo display_error(); ?>
						<div class="input-group">
							<label></label><input type="text" placeholder="Full name" name="name" value="<?php echo $name; ?>" require>
						</div>
							<div class="input-group">
								<label></label>
								<input type="text" placeholder="Your address" name="address" value="<?php echo $address; ?>" require>
							</div> <br>
							<div class="input-group"> 
								<label>Gender</label>
								<select name="gender"placeholder="select one" id="gender"  require>
								<option value=""></option>
								<option value="male">Male</option>
								<option value="female">Female</option>
								</select>
							</div>
							<div class="input-group">
								<label></label>
								<input type="text" placeholder="Your age" name="age" require>
							</div>
							<div class="input-group">
								<label>Date of Birth</label>
								<input type="date" name="birth_date" value="<?php echo date('Y-m-d');//placeholder?> " require>
							</div>
							<div class="group">
 							    <input type="submit" class="button" value="Update" name="submit">
								 <!--funksioni i updateimit ndodhet te server.php-->
							</div>
						</div>
					</form>			
				</div>
				<div class="col-sm-6 text-left">
				<div class="intro-block">
				<h6>CURRENT INFORMATIONS</h6>					
						<strong > FULL NAME: <span><?php echo $_SESSION['data']['name']; ?></span> </strong>
					<br>	<strong > ADRRESS:<span> <?php echo $_SESSION['data']['address']; ?></span></strong>
					<br>    <strong > AGE: <span><?php echo $_SESSION['data']['age']; ?></span></strong>
					<br>    <strong > DATE OF BIRTH: <span><?php echo $_SESSION['data']['date_birth']; ?></span></strong>
					<br>    <strong > GENDER: <span><?php echo $_SESSION['data']['gender']; ?></span></strong>				
				</div>
            </div>
			</div>						
    	</div>
</section>

<section class="librari text-center" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <h2 class="tit">GAME LIBRARY</h2>
                    <div class="sub-head">
                        <p>
							The you own and that you can download are listed below</p>
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<?php 
					if (($_SESSION['game']['game1']==1)&&($_SESSION['game']['game2']==0)) 
					{
						echo '<span style="color:white; font-size:30px;font-family:prototype;">PARABELLUM</span>';
						echo '<a class = "downloadiHomepage" href=""><form action="downloadExe2.php" method="post">
						<input  type="submit"  class="downloadiHomepage2" name="submit" value="Download Game" />
					</form></a>';
					}	
					?>
					<?php 
					if(($_SESSION['game']['game2']==1)&&($_SESSION['game']['game1']==0))
					{
						echo '<span style="color:white; font-size:30px;font-family:prototype;">PARABELLUM, PREPARE TO DIE EDITION</span>';
						echo '<a class = "downloadiHomepage" href=""><form action="downloadExe2.php" method="post">
						<input  type="submit"  class="downloadiHomepage2" name="submit" value="Download Game" />
					</form></a>';
					}
					?>
					<?php 
					if(($_SESSION['game']['game2']==1)&&($_SESSION['game']['game1']==1))
					{
						echo '<img  src="Image/logo.png"> </i>';
						echo '<a class = "downloadiHomepage" href=""><form action="downloadExe2.php" method="post">
						<input  type="submit"  class="downloadiHomepage2" name="submit" value="Download Game" />
					</form></a>';
						echo '<br><br>';
						echo '<img  src="Image/logo.png"> </i>';
						echo '<span style="color:white; font-size:30px;font-family:prototype;">PREPARE TO DIE EDITION</span>';
						echo '<a class = "downloadiHomepage" href=""><form action="downloadExe2.php" method="post">
						<input  type="submit"  class="downloadiHomepage2" name="submit" value="Download Game" />
					</form></a>';
						//echo '<a class = "downloadiHomepage" href="">DOWNLOAD</a>';
					}
					?>
					<?php 
						if(($_SESSION['game']['game2']==0)&&($_SESSION['game']['game1']==0))
						{
							echo '<span style="color:white; font-size:30px;font-family:prototype;">You do not have any game currently</span>';
						}
					?>						
				</div>
			</div>
		</div>
</section>

<div id="mybutton">
<button class="butonGjendje">Logged In</button>
</div>

</body>

<script src="JS/main.js"></script>

</html>