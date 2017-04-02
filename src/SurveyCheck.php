<?php
/**
 * Created by PhpStorm.
 * User: kouakam
 * Date: 06.02.2017
 * Time: 15:50
 */
echo '<html> <body style="background-color:powderblue;>';
//mysql://bd18ef721d4934:ff82e5ff@us-cdbr-iron-east-04.cleardb.net/heroku_4fa074e2126dc52?reconnect=true
$host='surveydb.cqtgxye0qslc.eu-west-1.rds.amazonaws.com:3306';
$bd_name='bd_survey';
$user_name='yan_user';
$pass_word='adminyannick';
$port=$_SERVER['3306'];
$con=new mysqli($host,$user_name,$pass_word,$bd_name,$port);
if(mysqli_connect_errno())
{
    echo "connection failed";
}
$answer1=$_POST['question1'];
$answer2=$_POST['question2'];
$answer3=$_POST['question3'];
$answer4=$_POST['question4'];
$answer5=$_POST['question5'];
 if(!($stmt=$con->prepare("insert into answers (`question_1`,`question_2`,`question_3`,`question_4`,`question_5`)VALUES(?,?,?,?,?)")))
 {
     echo "failed to insert" .$con->error;
 }else
 {
     $stmt->bind_param("ssiss",$answer1,$answer2,$answer3,$answer4,$answer5);
     $stmt->execute();
     $stmt->close();
 }


if($_POST['submit']=='Submit')
{

   echo '<p><a href="index.html"><h3>here</h3> </a> if you want to resubmit </p>';
}
else
{
    echo "none";
}
//echo '</body> </html>';
