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
	        	width: 500px;
	        	
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
 



#clockdiv{
	position: absolute;
	top: 100px;
	left: 900px;
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}

#clockdiv > div{
	padding: 10px;
	border-radius: 3px;
	background: #00BF96;
	display: inline-block;
}

#clockdiv div > span{
	padding: 15px;
	border-radius: 3px;
	background: #00816A;
	display: inline-block;
}

.smalltext{
	padding-top: 5px;
	font-size: 16px;
}
		</style>

</head>

<body>
<?php
 
//check if the use logged in or not
if(!isset($_SESSION['userID'])){
 
//display an error message
 
echo '<p class="msg">You need to be logged in to participate in exam!</p>';
 
}else{

	?>


 
		<a href="index.php"><h1  id="home">Home</h1></a>
		<div id="data">


		

<form action="result.php" method="post">
<?php




	//	echo "string";
	//	echo $_SESSION['userID'];

		//check if user enter course name or not
		$marks= 0;
		$b_count = 1;
		$box_array=array();
		if (isset($_POST['course'])) {
		$course_id = $_POST['course'];

			
		//search for checking available exam
		$UserRoll=$_SESSION['userID'];
		$course = protect($_POST['course']);


		$result =mysqli_query($con, "SELECT * FROM $course WHERE `id` = 1");
		$row=mysqli_fetch_assoc($result);
		$userSection=$row['roll'];

		//echo $userSection;






		$userRoll= $_SESSION['userID'];
		$result1 =mysqli_query($con, "SELECT * FROM student_data WHERE `roll` = $userRoll");
		$row1=mysqli_fetch_assoc($result1);
		$userSection1=$row1['sec'];//echo $userSection1;











		if (($userSection1==$userSection)||$userSection==null) {












		$result1 =mysqli_query($con, "SELECT * FROM $course WHERE `roll` = $userRoll");
		//$row2=mysqli_fetch_assoc($result1);
		//echo $row2['active'];

		if (mysqli_num_rows($result1)) {
			echo "Exam Over";

				
		}else
		{
			$update=mysqli_query($con,"INSERT INTO $course (`roll`, `active`) VALUES($UserRoll,'1')");


 


		











 
			$val=0;
			$result =mysqli_query($con, "SELECT * FROM data WHERE description = '1' ");
			while($row=mysqli_fetch_assoc($result)) { 
			$val= $val+1;
			$_SESSION['course']=$course_id;
 	

 
			$aa= "A".$val; 
			$bb= "B".$val; 
			$cc= "C".$val; 
			$dd= "D".$val;
			$str=$row["ans"];
			$strlen = strlen( $str );   

//}

?>
 


<?php 

						if($row["ans"]=='T'||$row["ans"]=='F'){
 
						 
 
 ?>



					 



					<div><strong><?php echo $val.". ".$row["no"]; ?></strong></div><br>
					<input type="checkbox" name="formDoor[]" value="<?php echo $aa; ?>"/><?php echo "TRUE"; ?><br />
					<input type="checkbox" name="formDoor[]" value="<?php echo $bb; ?>"/><?php echo "FALSE"; ?><br />
 
					<br /><input type="checkbox" name="formDoor[]" value="<?php echo $dd; ?>"/><?php echo $row["ans"]; ?><br /><br />




<?php 

						 
 
						}else if($strlen>=2){
						$boxArr = "A".$b_count;
						//echo $boxArr;
						$b_count++;
						array_push($box_array,$boxArr);
						$_SESSION['box_array']=$box_array;

 
 ?>




					<div><strong><?php echo $val.". ".$row["no"]; ?></strong></div><br>
					
				
					<input type='text' name='<?php echo $boxArr; ?>'  >

 
					<br /><input type="checkbox" name="formDoor[]" value="<?php echo $dd; ?>"/><?php echo $row["ans"]; ?><br /><br />





<?php 

					 
 
					 }else{
 
 ?>
 




					<div><strong><?php echo $val.". ".$row["no"]; ?></strong></div><br>
					<input type="checkbox" name="formDoor[]" value="<?php echo $aa; ?>"/><?php echo $row["a"]; ?><br />
					<input type="checkbox" name="formDoor[]" value="<?php echo $bb; ?>"/><?php echo $row["b"]; ?><br />
					<input type="checkbox" name="formDoor[]" value="<?php echo $cc; ?>"/><?php echo $row["c"]; ?><br />
					<input type="checkbox" name="formDoor[]" value="<?php echo $dd; ?>"/><?php echo $row["d"]; ?><br /><br />
					<input type="checkbox" name="formDoor[]" value="<?php echo $dd; ?>"/><?php echo $row["ans"]; ?><br /><br />





<?php 

					 
 
					 }
 
 ?>




 






<?php
 
}
?>

<input type="submit" name="formSubmit" value="Submit" />
</form>


 
</div>


 








 

<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var end =setInterval(function () {
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (--timer < 0) {
                window.location = "student.php";
                clearInterval(end);
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = 1200,
            display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
    };
</script>

<div>Registration closes in <span id="time"></span></div>
<form id="form1" runat="server">

</form>




<?php
}
}
else{
	echo "No Exam available!!";
}
}
else{
	echo "Please enter course name!!";
}
 //echo "Total marks: ".$marks;

 //$update=mysqli_query($con,"UPDATE $course SET `marks`='$marks' WHERE `roll`=$userRoll ");

 //$update=mysqli_query($con,"INSERT INTO $course (`roll`, `active`) VALUES($UserRoll,'1')");

 
}
//session_destroy();
?>


</body>

</html>
