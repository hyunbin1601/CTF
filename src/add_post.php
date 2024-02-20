<?php
include "common.php";

$title = $_POST["title"];
$content = $_POST["content"];

$ALLOWED_EXTENSIONS = ['png', 'jpg', 'jpeg', 'gif'];

$post = [];
$post["id"] = $_SESSION["post_id_counter"];
$post["title"] = $title;
$post["content"] = $content;
if (isset($_FILES["file"])) {
    $uploaded_file_name_tmp = $_FILES[ 'file' ][ 'tmp_name' ];
    $uploaded_file_name = $_FILES[ 'file' ][ 'name' ];
    $extension_check = explode('.', $uploaded_file_name);
    if (!in_array($extension_check[1], $ALLOWED_EXTENSIONS)) {
    	die("<script>alert('not allowed file'); location.href='/';</script>");
    }
    $upload_folder = "uploads/";
    move_uploaded_file( $uploaded_file_name_tmp, $upload_folder . $uploaded_file_name );
    $post["file_url"] = $uploaded_file_name;
}
$post["upload_date"] = date("Y-m-d H:i:s");

array_push($_SESSION["bulletin_board"], $post);
$_SESSION["post_id_counter"] = $_SESSION["post_id_counter"] + 1;

die("<script>location.href = '/';</script>");
?>
