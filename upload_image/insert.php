<?php

$host = "localhost";
$user = "root";
$password ="";
$database = "food_db";

$user_id ="";
$username="";
$email="";
$telephone_no="";
$password="";
$user_type="";
//connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
    $connect = mysqli_connect($host, $user, $password, $database);
} catch (mysqli_sql_exception $ex) {
    echo 'Error';
}
//get values
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['user_id'];
    $posts[1] = $_POST['username'];
    $posts[2] = $_POST['email'];
    $posts[3] = $_POST['telephone_no'];
    $posts[4] = $_POST['password'];
    $posts[5] = $_POST['user_type'];
    return $posts;
}
//search
if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM user WHERE user_id = $data[0]";
    
    $search_Result = mysqli_query($connect, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $user_id =$row['user_id'];
    $username =$row['username'];
    $email = $row['email'];
    $telephone_no=$row['telephone_no'];
    $password= $row['password'];
    $user_type= $row['user_type'];
    
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}
//insert
if(isset($_POST['insert']))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `user`(`username`, `email`,`telephone_no`,`password`, `user_type`) VALUES ('$data[1]','$data[2]','$data[3]','$data[4]',$data[5])";
    try{
        $insert_Result = mysqli_query($connect, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}
//delete

if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `user` WHERE `user_id` = $data[0]";
    try{
        $delete_Result = mysqli_query($connect, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}
//update

if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `user` SET `username`='$data[1]',`email`='$data[2]',`telephone_no`='$data[3]',`password`='$data[4]',`user_type`=$data[5] WHERE `user_id` = $data[0]";
    try{
        $update_Result = mysqli_query($connect, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($connect) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Update '.$ex->getMessage();
    }
}



?>


<!DOCTYPE Html>
<html>
    <head>
        <title>PHP INSERT UPDATE DELETE SEARCH</title>
    </head>
    <body>
        <form action="insert.php" method="post">
           <input type="number" name="user_id"placeholder="user_id"  value="<?php echo $user_id;?>"><br>
    <input type="text" name="username" placeholder="username" value="<?php echo $username;?>"><br>
        <input type="email" name="email" placeholder="email" value="<?php echo $email;?>"><br>
    <input type="text" name="telephone_no" placeholder="telephone_no" value="<?php echo $telephone_no;?>"><br>
    <input type="text" name="password" placeholder="password" value="<?php echo $password;?>"><br>
    <input type="text" name="user_type" placeholder="user_type" value="<?php echo $user_type;?>"><br>
            <div>
                <!-- Input For Add Values To Database-->
                <input type="submit" name="insert" value="Add">
                
                <!-- Input For Edit Values -->
                <input type="submit" name="update" value="Update">
                
                <!-- Input For Clear Values -->
                <input type="submit" name="delete" value="Delete">
                
                <!-- Input For Find Values With The given ID -->
                <input type="submit" name="search" value="Find">
            </div>
        </form>
    </body>
</html>