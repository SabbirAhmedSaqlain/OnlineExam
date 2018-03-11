<?php

	session_start();
	ob_start();
	include('dbcontroller.php');

	include "functions.php";

?>

<html>

<head>

		<title>Online Shopping</title>
		<link rel="icon" href="images/icon.ico" >
		<style type="text/css">
			body{
				background-image: url(images/body.jpg);
				 
			}

			#data{
				position: absolute;
				top: 100px;
				left: 400px;
	        	width: 350px;
	   			border: 5px solid ;
	   			border-color:#214989;
	   		    padding: 20px;
	    		margin: 20px;
	    		text-align: center;

			}
			.box{
				height: 30px;
				width: 200px;
			}
			#data a{
				font-size: 20px;
			}

			.login{
				background-color:  rgb(41, 113, 229);
				border: none;
				color: white;
				text-align: center;
				text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    cursor: pointer;
			    height: 35px;
			    width: 160px;
			}

			.login:hover{
            	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19), 0 6px 20px 0 rgba(0,0,0,0.19);
        	}

        	.shadow {
	        	color: blue;
	            text-decoration: none;
       		 }

        	.shadow:hover{
            	color: white;
    			text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        	}

        	.msg {
        		position: absolute;
        		top: 10px;
        		left: 430px;
        		color: blue;
        		font-size: 19px;
        	}

        	#home{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 60px;
			left: 100px;
			width: 160px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}





		</style>



</head>

<body>

	<a href="index.php"><h1  id="home">Home</h1></a>

		<form action="student_login.php" method="post">

		<div id="data">

			<h3>Roll </h3>
			<input class="box" type="text" name="roll" />
			<h3>Password </h3>
			<input class="box" type="password" name="password" /> <br><br>
			<input class="login" type="submit" name="submit" value="Login" /><br><br>

			<a class="login" class="shadow" href="forgot.php">Forgot Password</a>
			
		</div>

		</form>





<?php

 


		if(isset($_POST['submit'])){
			// echo '<p class="msg"> OKK </p>';
			
			$roll = protect($_POST['roll']);
			$password = protect($_POST['password']);

			if(!$roll || !$password){
				echo '<p class="msg"> Please fill up all blacks! </p>';
			}
			else{

				$res = mysqli_query($con,"SELECT * FROM `student_data` WHERE `roll` = '".$roll."'");
				$num = mysqli_num_rows($res);

				if($num == 0){
					echo '<p class="msg">Roll number does not exist! </p>';
				}

				else{

					$res = mysqli_query($con,"SELECT * FROM `student_data` WHERE `roll` = '".$roll."' AND `pass` = '". md5($password)."'");
					$num = mysqli_num_rows($res);

 

					if($num == 0){
						echo '<p class="msg">  The Password you supplied does not match for that roll number! </p>';
					}
					else{

						$row = mysqli_fetch_assoc($res);
						 
						$_SESSION['userID'] = $roll;
						//echo '<p class="msg"> You have successfully logged in!</p>';
					//	$time = date('U'); 
					//	mysqli_query($con,"UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'");
						header('Location: student.php');
					}

				}

			}

		}

?>



</body>

</html>

<?php

ob_end_flush();

?>
