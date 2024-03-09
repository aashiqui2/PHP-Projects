<?php  

$room=$_POST['room'];

if(strlen($room)>20){
    $message="Please choose a name between 2 to 20";
    echo '<script language="javascript"> ';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/PHP%20Projects/Chatroom%20using%20Php%20and%20Jquery/"';
    echo '</script>';
}
else if(!ctype_alnum($room)){
    $message="Please choose a  alpha numeric room name";
   echo '<script language="javascript"> ';
   echo 'alert("'.$message.'");';
   echo 'window.location="http://localhost/PHP%20Projects/Chatroom%20using%20Php%20and%20Jquery/"';
   echo '</script>';
}
else{
    //connect to the database
    include '_dbconnect.php';
}
//Check if the room exist
$sql="select * from rooms where roomname= '$room'";
$result=mysqli_query($conn,$sql);
if($result){
    if(mysqli_num_rows($result)>0){
             //The mysqli_num_rows() function returns the number of rows in a result set.
    $message="Please choose a different name, this name is already exist";
    echo '<script language="javascript"> ';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/PHP%20Projects/Chatroom%20using%20Php%20and%20Jquery/"';
    echo '</script>';

    }
    else{
        $sql="INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '$room', current_timestamp()); ";
        if(mysqli_query($conn,$sql)){
            $message="Your room is ready and you can chat now";
            echo '<script language="javascript"> ';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/PHP%20Projects/Chatroom%20using%20Php%20and%20Jquery/room.php?roomname='.$room.'"';
            echo '</script>';

        }
    }

}
?>