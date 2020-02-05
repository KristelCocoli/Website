<?php 
//SHTOJME DOKUMENTIN KRYESOR PER TE PERDORUR LIDHJEN QE KEMI KRIJUAR ME DATABAZEN singup
include('../server.php');

//NESE SHKYCEMI NGA FAQJA MBYLLIM TE GJITHA SEKSIONET AKTIVE
if (isset($_GET['logout'])) {
	session_destroy();
    unset($_SESSION['user']);
    unset($_SESSION['data']);
    unset($_SESSION['game']);
    header("location: ../login.php");
}

//DEKLAROJME VARIABLAT PER KRAHASIM
$both="both";
$one="one";
$two="two";
$err=array();//VEKTORI I CILI DO MBAJE STRINGAT E GABIMEVE

//=====================================================================
//                    NESE SHTYPET BUTONI I BLERJES
//=====================================================================

if(isset($_POST['buy_game']))
{
    $selection=$_POST['buy'];//TEK SELECTION DO TE RUHET ZGJEDHJA E PERDORUESIT (both/one/two)
    $buy_id=$_SESSION['game']['id'];//AKSESOJME ID TE PERDORUESIT DHE E RUAJME TEK $buy_id

//NESE ZGJEDH TE BLEJE TE DY LOJRAT:
    if(strcmp($selection,$both )==0) 
    {    
        //KONTROLLOJME NESE PERDORUESI E KA BLERE ME PARE KETE LOJE
        if(($_SESSION['game']['game1']==1)||($_SESSION['game']['game2']==1))
        {
            
            //NESE E KA NE GJENDJE DO TE AFISHOHET GABIMI I MEPOSHTEM
            array_push($err, "You already have a game in your library and cannot buy both!");
        }
        else   //NESE NUK E KA BLERE MODIFIKOJME DATABAZEN
        {
            $buy1="UPDATE game SET game1=1, game2=1 WHERE id='$buy_id'";//NE DATABAZE FIGUROJNE TE BLERA
            $qry_buy1=mysqli_query($db, $buy1);

            if($qry_buy1)//NESE PYETSORI ESHTE I SUKSESSHEM, PRINTOJME FATUREN
                {
                    unset($_SESSION['game']);//Mbyllim sesionin paraardhes per te gjeneruar te riun me te dhenat e updatetuara
                    $_SESSION['game']=getGameById($buy_id);//Sesioni i ri me blerjen me te fundit
                    header("location: fatura3.php");
                }
        }    
    }
//NESE ZGJEDH VETEM LOJEN E PARE:
    elseif(strcmp($selection,$one )==0) 
    {
        //KONTROLLOJME NESE E KA BLERE LOJEN ME PARE
        if(($_SESSION['game']['game1']==1))
        {
            //NESE E KA NE GJENDJE DO TE AFISHOHET GABIMI I MEPOSHTEM
            array_push($err, "You already have purchased this game");
        }
        else//NESE NUK E KA BLERE ME PARE
        {
            $buy2="UPDATE game SET game1=1, game2=game2 WHERE id='$buy_id'";
            $qry_buy2=mysqli_query($db, $buy2);

            if($qry_buy2)
            {
                unset($_SESSION['game']);
                $_SESSION['game']=getGameById($buy_id);
                header("location: fatura.php");
            }
        }
    }
//NESE ZGJEDH TE BLEJE TE DYTEN
    else if (strcmp($selection,$two )==0)
    {
        //KONTROLLOJME NESE E KA BLERE ME PARE
        if(($_SESSION['game']['game2']==1))
        {
            //NESE E KA NE GJENDJE DO TE AFISHOHET GABIMI I MEPOSHTEM
            array_push($err, "You already have purchased this game");
        }
        else
        {
            $buy3="UPDATE game SET game1=game1, game2=1 WHERE id='$buy_id'";
            $qry_buy3=mysqli_query($db, $buy3);

            if($qry_buy3)
                {
                    unset($_SESSION['game']);
                    $_SESSION['game']=getGameById($buy_id);
                    header("location: fatura2.php");
                }
        }
    }
}

