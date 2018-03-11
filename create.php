<?php
session_start();
	include('dbcontroller.php');
	include "functions.php";


	if(!empty($_GET["action"])) {

	switch($_GET["action"]) {

		case "add":

			


				$result = mysqli_query($con, "SELECT * FROM data WHERE id='" . $_GET["id"] . "'");

				while($row=mysqli_fetch_assoc($result)) {
					$productByCode[] = $row;
				}


				$AddID=$productByCode[0]["id"];
				$addQ = mysqli_query($con, "UPDATE `data` SET `description`='1' WHERE id=$AddID");


 
			

			break;

		case "remove":

				$result = mysqli_query($con, "SELECT * FROM data WHERE id='" . $_GET["id"] . "'");

				while($row=mysqli_fetch_assoc($result)) {
					$productByCode[] = $row;
				}


				$AddID=$productByCode[0]["id"];
				$addQ = mysqli_query($con, "UPDATE `data` SET `description`='0' WHERE id=$AddID");
			break;


		case "empty":
			unset($_SESSION["cart_item"]);
			break;	
		}
	}
?>
<HTML>
<HEAD>
	<title>Welcome To Online Exam System</title>
	<link rel="icon" href="images/icon.ico" >
	<style type="text/css">

		body{
					 
			background-image: url(images/body.jpg);
				 
			 
			width:610px;font-family:calibri;
		}

		#data{
			position: absolute;
			top: 150px;
			left: 30px;
		}




		#cart table{width:100%;background-color:#F0F0F0;}
		#cart table td{background-color:#FFFFFF;}

		.txt-heading{    
			padding: 10px 10px;
		    border-radius: 2px;
		    color: #FFF;
		    background: #6aadf1;
			margin-bottom:10px;
		}

		a.btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
		a.btnRemoveAction:visited{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}

		#btnEmpty {

			background-color: #ffffff;
		    border: #FFF 1px solid;
		    padding: 1px 10px;
		    color: #ff0000;
		    font-size: 0.8em;
		    float: left;
		    text-decoration: none;
		    border-radius: 4px;

		}

		.btnAddAction{

 			
		    border: 0;
		    padding: 3px 10px;
		    color: #FFF;
		    background: #6aadf1;
		    margin-left: 2px;
		    border-radius: 2px;
		}

		#cart {
			margin-bottom:30px;
			position: absolute;
			width: 450px;
			top: 170px;
			left: 800px;
		}
		.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}

		#product-grid0_head {
 
			 
 
			width: 800px;
 
		}

		#product-grid0 {

			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}



		#product-grid1_head {
 
			 
 
			width: 700px;
 
		}

		#product-grid1 {
 
			 
 			left: 150px;
 			position: absolute;
			width: 600px;
			
			margin-bottom:140px;
			
		}


	 



		.product-item {	float:left;	background: #ffffff;margin:15px 10px;	padding:5px;border:#CCC 1px solid;border-radius:4px;}
		.product-item div{text-align:center;	margin:10px;}
		.product-price {    
			color: #005dbb;
		    font-weight: 600;
		}


		.product-image {height:100px;background-color:#FFF;}
		.clear-float{clear:both;}
		.demo-input-box{border-radius:2px;border:#CCC 1px solid;padding:2px 1px;}

		#login{
			position: absolute;
			color: rgb(17, 57, 122);
			top: 40px;
			left: 1100px;
			width: 200px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}

		#title{
			position: absolute;
			font-family:sans-serif; 
			text-align: center;
			color: rgb(17, 57, 122);
			 top: -10px;
			left: 300px;
			width: 600px;
			font-size: 40px;
			padding: 5px 5px;
			border: groove;

		}
					.box{
				height: 30px;
				width: 200px;
			}


		#contact{
			 
			color: rgb(17, 57, 122);
			 
			 
			width: 1000px;
			font-size: 20px;
			padding: 5px 5px;
			border: solid;
			background-image: url(images/body.jpg);

		}
		#search{
			
			top: 100px;
			left: 200px;
			width: 800px;
		}
		.description{
			height: 100px;
			width: 200px;
		}
		        	#home{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 0px;
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
			top: 60px;
			left: 100px;
			width: 160px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}



			#print{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 60px;
			left: 1000px;
						font-size: 25px;
			padding: 5px 5px;
			 
			 

		}
