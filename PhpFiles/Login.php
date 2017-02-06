<?php
/**
 * Created by PhpStorm.
 * User: kouakam
 * Date: 06.02.2017
 * Time: 21:26
 */

if($_POST!=null)
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $con=new mysqli("localhost","yannick","admin","bd_survey");
    if(mysqli_connect_errno())
    {
        echo "connection failed";
    }else
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

}