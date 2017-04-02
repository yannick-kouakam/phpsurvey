<?php
/**
 * Created by PhpStorm.
 * User: kouakam
 * Date: 06.02.2017
 * Time: 21:26
 */
echo '<table bgcolor="#faebd7" style="width:100%" border="3"><tr bgcolor="#ffe4c4"><th bgcolor="#ffe4c4"> number</th><th bgcolor="#ffe4c4"> Answer question 1</th> 
<th bgcolor="#ffe4c4"> Answer question 2</th> <th bgcolor="#ffe4c4"> Answer question 3</th> 
<th bgcolor="#ffe4c4" > Answer question 4</th><th bgcolor="#ffe4c4"> Answer question 5</th></tr>';
$host='surveydb.cqtgxye0qslc.eu-west-1.rds.amazonaws.com:3306';
$bd_name='bd_survey';
$user_name='yan_user';
$pass_word='adminyannick';
$port='3306'
$con=new mysqli_connect($host,$user_name,$pass_word,$bd_name,$port);
//echo '<html> <body style="background-color:powderblue;>';
if(mysqli_connect_errno())
{
    echo "connection failed";
}
else
if($_POST!=null)


    {
        if(!$stmt=$con->prepare("select `username` from users WHERE username=? and password=?"))
        {
            echo "failed to prepare statement".$con->error;
        }
        else
        {

           if(!$stmt->bind_param("ss",$username,$password))
           {
            echo "Failed to bind parameters".$con->error;
           }
            if(!$stmt->execute())
            {
                echo "Failed to execute".$con->error;
            }else
            {
                $res=$stmt->get_result();
                $user=$res->fetch_assoc();
                if($user['username']==$username)
                {
                    if ($result=$con->query("select * from answers"))
                    {

                        $num=1;
                        foreach ($result as $re)
                        {
                            echo  '<tr> <td>'.$num.'</td><td>'.$re['question_1'].'</td><td>'.$re['question_2'].'</td><td>'.$re['question_3'].
                                '</td><td>'.$re['question_4'].'</td><td>'.$re['question_5'].'</td></tr> ';
                            //echo PHP_EOL;
                            $num=$num+1;
                        }
                    }
                }
                else
                {
                    echo "user not found";
                }
            }
            $stmt->close();
        }


}
echo '</table>';
echo '<p><a href="../Html/SurveyQuestion.html"><h3>Go back</h3> </a>  </p>';