function display_err()//BEN AFISHIMIN E STRINGAVE QE KA PER ELEMENTE QE JANE GABIMET GJATE PAGESES
{
    global $err;//Perdorim vektorin qe deklaruam ne fillim
    if(count($err)>0) 
    {
        echo '<div class ="error">';
        foreach($err as $error)
        {   echo $error .'<br>';  }
	}
}

?>
<!DOCTYPE html>
<head>
    <title>Parabellum</title>
    <link rel = "icon" href =  
    "Image/logo.png" 
            type = "image/x-icon"> 
    <link rel="stylesheet" href="CSS/styleDown.css"> 
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
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
                        <li><a href="index.php">HOME</a> </li>
                        <li><a href="game.php">GAME</a> </li>
                        <li><a href="download.php" >DOWNLOAD</a></span></li>
                       <!--<li><a href="" class = "disable" title = "You should be registered to download the game">DOWNLOAD</a> </li>
                       -->
                        <li><a href="about.php">ABOUT</a> </li>
                        <li><a href="../homepage.php">MY PROFILE</a> </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class="background">

<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="title">
                <h2>JOIN THE <span>ACTION</span> NOW  </h2>
                <p>
                    Now that you are logged in you can buy the game and see all the orders and extra features that the website offers.
                </p>
                <a  class="btn btn-half text-center" href="#TakeMeThereID">TAKE ME THERE</a><!--Fute ketu-->
            </div>

        </div>

    </div>
</div>
</section>

<section class="intro-area white" id="intro">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="tit">GAME PURCHASES</h2>
                <div class="sub-head">
                <p>
                    Down below we show you the list of game that our company has developed
                    <br>and the prizes are listed below the game icon. To buy the game just click the purchase button
                    and you will be redirected to purchase tab</p>
                </div>
            </div>
        </div> <!--FUNDI I RRESHTIT TE PARE-->
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="intro-block">
                    <span class="intro-icon"><img class="custom-icon" src="Image/one.png"></i></span>
                        <h3>PARABELLUM </h3>
                        <p>Purchase the base version of the game with all the build in features and multiplayer functionality <br><br>
                            <img class="logogame" 
                            src="Image/logo1.png"></i> <br> <br>
                            <span>COST: 29.99$</span> 
                        </p>    
                </div>
            </div>

            <div class="col-sm-6">
                <div class="intro-block">
                    <span class="intro-icon">
                        <img class="custom-icon"
                            src="Image/two.png"></i>
                    </span>
                    <h3>PARABELLUM PREPARE TO DIE EDITION</h3>
                    <p>Purchase a better but much harder version of the game <br> with just a higher price, but way better experience. <br><br>
                        <img class="logogame" 
                        src="Image/logo2.png"></i> <br> <br>
                        <span>COST: 39.99$</span>
                    </p>
                </div>
            </div>
        </div>
</section>

<section class="selection">
<div class="container">
            <div class="row">
                <div class = "poshteBackgroundChooseGame">
                <div class="col-sm-12 text-center">
                <a id="TakeMeThereID" >  <h2 style="color:white;">CHOOSE GAME TO PURCHASE</h2></a>
                </div>
                <!--================================================--> 
                <!--            SHFAQJA E GABIMEVE                  --> 
                <?php echo display_err(); ?>
                <!--================================================--> 
              <div class = "perrethFooter">
                <form action="" method="POST">
                <div >
                        <select class = "footerDownload100" name="buy" id="buy" >
			            	<option value="both">Both</option>
			            	<option value="one">Parabellum</option>
			            	<option value="two">Parabellum, Prepare to Die Edition</option>
                        </select>
</div>
                        <input class="footerDownload100Butoni" type="submit" name="buy_game" value="Purchase Now">
                        <img class="basket1Klasa" src = "Image\basket1.png">
                </form>
</div>
            </div>
        </div>
</div>
</section>

<!--================================================--> 
<!--       TREGON NESE JEMI LOGUAR APO JO           -->
<div id="mybutton">
<button class="butonGjendje">Logged In</button>
</div>
<!--================================================--> 

<script src="JS/main.js"></script>
</body>
</html>