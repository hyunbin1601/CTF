<?php
include "common.php";
$id = $_GET["id"];
if (empty($_SESSION["bulletin_board"][$id - 1]))
	die("<script>alert('post not found!'); location.href='/';</script>");
else 
	$post = $_SESSION["bulletin_board"][$id - 1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post["title"]; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: black;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #fff;
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            border: 1px solid #2980b9;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1><?php echo $post["title"]; ?></h1>
    <p><?php echo $post["content"]; ?></p>
    <p>업로드 날짜: <?php echo $post["upload_date"]; ?></p>

    <?php
    if ($post["file_url"])
        echo "<img src=\"./uploads/".$post["file_url"]."\" alt=\"Uploaded File\">";
    ?>

    <!-- 메인 페이지로 돌아가는 버튼 -->
    <a href="/">메인 페이지로 돌아가기</a>
</body>
</html>

