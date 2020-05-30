<?php 
require_once("../../config.php");


if(isset($_GET['id'])) {

    $query = query("DELETE FROM rooms WHERE room_id=" . escape_string($_GET['id']) . " ");
    confirm($query);

    set_message("Room Deleted Successfully");
    redirect("../../../public/admin/index.php?rooms");
} else {

    redirect("../../../public/admin/index.php?rooms");
}









?>