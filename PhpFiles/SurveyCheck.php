<?php
/**
 * Created by PhpStorm.
 * User: kouakam
 * Date: 06.02.2017
 * Time: 15:50
 */

$con=new mysqli("localhost","yannick","admin","bd_survey");
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
 }


if($_POST['submit']=='Submit')
{
    
    echo '<p> thank for filling!! click <a href="../Html/SurveyQuestion.html"><h3>here</h3> </a> if you want to resubmit </p>';
}
else
{
    echo "none";
}