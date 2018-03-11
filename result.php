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
		<a href="student.php"><h1  id="back">Back</h1></a>
		
 <?php

 
 
//check if the use logged in or not
if(!isset($_SESSION['userID'])){
 
//display an error message
 
echo '<p class="msg">You need to be logged in to see this area!</p>';
 
}else{

 
$marks=0;


	





	if(isset($_SESSION['box_array'])){



	$box_array=$_SESSION['box_array'];
	$BoxInput = count($box_array);
	$iD=array();
	$ABCD=array();

	 for ($i=0; $i <$BoxInput ; $i++) {

	 //	echo $box_array[$i];
	 //	echo $_POST[$box_array[$i]];
	 //	echo " <br/>";

 

		$str =$box_array[$i];


		//echo "string ".$str."  String";



		//echo " <br/> ".$str."    <br/> ";
		$strlen = strlen( $str );



	//	if ($strlen==2) {
			//$char = substr( $str, 0, 1 );
		//	$no=substr( $str, 1, 1 );
			
	//	}
	//	else if($strlen==3) {
			//$char = substr( $str, 0, 1 );
		//	$no=substr( $str, 1, 2 );
			
		///}

    	

   		// echo $no." <br/> " ;
		
   		
   		






	 		$char=$_POST[$box_array[$i]];
	 		if ($char==null) {
	 			$char='#';
	 		}

	 		//echo "string";
	 		//echo $char." <br/>      <br/> ";

			array_push($ABCD,$char); 
		//	array_push($iD,$no);


    }



    		$count=0;
    		$val=0;
			$result =mysqli_query($con, "SELECT * FROM data WHERE description = '1'");
			while($row=mysqli_fetch_assoc($result)) { 

			//	$count=$count+1;
			$str = $row['ans'];


		//echo "string ".$str."  String";



		//echo " <br/> ".$str."    <br/> ";
			$strlen = strlen( $str );

				

				if ($strlen==1) {
					continue;
				}
				

				$givenANS=$ABCD[$val];
				$correctANS=$row['ans'];
			//	echo $givenANS."  ".$correctANS."    <br/> ";



 




					

					if ($givenANS===$correctANS) {
						 $marks += 1;
					}
					$val++;


				//}

 



 
				



			}


 
 

    
}












//echo "Marks ".$marks."   <br/>";

	if(isset($_POST['formDoor'])){

 
  	$inputData = $_POST['formDoor'];
    $NoInput = count($inputData);
   // echo $NoInput;

 
	$iD=array();
	$ABCD=array();
	
 



    for($i=0; $i < $NoInput; $i++)
    {

		$str = $inputData[$i];


		//echo "string ".$str."  String";



		//echo " <br/> ".$str."    <br/> ";
		$strlen = strlen( $str );













		if ($strlen==2) {
			$char = substr( $str, 0, 1 );
			$no=substr( $str, 1, 1 );
			
		}
		else if($strlen==3) {
			$char = substr( $str, 0, 1 );
			$no=substr( $str, 1, 2 );
			
		}

    	

   		 //echo $no." ".$char."<br/> " ;

   		array_push($iD,$no);
   		array_push($ABCD,$char);









    }

    //No of question in exam

    		$count=0;
    		$val=0;
			$result =mysqli_query($con, "SELECT * FROM data WHERE description = '1'");
			while($row=mysqli_fetch_assoc($result)) { 

				$count=$count+1;
				

				if ($val>=$NoInput) {
					break;
				}
				$givenID=$iD[$val];



				 if ($givenID>$count) {
					continue;
				}else if($givenID==$count){



					$givenANS=$ABCD[$val];
					$correctANS=$row["ans"];
					//$strlen_given_blank = strlen($givenANS);

					//echo " <br/> ".$givenANS."  ".$correctANS." <br/> ";



					if ($correctANS=='T') {
						$correctANS='A';
					}else if ($correctANS=='F') {
						$correctANS='B';
					}










					$val += 1;

					if ($givenANS==$correctANS) {
						 $marks += 1;
					}


				}

				//echo "string";



 
				



			}



			 
			


 







 
}











?>




		 
		<form action="result.php" method="post">
		<div id="data">
		<div id="data1">
		<h2>Create Question</h2>

			<h3>Your marks: <?php echo $marks;  ?> </h3>
			







			<br>

			 

			</div>

 
			
		</div>

		</form>





 
</div>
<?php 

$student_data ="student".$_SESSION['userID'];
$student_course =$_SESSION['course'];
$student_roll =$_SESSION['userID'];

 $update=mysqli_query($con,"UPDATE $student_course SET `marks`='$marks' WHERE `roll`=$student_roll ");

$base='student'.$student_roll;
$student_database = mysqli_query($con,"INSERT INTO $base(`course`, `marks`) VALUES('".$student_course."','".$marks."')");
//$course_database = mysqli_query($con,"INSERT INTO $student_course (`roll`, `marks`) VALUES('".$student_roll."','".$marks."')");








}
 ?>














</body>

</html>

 
