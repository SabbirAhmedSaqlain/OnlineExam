CREATE TABLE IF NOT EXISTS `student_data` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `roll` varchar(255),
  `dept` varchar(255),
  `series` varchar(255),
  `sec` varchar(255), 
  `pass`  varchar(255),
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_data` (`roll`)
)


CREATE TABLE IF NOT EXISTS `teacher_data` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `dept` varchar(255),
  `email` varchar(255), 
  `pass`  varchar(255),
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_data` (`email`)
)



CREATE TABLE IF NOT EXISTS `data` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `no` varchar(1000),
  `description` varchar(1000),
  `a` varchar(255), 
  `b` varchar(255), 
  `c` varchar(255), 
  `d` varchar(255), 
  `ans` varchar(255), 
  PRIMARY KEY (`id`),
  UNIQUE KEY `data` (`email`)
)


CREATE TABLE $course (
`id` int(8) NOT NULL AUTO_INCREMENT,
 `roll` varchar(1000),
 `marks` varchar(1000),
 `active` varchar(255),
 PRIMARY KEY (`id`) 
)
CREATE TABLE course (
`id` int(8) NOT NULL AUTO_INCREMENT,
 `coursename` varchar(1000),
 `section` varchar(1000),
   `date` date,
     `time` time,
 PRIMARY KEY (`id`) 
)


Insert into $course(roll) Values('B')

    $result =mysqli_query($con, "SELECT * FROM $course1 WHERE id=1");
    $row=mysqli_fetch_assoc($result);
    echo $row['roll']; 

UPDATE `data` SET `description`='1'


  $res2 = mysqli_query($con,"CREATE TABLE $course (`id` int(8) NOT NULL AUTO_INCREMENT, `roll` varchar(1000),`marks` varchar(1000),`active` varchar(255),PRIMARY KEY (`id`) )");
  $res3= mysqli_query($con,"INSERT INTO $course (`roll`) VALUES('$section')");


CREATE TABLE $table (`id` int(8)
 NOT NULL AUTO_INCREMENT,
  `course` varchar(1000),
  `marks` varchar(1000),
  PRIMARY KEY (`id`) )





alter table data add course varchar(100)













