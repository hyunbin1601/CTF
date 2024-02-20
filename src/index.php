<?php
include "common.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        .write-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }

        .write-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>게시판 목록</h1>

    <!-- 게시판 테이블 -->
    <table>
        <tr>
            <th>제목</th>
            <th>업로드 날짜</th>
        </tr>
	<?php
	foreach ($_SESSION["bulletin_board"] as $post) {
            echo "<tr>";
	    echo "<td><a href=\"./view_post.php?id=".$post["id"]."\">".$post["title"]."</a></td>";
	    echo "<td>".$post["upload_date"]."</td>";
	    echo "</tr>";
	}
	?>
    </table>

    <!-- 글쓰기 버튼 -->
    <a class="write-button" href="./write_post.php">글쓰기</a>

</body>
</html>

