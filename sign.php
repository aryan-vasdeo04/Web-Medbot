<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In As</title>
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
    <header>Sign Up</header>
    <div>
        <a href="signuser.php">

            <input type="button" value="Sign Up As User">
        </a>
        <a href="signdoc.php">

            <input type="button" value="Sign Up As Doctor">
        </a>
        <a href="signhos.php">

            <input type="button" value="Sign Up As Hospital">
        </a>
        <p>Have an account <a href="logop.php">Log In here</a></p>
    </div>
</body>
</html>
