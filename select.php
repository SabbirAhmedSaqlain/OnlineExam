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
				top: 1px;
				left: 300px;
	        	width: 460px;
	        	height: 560px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 30px;
	    		margin: 10px;
	    		text-align: left;

			}

			#data1{
				position: absolute;
				top: -10px;
				left: 100px;
	        	 

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
        		top: 55px;
        		left: 520px;
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
		        	#back{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 150px;
			left: 100px;
			width: 160px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}
		h2 {
			color: rgb(27, 56, 102)
		}
		#ct{
			position: absolute;
			top: 10px;
			left: 640px;
			font-size: 25px;
		}





		</style>

</head>

<body>
		<a href="index.php"><h1  id="home">Home</h1></a>
		<a href="teacher.php"><h1  id="back">Back</h1></a>
		
		<?php
			$ct=0;
			$result =mysqli_query($con, "SELECT * FROM data WHERE description = '1'");
			while($row=mysqli_fetch_assoc($result)) { 
				$ct=$ct+1;

			}
			 
			echo "<p id='ct'>Total Selected : ".$ct."</p>";
 
		?>





		 
		<form action="select.php" method="post">
		<div id="data">
		<div id="data1">
		<h2>Create Question</h2>

			<h3>Course</h3>
			<input class="box" type="text" name="course" />
			<h3>Section</h3>
			<input class="box" type="text" name="section" />
 

			<br>

			<input id="register" type="submit" name="submit" value="Create" /><br><br>
			</div>

 
			
		</div>

		</form>

<?php

 

		if(isset($_POST['submit'])){

		$course = protect($_POST['course']);
		$section = protect($_POST['section']);
 

 
 
		if(!$course || !$section  ){

			echo '<p class="msg">You need to fill all of the required fields!</p>';

		}
		else{









			 

	$res2 = mysqli_query($con,"CREATE TABLE $course (`id` int(8) NOT NULL AUTO_INCREMENT, `roll` varchar(1000),`marks` varchar(1000),`active` varchar(255),PRIMARY KEY (`id`) )");
 	$res3= mysqli_query($con,"INSERT INTO $course (`roll`) VALUES('$section')");

			echo '<p class="msg">Exam Created Successfully!</p>';

		}

	}

?>



 
</div>

</body>

</html>
