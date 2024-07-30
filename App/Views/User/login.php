<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    /* General Styles */
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Full height of the viewport */
        background-color: #f4f4f4;
    }

    /* Form Styles */
    .form-container {
        width: 300px;
    }

    h2 {
        text-align: center;
    }

    .form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .button {
        width: 100%;
        padding: 10px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .button:hover {
        background-color: #45a049;
    }

    .form-bot-2 {
        text-align: center;
        margin-top: 15px;
    }

    .chtk {
        color: #007bff;
    }

    .chtk:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <?php if(isset($_SESSION['loi'])): ?>
        <p style="color: red;"><?=$_SESSION['loi']?></p>
        <?php endif; ?>
        <form method="post" action="" class="form">
            <label for="email">Email:</label>
            <input type="text" name="email" required>
            <br>
            <label for="matKhau">Password:</label>
            <input type="password" name="matKhau" required>
            <br>
            <button class="button" type="submit">Login</button>
        </form>
        <div class="form-bot-2">
            <a href="<?=PROURL?>/user/dangky" class="chtk">Chưa có tài khoản?</a>
        </div>
    </div>
</body>

</html>