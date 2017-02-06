<?php
/**
 * Created by PhpStorm.
 * User: kouakam
 * Date: 06.02.2017
 * Time: 21:26
 */
$host="us-cdbr-iron-east-04.cleardb.net";
$bd_name="heroku_4fa074e2126dc52";
$user_name="bd18ef721d4934";
$pass_word="ff82e5ff";
$con=new mysqli($host,$user_name,$pass_word,$bd_name);
if(mysqli_connect_errno())
{
    echo "connection failed";
}
else
if($_POST!=null)


    {
        if(!$stmt=$con->prepare("select `username` from user WHERE username=? and password=?"))
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
                        $num=0;
                        foreach ($result as $re)
                        {
                            echo  '<p>'.$re['question_1']." ".$re['question_2']." ".$re['question_3']." ".$re['question_4']."  ".$re['question_5'].'</p> </br>';
                            echo PHP_EOL;
                            $num=$num+1;
                        }
                    }
                }
                else
                {
                    echo "user not found";
                }
            }
        }


}