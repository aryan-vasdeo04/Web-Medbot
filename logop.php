<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In As</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        div{
            padding-top: 10px;
            background-color: #f1f1f1;
            margin: 0 auto;
            width: 25%;
            text-align: center;
            margin-top: 10%;
            height: 250px;
        }
        input{
            cursor: pointer;
            width: 70%;
            height: 50px;
            border-radius: 10px;
            border: none;
            background-color: #333;
            color: white;
            font-size: 20px;
            margin: 10px;
        }
        header{
            width: 100%;
            height: 50px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-content: center;
            flex-wrap: wrap;
            background-color: #333;
            color: white;
            font-size: 20px;
            margin: 0;
        }
    </style>
</head>
<body>
    <header>Log In As</header>
    <div>
        <a href="loguser.php">
            <input type="button" value="Log In As User">
        </a>
        <a href="logdoc.php">
            <input type="button" value="Log In As Doctor">
        </a>
        <a href="loghos.php">
            <input type="button" value="Log In As Hospital">
        </a>

        <p>Not have an account <a href="sign.php">Sign up here</a></p>
    </div>
</body>
</html>