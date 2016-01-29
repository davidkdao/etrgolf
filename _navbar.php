    <nav role="navigation" class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home" aria-hidden="true"> </span> ETR Languedoc Roussillon</a>
            <?
	            //<a href="index.php" class="navbar-brand">ETR Languedoc Roussillon</a>
	            ?>
        </div>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">                
                <li>
                	<a href="staff.php" title="Qui sommes-nous?">
	                	<span class="glyphicon glyphicon-info-sign" aria-hidden="true"> </span> Staff
	                </a>
	            </li>
                <li>
                	<a href="evenements.php" title="Voir les évènements">
	                	<span class="glyphicon glyphicon-calendar" aria-hidden="true"> </span> Calendrier
	                </a>
	            </li>
	            
	            
                <li class="">
                	<a href="baremes.php" title="Voir les barêmes">
	                	<span class="glyphicon glyphicon-tasks" aria-hidden="true"> </span> Barêmes
	                </a>
	            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
	        <?php
		        
		    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin']==0){ // on n'est pas connecté
			?>
				<li><a href="senregistrer.php" >S'enregistrer</a></li>
				<li>
					<a href="login.php" title="Se connecter">
						<button class="btn btn-info btn-large"><span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Se connecter</button>	 
					</a>
				</li>
			<?php
			}
			else { // on est  connecté   ?>
			<li>
				<a href="monprofile.php">
					<span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Profil
					<span class="badge">
						<?
							
						// 27-12 faut recuperer l'id à partir de la licence
						$q="SELECT * FROM utilisateurs WHERE licence = '". $_SESSION['licence'] . "';";						
						$r=mysql_query($q,$link);
						$v=mysql_fetch_array($r);
						
											
						$q1 = "SELECT count(*) as sum from participants where idmembre = " . $v['id'] ." and reponse = -1;"; 
						// on veut le nombre de stage non répondu
						$r1 = mysql_query($q1,$link);
						$rep = mysql_fetch_array($r1);
						if ($rep['sum'] != 0) {
							echo $rep['sum'];
						} else {
							echo "0";
						}
						?>

					</span>
				</a>
			</li>
			<li>				
				<a href="fm/" target="_blank">
					<span class="glyphicon glyphicon-file" aria-hidden="true"> </span> Documents
				</a>
			</li>
			
			<?php
			// test d'ACL
			if(isset($_SESSION['userlevel']) && $_SESSION['userlevel']>=50){ // Si on a un ACL > 100 (admin ou super admin)
			?>	
			<li class="dropdown">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"> </span> Admin<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<? 
					if(isset($_SESSION['userlevel']) && $_SESSION['userlevel']>=100) {
					?>
					<li><a href="ajouterEpreuve.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un évènement</a></li>
					<?
					}
						?>
					<li><a href="consulterEpreuve.php"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Consulter un évènement</a></li>
					<? if(isset($_SESSION['userlevel']) && $_SESSION['userlevel']>=100) {
					?>
					<li><a href="supprimerEpreuve.php"><span class="glyphicon glyphicon-remove" aria-hidden="true" textalign ="left"></span> Annuler un évènement</a></li>
					<?
						}
						?>
	        		</ul>
			</li> 
			<?
			} // fin du test d'ACL	

			?>
			<li>
				<a href="sedeconnecter.php">
					<span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span> Se déconnecter
				</a>

			</li>

			<?php
			}
			?>
            </ul>
          </div>
    </nav>   