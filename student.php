<?php

	include('dbcontroller.php');
	include "functions.php";
	session_start();
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
			    height: 40px;
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
		        	#back{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 120px;
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

		#ExamList{
				position: absolute;
				width: 300px;
				top: 300px;
				left: 900px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 30px;
		}
		.exam-heading{
				background: rgb(244, 66, 95);
				color: rgb(255, 255, 255);
				font-size: 25px;
				padding: 10px;

		}
		</style>

</head>

<body>
<?php
 
//check if the use logged in or not
if(!isset($_SESSION['userID'])){
 
//display an error message
 
echo '<p class="msg">You need to be logged in to see this!</p>';
 
}else{

?>




		<a href="index.php"><h1  id="home">Home</h1></a>
		<a href="student_login.php"><h1  id="back">Back</h1></a>

		<form action="exam.php" method="post">
		<div id="data">
		<div id="data1">
		

			<h3>Course</h3>
			<input class="box" type="text" name="course" />
			

			<br>

			<input id="register" type="submit" name="submit" value="Start" /><br><br>
			</div>

 
			
		</div>

		</form>


 
		</div>













		<div id="MarksSheet"> 

		<div class="exam-heading">Marks Sheet </div>

		<table cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
		<th style="text-align:left;"><strong>Course Name</strong></th>
		<th style="text-align:left;"><strong>Marks</strong></th>
 
		</tr>	
		<?php		
				$student_data ="student".$_SESSION['userID'];
				//$student_course =$_SESSION['course'];
				$student_roll =$_SESSION['userID'];


		    	$result_marks =mysqli_query($con, "SELECT * FROM $student_data");
				while($row=mysqli_fetch_assoc($result_marks )) { 
				?>
						<tr>
						 
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $row["course"]; ?></td>
						<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $row["marks"]; ?></td>
					 
 
						</tr>
						<?php
 
				}
				?>
 
		</tbody>
		</table>		
		  <?php
		
		?>
		</div>





		<div id="ExamList"> 

		<div class="exam-heading">Next Exam List</div>

		<table cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
		<th style="text-align:left;"><strong>Course Name</strong></th>
		 
 
		</tr>	
		<?php		
				$result1 =mysqli_query($con, "SELECT * FROM student_data WHERE `roll` = $student_roll");
				$row1=mysqli_fetch_assoc($result1);
				$userSection1=$row1['sec'];//echo $userSection1;


				$date1=date("Y-m-d", time());
				$time1=date("H:i:s", time());


		    	$coursedata =mysqli_query($con, "SELECT * FROM `course`");
				while($row=mysqli_fetch_assoc($coursedata)) {
					if(($row["section"]==$userSection1)&&($date1<=$row["date"])){
				?>
						<tr>
						 
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $row["coursename"]; ?></td>
						 
					 
 
						</tr>
						<?php
 
				}
			}
				?>
 
		</tbody>
		</table>		
		  <?php
		
		?>
		</div>











<?php

}

?>
</body>

</html>






