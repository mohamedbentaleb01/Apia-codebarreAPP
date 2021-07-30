<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <title>BarcodeApp-PFE</title>
  <link rel="shortcut icon" type="image/" href="images/back.png"/>
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background-image: url('img.png');
      /* background-repeat: no-repeat; */
      background-size: 100%;
      backdrop-filter: blur(12px);
    }



    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #017115;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #017115;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
       <img  style="width: 140px;" src="apia.png" alt="" /> <div align="center" style="font-family: cursive; color:#EEE;">Les terroirs Marocains</div>
      <div class="section"></div>

      <h5 class="green-text"><b>Se connecter dans votre espace</b></h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
        <?php
          require('connexion.php');
          session_start();
          if (isset($_POST['username'])){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);
              $query = "SELECT * FROM magasinier WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn,$query) or die('Erreur : ' .$conn->connect_error);
            $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['username'] = $username;
                header("Location: status.php?status=connected");
                
            }else{
              $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
          }
          ?>
          <form class="col s12" action="" method="post" name="login">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name="username" required  />
                <label for='username'><img align="left" style="width:22px;" src="face.png" alt=""/>Entrer nom d'utilisateur</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name="password" required/>
                <label for='password'><img align="left" style="width: 22px;" src="pass.png" alt=""/>Entrer votre mot de passe</label>
              </div>
              <label style='float: right;'>
								<a class='green-text' href='#!'><b>Vous êtes nouveau ici? </b></a>
							</label>
            </div>

            <?php if (! empty($message)) { ?>
                <p class="errorMessage" style="color:red;"><?php echo $message; ?></p>
                <?php } ?>
            <br />
            <center>
              <div class='row'>
                <button type='submit' name="submit" class='col s12 btn btn-large waves-effect green'>Connexion</button>
              </div>
            </center>
          </form>
        </div>
        
      </div>
      
    </center>

    <div class="section"></div>
    <div class="section"></div>
    
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>