</style>


</HEAD>
<body>

	 
		<p id="title">Welcome To Online Exam System</p>
		<a href="index.php"><h1  id="home">Home</h1></a>
 		<a href="teacher.php"><h1  id="back">Back</h1></a>

		<div id="data">
 

		<p class="txt-heading" id="product-grid1_head">All Questions</p>
		<div id="product-grid1">

			<?php
//session_destroy();
			$count = 0;
			$result =mysqli_query($con, "SELECT * FROM data ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 
				$count += 1;

			?>
				<div class="product-item">
					<?php echo $count.". "; ?>
					<form method="post" action="create.php?action=add&id=<?php echo $row["id"]; ?>">

                

					<div> <strong> <?php echo $row["no"]; ?> </strong></div>
					<div><?php echo "(A) ".$row["a"]; ?></div>
					<div><?php echo "(B) ".$row["b"]; ?></div>
					<div><?php echo "(C) ".$row["c"]; ?></div>
					<div><?php echo "(D) ".$row["d"]; ?></div>

					<div> 
 
 
					<?php 	if ($row['description']!='1') {?>
						<input type="submit" value="Add for Exam" class="btnAddAction" />
					<?php }  ?>


					</div>
					</form>

					<form method="post" action="create.php?action=remove&id=<?php echo $row["id"]; ?>">

			
					<div> 

 
					<?php 	if ($row['description']=='1') {?>
							
						
						<input type="submit" value="Remove from Exam" class="btnAddAction" />
					<?php }  ?>

					</div>
					</form>


				</div>
			<?php
				//	}
			}
			?>

		</div>
 
		</div>







 
		
		<div id="cart">

			<form action="create.php" method="post">
			<h3>Course</h3>
			<input class="box" type="text" name="course" />
			<h3>Section</h3>
			<input class="box" type="text" name="section" />
			<h3>Time</h3>
			<input class="box" type="date" name="date" /> 
			<input class="box" type="time" name="time" />

			<br><br>

			<input class="btnAddAction" type="submit" name="submit" value="Create" /><br>
			<br><br><br</form>

























		<div class="txt-heading">Selected Questions For Exam</div>
		<?php


			$item_total = 0;

		    
		?>	
		<table cellpadding="10" cellspacing="1">
		<tbody>
		<tr>
		<th style="text-align:left;"><strong>Question No</strong></th>
		<th style="text-align:left;"><strong>Question Id</strong></th>
		<th style="text-align:right;"><strong>Question</strong></th>
 
		</tr>	
		<?php		
			$select =mysqli_query($con, "SELECT * FROM data WHERE description='1'");
			while($rowSelected=mysqli_fetch_assoc($select)) { 
		    	$item_total += 1;
				?>
						<tr>
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item_total ?></strong></td>
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $rowSelected["id"]; ?></strong></td>
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $rowSelected["no"]; ?></td>
						
						 

						</tr>
						<?php
 
				}
				?>

		<tr>
		<td colspan="5" align=left><strong>Total:</strong> <?php echo "<strong>".$item_total."</strong>"; ?></td>
		</tr>
		</tbody>
		</table>		

		</div>

 <?php

 

		if(isset($_POST['submit'])){
		$course="";
		$course = protect($_POST['course']);
		$section = protect($_POST['section']);

		$date1=date("Y-m-d", time());
		$time1=date("H:i:s", time());

		$date = $_POST['date'];
		$time = $_POST['time'];

 






 

 
 
		if(!$course || !$section  ){

			echo '<p class="msg">You need to fill all of the required fields!</p>';

		}
		else{









			 

	$res2 = mysqli_query($con,"CREATE TABLE $course (`id` int(8) NOT NULL AUTO_INCREMENT, `roll` varchar(1000),`marks` varchar(1000),`active` varchar(255),PRIMARY KEY (`id`) )");
 	$res3= mysqli_query($con,"INSERT INTO $course (`roll`) VALUES('$section')");
   	$res3= mysqli_query($con,"INSERT INTO `course` (`coursename`,`section`,`date`,`time`) VALUES('$course','$section','$date','$time')");
 
 

			echo '<p id="print" class="msg">Exam Created Successfully!</p>';

		}

	}

?>

</body>
</HTML>