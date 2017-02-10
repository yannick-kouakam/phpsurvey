<?php
/**
 * Created by PhpStorm.
 * User: kouakam
 * Date: 06.02.2017
 * Time: 15:50
 */
echo '<html> <body style="background-color:powderblue;>';
mysql://bd18ef721d4934:ff82e5ff@us-cdbr-iron-east-04.cleardb.net/heroku_4fa074e2126dc52?reconnect=true
$host="us-cdbr-iron-east-04.cleardb.net";
$bd_name="heroku_4fa074e2126dc52";
$user_name="bd18ef721d4934";
$pass_word="ff82e5ff";
$con=new mysqli($host,$user_name,$pass_word,$bd_name);
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

    echo '<p>'.' thank for filling!! click'.' '.'<a href="../Html/SurveyQuestion.html"><h3>here</h3> </a> if you want to resubmit </p>';
}
else
{
    echo "none";
}
//echo '</body> </html>';