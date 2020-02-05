<?php include('server.php') ?><!--duhet krijuar server.php qe ben tere lidhjen me databazen -->

<!DOCTYPE html>

<head>
    <title>Parabellum</title> <!---->
    <link rel = "icon" href =  
    "Image/logo.png" 
            type = "image/x-icon"> 
    <link rel="stylesheet" href="CSS/styleLogin.css">
    <script src="https://kit.fontawesome.com/yourcode.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--Latest compiled JavaScript -->
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
                        <li><a href="index.html">HOME</a> </li>
                        <li class="game"><a href="game.html">GAME</a> </li>
                        <li><span datahover="test" title="You should be registered to download the game"><a href="" class="disabled-link">DOWNLOAD</a></span></li>
                        <li><a href="about.html">ABOUT</a> </li>
                        <li class="login"><a href="login.php">LOGIN</a> </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="background" >

        <div class="container" >
            <div class="login-wrap">
                <div class="login-html">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                    <div class="login-form">
                        <div class="sign-in-htm">
                        <form method="post" action="login.php">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input type="text" name="username" class="input" value="<?php echo $username;?>">
                            </div>
                            <div class="group">
                                <label for="password" class="label">Password</label>
                                <input id="pass" name="password" type="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Sign In" name="login">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="#forgot">FORGOT PASSWORD?</a>
                            </div>
                        </div>
                        </form>

                        <div class="sign-up-htm">
                        <form method="post" action="login.php">
                            <?php echo display_error(); ?>
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input type="text" name="username" type="text" class="input" value="<?php echo $username;?>">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" name="pass1" type="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Repeat Password</label>
                                <input id="pass" name="pass2" type="password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Email Address</label>
                                <input type="email" name="email" type="text" class="input" value="<?php echo $email; ?>">
                            </div>
                            <div class="group">
                                <input type="submit" name="register" class="button" value="Sign Up">
                            </div><!--me name identifikohet te php ja . Pra nqs do t marresh kete te dhenene php e lidh
                            me name qe ka -->
                            <div class="hr"></div>
                            <div class="foot-lnk1">
                                <label for="tab-1">ALREADY A MEMBER?</a>
                            </div>
						    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

<div id="mybutton">
<button class="butonGjendje"> Not Logged In</button>
</div>

<script src="JS/main.js"></script>

</body>
</html>