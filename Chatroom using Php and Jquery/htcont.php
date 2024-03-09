<?php
//connect to the database
include '_dbconnect.php';
$room = $_POST['room'];
$sql = "select msg,stime,ip from msg where room='$room'";

$html_content= "";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $html_content= $html_content. '<li class="clearfix">
        <div class="message-data text-right">
            <span class="message-data-time">
                <?php
                date_default_timezone_set("Asia/Kolkata");
                echo date("h:i A") . ", Today" ?>
            </span>
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
        </div>';
        $html_content= $html_content. ' <div class="message other-message float-right msg" style="margin:5px">' . $row['msg'] . ' 
        </div>
    </li>';
    }
}
echo $html_content;
