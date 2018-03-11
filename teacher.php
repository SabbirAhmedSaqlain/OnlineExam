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
				top: 50px;
				left: 300px;
	        	width: 350px;
	        	height: 400px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 30px;
	    		margin: 10px;
	    		text-align: left;

			}

			#data1{
				position: absolute;
				top: 10px;
				left: 50px;
	        	 

			}
 

			.box{
				height: 30px;
				width: 200px;
			}
			#data a{
				font-size: 20px;
			}

			.register{

				background-color: rgb(41, 113, 229);
				border: none;
				color: white;
				text-align: center;
				text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    cursor: pointer;
			    height: 30px;
			    width: 300px;
			}

			.register:hover{
				 text-decoration: none;
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
		h2 {
			color: rgb(27, 56, 102)
		}

		.txt-heading{    
			padding: 10px 10px;
		    border-radius: 2px;
		    color: #FFF;
		    background: #6aadf1;
			margin-bottom:10px;
		}

		#MarksSheet{
				position: absolute;
				width: 300px;
				top: 50px;
				left: 900px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 30px;
		}
			.marks{

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

			.marks:hover{
            	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19), 0 6px 20px 0 rgba(0,0,0,0.19);
        	}


		</style>

</head>

<body>
		<a href="index.php"><h1  id="home">Home</h1></a>
		 
		<div id="data">
			<div id="data1">
     		<a class="register" class="shadow" href="insert.php">Insert Data</a>
     
      		<a class="register" class="shadow" href="create.php">Select Questions For Exam</a>
      		<a class="register" class="shadow" href="random.php">Random Selection For Exam</a>
      		<a class="register" class="shadow" href="reset.php">Reset Exam</a>   
 

			</div>

 
			
		</div>















		<div id="MarksSheet"> 





		<form action="teacher.php" method="post">
			<h3>Enter Course Name For Marksheet </h3>
			<input class="box" type="text" name="course" />
			<input class="marks" type="submit" name="submit" value="Show" /><br><br>
		</form>






		<div class="txt-heading">Marks Sheet </div>

		<table cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
		<th style="text-align:left;"><strong>Roll Number</strong></th>
		<th style="text-align:left;"><strong>Marks</strong></th>
 
		</tr>	
		<?php	


				if(isset($_POST['submit'])){
				$course_name = protect($_POST['course']);

				echo "<strong>Course Name : </strong>".$course_name;
				$count = 0;


			//	$student_data ="student".$_SESSION['userID'];
				//$student_course =$_SESSION['course'];
			//	$student_roll =$_SESSION['userID'];


		    	$result_marks =mysqli_query($con, "SELECT * FROM $course_name");
				while($row=mysqli_fetch_assoc($result_marks )) { 
					if ($count==0) {
						$count +=1;
						continue;
					}

				?>
						<tr>
						 
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $row["roll"]; ?></td>
						<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $row["marks"]; ?></td>
					 
 
						</tr>
						<?php
 
				}
			}
		?>
 
		</tbody>
		</table>		

		</div>	 
 
 
 












</body>

</html>
