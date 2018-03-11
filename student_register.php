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
				left: 300px;
	        	width: 500px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 30px;
	    		margin: 10px;
	    		text-align: left;

			}

			#data1{
				position: absolute;
				top: 130px;
				left: 300px;
	        	 

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
        		top: 100px;
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
		<a href="student_login.php"><h1  id="login">Student Login</h1></a>
		<form action="student_register.php" method="post">
		<div id="data">
		<h2>Student Account Information</h2><br><br>

			<h3>Series</h3>
			<input class="box" type="text" name="series" />
			<h3>Name</h3>
			<input class="box" type="text" name="name" />
			<h3>Roll</h3>
			<input class="box" type="text" name="roll" />
			<h3>Department</h3>
			<input class="box" type="text" name="department" />


			<div id="data1">
			<h3>Section</h3>
			<input class="box" type="text" name="section" />	
			<h3>Password </h3>
			<input class="box" type="password" name="password" /> 
			<h3>Confirm Password </h3>
			<input class="box" type="password" name="passconf" />

			
			<br><br><br>

			<input id="register" type="submit" name="submit" value="Register" /><br><br>

			</div>
 
			
		</div>

		</form>

<?php

 

		if(isset($_POST['submit'])){

		$series1 = protect($_POST['series']);
		$name1 = protect($_POST['name']);
		$roll1 = protect($_POST['roll']);
		$department1 = protect($_POST['department']);
		$section1 = protect($_POST['section']);
		$password1 = protect($_POST['password']);
		$passconf1 = protect($_POST['passconf']);
	

 
		if(!$series1 || !$name1 || !$roll1 || !$department1|| !$section1|| !$password1|| !$passconf1){

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

							$res1 = mysqli_query($con,"SELECT * FROM `student_data` WHERE `roll` = '".$roll1."'");

							$num1 = mysqli_num_rows($res1);
		 

							if($num1 == 1){
								echo '<p class="msg">The  Roll number you supplied is already taken</p>';
							}else{
		 

							$res2 = mysqli_query($con,"INSERT INTO `student_data` (`name`, `pass`, `dept`, `series`, `sec`, `roll`) VALUES('".$name1."','".md5($password1)."','".$department1."','".$series1."','".$section1."','".$roll1."')");


							$table= "Student".$roll1;
							$database = mysqli_query($con,"CREATE TABLE $table (`id` int(8) NOT NULL AUTO_INCREMENT, `course` varchar(1000),`marks` varchar(1000),PRIMARY KEY (`id`) )");
 
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
