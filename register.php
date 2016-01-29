<?php
session_start();
include_once("_dbinfo.php");
// si pas connecte, on doit s'identifier
if(isset($_SESSION['isLogin']) || $_SESSION['isLogin']==1){
    header("location:index.php");
    exit;
    ?>
<html>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>  

    <script language="javascript">
    $(function() {
        $("#birthday").datepicker();
    
    });
    </script>
    

<style>
    body{
      background-image: url(images/flag_background.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-color: #464646;
    
    }
    
    div.well{
      height: 250px;
    } 
    
    .Absolute-Center {
      margin: auto;
      position: absolute;
      top: 0; left: 0; bottom: 0; right: 0;
    }
    
    .Absolute-Center.is-Responsive {
      width: 50%; 
      height: 50%;
      min-width: 200px;
      max-width: 400px;
      padding: 40px;
    }
    
    </style>


<body>


<div class="container">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div class="col-sm-6 col-md-6 col-md-offset-1">
                <form action="register_check.php" id="registerForm" methode="post">
                <div class="form-group input-group">                   
                    <input class="form-control" type="text" name='lastname' placeholder="Nom"/>          
                </div>
                
                <div class="form-group input-group">                   
                    <input class="form-control" type="text" name='firstname' placeholder="Prénom"/>          
                </div>
                <div class="form-group input-group">                   
                    <input class="form-control" type="text" name='birthday' placeholder="Date de naissance (JJ/MM/AAAA)"/>          
                </div>
                <div class="form-group input-group">                   
                    <input class="form-control" type="text" name='club' placeholder="Club"/>          
                </div>                                
                                
                <div class="form-group input-group">                   
                    <input class="form-control" type="text" name='username' placeholder="licence"/>          
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control" type="password" name='password1' placeholder="Saisir votre mot de passe"/>
                    <input class="form-control" type="password" name='password2' placeholder="Confirmez votre mot de passe"/>     
                </div>
                
                <div class="form-group input-group">
                    <select class="form-control" name="genre">
                        <option>Sélectionner votre genre</option>
                        <option value="G">Je suis un garçon/homme</option>
                        <option value="F">Je suis une fille/femme</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <button type="submit" id="register" name="register" class="btn btn-def btn-block">Envoyer</button>
                </div>
                <div class="form-group text-center">
                    Retour vers l'<<a href="index.html">accueil</a>
                </div>
                </form>
                <div id="error"></div> 
                        
            </div>  
        </div>    
    </div>
</div>
</body>
</html>