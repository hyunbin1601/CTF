<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>새 글 작성</h1>

    <!-- 글쓰기 폼 -->
    <form action="./add_post.php" method="post" enctype="multipart/form-data">
        <label for="title">제목:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="content">내용:</label>
        <textarea id="content" name="content" required></textarea>
        <br>
        <label for="file">파일 업로드:</label>
        <input type="file" id="file" name="file" accept=".png, .jpg, .jpeg, .gif">
        <br>
        <input type="submit" value="게시물 추가">
    </form>

    <!-- 메인 페이지로 돌아가는 버튼 -->
    <a class="write-button" href="/">메인 페이지로 돌아가기</a>
</body>
</html>

