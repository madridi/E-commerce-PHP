
<?php
	require_once('../inc/autoload.php');
	
	if(isset($_POST['loginCnx'])&&isset($_POST['mdpCnx'])){
		$log=$_POST['loginCnx'];
		$mdp=$_POST['mdpCnx'];
		$login=new Login();
		if(!$login->connecter($log,$mdp)){
			echo '<script>alert ("Login ou Mot de passe incorrect")</script>';
			header('location:../');
			
		}else{
			header('location:../');
		}
	}else
	{
		echo '<script>alert ("Paramettres erronés")</script>';
		header('location:../');
	}
?>