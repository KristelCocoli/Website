<!DOCTYPE html>
<html>
<head>
    <title>Parabellum</title>
    <link rel = "icon" href =  
    "Image/logo.png" 
            type = "image/x-icon"> 
    <link rel="stylesheet" href="CSS/style1.css">
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
                        <h2>GAME AND <span>SYSTEM</span> <br>
                            REQUIREMENTS</h2>
                        <p>
                            Before you procede to install our game we suggest to take the performance test <br>
                            first, in order for you to determine if either you can run Parabellum in your machine <br>
                            or not, in order to have the best experience possible.
                        </p>
                        <a href="#SearchSimilarGames123"  class="btn btn-half text-center" >SEARCH</a>
                    </div>

                </div>

            </div>
        </div>

    </section>



    <section class="intro-area white" id="intro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="tit">SYSTEM PARAMETERS</h2>
                    <div class="sub-head">
                        <p>
                            Down below we show you a suitable list of minimum parameters that are necessary
                            <br>to play Parabellum, as well as the list that we suggest to have in order to enjoy
                            the game at its fullest</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="intro-block">
                    <span class="intro-icon"><img class="custom-icon" src="Image/72175.png"></i></span>
                    <h3>MINIMUM REQUIREMENTS</h3>
                    <p>

                        CPU: Intel Core i3-2100/AMD FX-6300 <br>
                        GPU: NVIDIA® GeForce GTX 750 Ti / ATI Radeon HD 7950 <br>
                        MEMORY: 4 GB DDR4 <br>
                        OS: Windows 7, 8.1, 10 64bit <br>
                        PIXEL SHADER: 5.0 <br>
                        VERTEX SHADER: 5.0 <br>
                        SOUND CARD: DirectX 11 <br>
                        DISK SPACE: 25GB <br>
                        VIDEO RAM: 2048 MB <br>


                    </p>
                </div>



            </div>

            <div class="col-sm-6">
                <div class="intro-block">
                    <span class="intro-icon">
                        <img class="custom-icon"
                            src="Image/auto-meter-logo-png-car-meter-panel-power-speed-speedometer-tachometer-icon-512.png"></i>
                    </span>
                    <h3>RECOMMENDED REQUIREMENTS</h3>
                    <p>
                        CPU: Intel Core i7-5300/AMD FX-8350 <br>
                        GPU: NVIDIA® GeForce GTX 950 Ti / ATI Radeon R9 <br>
                        MEMORY: 8 GB DDR4 <br>
                        OS: Windows 7, 8.1, 10 64bit <br>
                        PIXEL SHADER: 5.1 <br>
                        VERTEX SHADER: 5.1 <br>
                        SOUND CARD: DirectX 11 <br>
                        DISK SPACE: 25GB <br>
                        VIDEO RAM: 4096 MB <br>
                    </p>
                    
                </div>

            </div>

        </div>

    </section>
    <!-- Game details -->
    <div class="fullscreen-video">
            <video width="960" controls autoplay muted >
                    <source src="Image/Bloodborne {GMV} One and all.mp4"  type="video/mp4">
                  </video>
       <!-- <video src="Image/Bloodborne {GMV} One and all.mp4" autoplay="true" loop="true"></video>-->
        <div class="content">
            <h1>GAMING COMMUNITY</h1>
           <P>We have an amazing gaming community where gamers always submit <br> gameplays, cool 
                moves and also ask question in order to be helped by <br> more experienced gamers.
                Also it is a great opportunity to find challengers <br> for more thrilling matchmakings and also new friendships. 
                Join us now: <br>
           </P>
          
           
           <img class="discord-logo-png-transparent" src="Image/discord-logo-png-transparent.png" alt="">
           <a href="https://discord.gg/nak2X2A" target="_blank" class="btn btn-half text-center">JOIN OUR DISCORT SERVER HERE</a>
           <P></P>
           <img class="discord-logo-png-transparent" src="Image/blue-reddit-icon-8.png" alt="">
           <a href="https://www.reddit.com/r/Parabellum_23/" target="_blank" class="btn btn-half text-center">JOIN OUR SUBREDDIT HERE</a>
        </div>
            <div class="gameplay">
            <img src="Image/Untitled-1.png" alt="">
            </div>
    </div>

    <div class="test">
        <div class="row">
            <div class="col-sm-12  text-center">
            <h2 class="title" id = "SearchSimilarGames123">SEARCH FOR SIMILAR GAMES IN OUR DATABASE</h2>


                   
            <div >
                        <form method = "post" action = "game.php">
                        <p>Select a genre of games to display:
                        <select class = "search2Button" name = "select">
                       
                      
                        <option>Action</option>
                        <option>Horror</option>
                        <option>Family</option>
                        <option>Adventure</option>
                        <option>Cmimi</option>

                        </select></p>
                        <p><input class = "search2Button" type = "submit" value = "Search"></p>
                        </form>
                         
                           
                        </div>
                        <div >
                        <form method = "post" action = "game.php">
                        <p>Select the information you want from our games:
                        <select class = "search2Button" name = "select2">
                       
                        <option>*</option>
                        <option>Emri</option>
                        <option>Lloji</option>
                        <option>Cmimi</option>
                      

                        </select></p>
                        <p><input class = "search2Button" type = "submit" value = "Search"></p>
                        </form>
                         
                           
                        </div>
                       
    <?php
        $db = mysqli_connect("localhost", "root", "", "signup");
        if(isset($_POST['select'])){
        $lloji = $_POST['select'];//NIVEL TJETER

        $sel = "SELECT * FROM othergames WHERE Lloji ='$lloji'";;//Zgjedhim te gjithe perdoruesat te tipit user ne databaze
        $qry_display1= mysqli_query($db, $sel);
        echo"<table class='search2'  border ='1'><thead><td><strong>Name</strong></td><td><strong>Game Genre</strong></td><td><strong>Game Price</strong></td></thead> ";
       
    while($row1=mysqli_fetch_array($qry_display1) )


    {
        $f_id=$row1['Emri'];
        $f_fullname=$row1['Lloji'];
                        $f_address=$row1['Cmimi'];
                        
      

        echo "<tr><td>".$f_id."</td><td>".$f_fullname."</td><td>".$f_address."</td></tr>";
    }
    echo"</table>";

}



if(isset($_POST['select2'])){
    $zgjedhje = $_POST['select2'];//NIVEL TJETER
    echo "<table class = 'search3' border = '1'>";
    $sel = "SELECT $zgjedhje FROM othergames";;//Zgjedhim te gjithe perdoruesat te tipit user ne databaze
    $qry_display1= mysqli_query($db, $sel);//ky eshte resulti
    
    while($row1=mysqli_fetch_row($qry_display1) )
    {
        print("<tr>");
    
        foreach ($row1 as $key => $value)
        print ("<td>$value</td>");
    
        print("</tr>");
    }
    echo "</table>";
/*/*=====================================BESIPAS LLOJIT*/
}




?>



























            </div>
        </div>
    </div>
<div id="mybutton">
        <button class="butonGjendje">Logged In</button>
</div>
    <script src="JS/main.js"></script>
</body>

</html>