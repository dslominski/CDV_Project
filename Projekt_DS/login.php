
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logowanie</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="sklep_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/orman.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />






<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" />
<script type="text/JavaScript" src="js/slimbox2.js"></script>

</head>
<body>

<div id="sklep_wrapper">
	<div id="sklep_header">
    	<div id="site_title"><a href="#">JimsKid</a></div>
    	<div id="sklep_search">
            <form action="#" method="get">
              <input type="text" value="Search..." name="keyword" id="keyword" title="keyword"
              				onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div>
    <div id="sklep_menu" class="ddsmoothmenu">
        <ul>
			<li><a href="index.php" class="selected"><font color="#00FFFB"> Strona główna </font color="#00FFFB"></a></li>
          <li><a href="login.php">Logowanie</a></li>
					<li><a href="register.php">Rejestracja</a></li>
					<li><a href="gelery.php">Galeria</a></li>
					<li><a href="contact.php">Kontakt</a></li>
        </ul>
        <br style="clear: center" />
    </div>

<p> <p> <p> <p> <p> <p>

    <?php
  require('db.php');
  session_start();
  // wstawianie wartosci
  if (isset($_POST['username'])){

  	$username = stripslashes($_REQUEST['username']);
          //usuwa znaki specjalne
  	$username = mysqli_real_escape_string($con,$username);
  	$password = stripslashes($_REQUEST['password']);
  	$password = mysqli_real_escape_string($con,$password);
  	//sprawdzanie czy uzytkownik istnieje
          $query = "SELECT * FROM `users` WHERE username='$username'
  and password='".md5($password)."'";
  	$result = mysqli_query($con,$query) or die(mysql_error());
  	$rows = mysqli_num_rows($result);
          if($rows==1){
  	    $_SESSION['username'] = $username;
              // odniesieni uzytkownika to strony chronionej-zalogowanie
  	    header("Location: index2.php");
           }else{
  	echo "<div class='form'>
  <h3>Nazwa użytkownika lub hasło są nieprawidłowe.</h3>
  <br/>Naciśnij tu aby <a href='login.php'>Zalogować</a></div>";
  	}
      }else{
  ?>
  <div class="form">
  <h1>Logowanie</h1>
  <form action="" method="post" name="login">
  <input type="text" name="username" placeholder="Username" required />
  <input type="password" name="password" placeholder="Password" required />
  <input name="submit" type="submit" value="Login" />
  </form>
  <p>Jeszcze się nie zarejestrowałeś?<a href='register.php'>Zrób to teraz!</a></p>
  </div>
  <?php } ?>










        <div class="clear"></div>
    </div>
    </div>
<div id="sklep_footer_wrapper">
    <div id="sklep_footer">
    	<p>Zapraszamy! <a href="#">Firma JimsKID</a></p>
    </div>
</div>
</body>
</html>
