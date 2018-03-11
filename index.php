 <?php 

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
				top: 100px;
				left: 250px;
	        	width: 600px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 20px;
	    		margin: 20px;
	    		text-align: center;

			}

			#divi{
				position: absolute;
				top: 200px;
				left: 150px;
	        	width: 300px;
	   			border: 2px solid ;
				border-color:#214989;
	  
	    		margin: 20px;
	    		text-align: center;
			}

			.box{
				height: 30px;
				width: 200px;
			}
			#data a{
				font-size: 24px;
			}

			#login{

 
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

			#login:hover{
            	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19), 0 6px 20px 0 rgba(0,0,0,0.19);
        	}

        	.shadow {
	        	color: rgb(145, 27, 150);


	            text-decoration: none;
       		 }
       		

        	.shadow:hover{
            	color: white;
    			text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
        	}

        	.msg {
        		position: absolute;
        		top: 50px;
        		left: 430px;
        		color: blue;
        		font-size: 19px;
        	}
        	#home{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 50px;
			left: 100px;
			width: 160px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}
	 





		</style>

</head>

<body>
<?php 

session_destroy();


?>


		<a href="index.php"><h1  id="home">Home</h1></a>
		<form action="register.php" method="post">
		<div id="data">

				<h1>Welcome To Online Exam System</h1>

				
		<br> <br> 
		<a class="shadow"   href="student_login.php">Student login</a> <br><br>
		<a class="shadow"   href="teacher_login.php">Teacher login</a> <br><br>
		<p id="divi"></p><br>
		<a class="shadow"   href="student_register.php">Register as Student</a> <br><br>
		<a class="shadow"  href="teacher_register.php">Register as Teacher</a>
			
		</div>

		</form>



</body>

</html>
