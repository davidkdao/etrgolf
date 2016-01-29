<?php
session_start();
include_once("_dbconfig.php");
// deja connecte, ok
if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']){
    header("location:sidentifier_ok.php");
    exit;
}



$mylogin = $_POST['login'];  // le login peut être le numéro de licence 27-12
$mypassword = $_POST['password']; 
$mylogin = mysql_real_escape_string($mylogin);
$mypassword = mysql_real_escape_string($mypassword);
// To protect MySQL injection (more detail about MySQL injection)
//$mylogin = stripslashes($mylogin);
//$mypassword = stripslashes($mypassword);
//$mylogin = mysql_real_escape_string($mylogin);
//$mypassword = mysql_real_escape_string($mypassword);



// 27-12 on s'identifie aujourd'hui à partir du numéro de licence
//$query="SELECT * FROM utilisateurs WHERE (licence = '$mylogin' or email = '$mylogin') and password='$mypassword';";
$query="SELECT * FROM utilisateurs WHERE licence = '$mylogin' and password='$mypassword';";

$result=mysql_query($query,$link);

$count = mysql_num_rows($result); // doit retourner 1 systématiquement

$row=mysql_fetch_array($result);


if($count==1) {
    // on enregistre le login et mot de passe et on redirige vers la page d'accueil
    // on récupère l'email et son niveau d'accréditation
    
    $u_email = $row['email'];
    $u_acl = $row['userlevel'];
    $u_membre = $row['id'];
 
    
    $_SESSION['isLogin'] = true;
    $_SESSION['email'] = $u_email;
    $_SESSION['userlevel'] = $u_acl;
    $_SESSION['membre'] = $u_membre;
    $_SESSION['licence'] = $mylogin;
            
    header("location:login_ok.php");
}
else { // sinon on renvoie vers la page de login
    header("location:login.php");
}
?>