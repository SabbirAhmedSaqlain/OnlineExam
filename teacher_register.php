<?php

	include('dbcontroller.php');
	include "functions.php";
?>

<html>

<head>

		<title>Welcome To Online Exam System</title>
		<link rel="icon" href="images/icon.ico" >

		<style type="text/css">
			body{
				background-image: url(images/body.jpg);
				 
			}

			#data{
				position: absolute;
				top: 10px;
				left: 350px;
	        	width: 400px;
	        	height: 550px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 30px;
	    		margin: 10px;
	    		text-align: left;

			}

			#data1{
				position: absolute;
				top: 1px;
				left: 80px;
	        	 

			}


			.box{
				height: 30px;
				width: 200px;
			}
			#data a{
				font-size: 20px;
			}

			#register{

				background-color: rgb(41, 113, 229);
				border: none;
				color: white;
				text-align: center;
				text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    cursor: pointer;
			    height: 35px;
			    width: 100px;
			}

			#register:hover{
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
        		top: 70px;
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

				    #login{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 170px;
			left: 120px;
			width: 120px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}
		h2 {
			color: rgb(27, 56, 102)
		}





		</style>

</head>

<body>
		<a href="index.php"><h1  id="home">Home</h1></a>
		<a href="teacher_login.php"><h1  id="login">Teacher Login</h1></a>
		<form action="teacher_register.php" method="post">
		<div id="data">
		<div id="data1">
			
		
		<h2>Teacher Account Information</h2><br>

 			
			<h3>Name</h3>
			<input class="box" type="text" name="name" />
			<h3>Department</h3>
			<input class="box" type="text" name="department" />
			<h3>email</h3>
			<input class="box" type="text" name="email" />	
			<h3>Password </h3>
			<input class="box" type="password" name="password" /> 
			<h3>Confirm Password </h3>
			<input class="box" type="password" name="passconf" />

			<br><br>

			<input id="register" type="submit" name="submit" value="Register" /><br><br>

		
 
			</div>
		</div>

		</form>

<?php

 

		if(isset($_POST['submit'])){

		$name1 = protect($_POST['name']);
		$department1 = protect($_POST['department']);
		$email1 = protect($_POST['email']);
		$password1 = protect($_POST['password']);
		$passconf1 = protect($_POST['passconf']);
	

 
		if( !$name1 || !$department1|| !$email1|| !$password1|| !$passconf1){

			echo '<p class="msg">You need to fill all of the required filds!</p>';

		}
		else{
			 

					if(strlen($password1) < 3 || strlen($password1) > 32){
						echo '<p class="msg"> Your <b>Password</b> must be between 5 and 32 characters long!</p>';

					}
					else{

						if($password1 != $passconf1){
							echo '<p class="msg"> The <b>Password</b> you supplied did not math the confirmation password!</p>';
						}
						else{

							$res1 = mysqli_query($con,"SELECT * FROM `teacher_data` WHERE `email` = '".$email1."'");

							$num1 = mysqli_num_rows($res1);
		 

							if($num1 == 1){
								echo '<p class="msg">The  email address you supplied is already taken!!</p>';
							}else{
		 

							$res2 = mysqli_query($con,"INSERT INTO `teacher_data` (`name`, `pass`, `dept`, `email`) VALUES('".$name1."','".md5($password1)."','".$department1."','".$email1."')");

							echo '<p class="msg">You have successfully registered!</p>';

							

							}

						}

					}

				}
 

		 

	}

?>



 
</div>

</body>

</html>
