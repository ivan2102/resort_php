<?php  
require_once("../../config.php");

if(isset($_GET['id'])) {

    $query_delete_image = query("SELECT slide_image FROM slides WHERE slide_id= " . escape_string($_GET['id']) . " ");
    confirm($query_delete_image);

    $row = fetch_array($query_delete_image);
    $target_path = UPLOAD_DIRECTORY . DS . $row['slide_image'];
    unlink($target_path);

    $query = query("DELETE FROM slides WHERE slide_id= " . escape_string($_GET['id']) . " ");
    confirm($query);
    set_message("Slide deleted successfully");
    redirect("../../../public/admin/index.php?slides");

}else {

    redirect("../../../public/admin/index.php?slides");
}























?>