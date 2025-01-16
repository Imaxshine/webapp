<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
        nav ul li{
            display: inline;
            padding: 4px 4px;
            margin-top: 10px;
        }
        nav ul li a{
            text-decoration: none;
            font-size: 19px;
            font-weight: bold;
            color: #fff;
            padding: 3px 5px;
            transition: 0.2s linear 0.2s;
        }
        nav ul li a:hover{
            background-color: #0000ff;
        }
        .nav-bar{
            display: flex;
            justify-content: center;
            background: linear-gradient(to left,#565656,#928080,#ff20ef);
            height: 40px;
            width: 100vw;
            position: fixed;
            top: 0;
        }
    </style>
</head>
<body>
    <div class="nav-bar">
        <nav>
            <ul>
                <li><a href="<?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/webapp/home"; ?>">Home</a></li>
                <li><a href="<?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/webapp/contact"; ?>">Contacts</a></li>
                <li><a href="<?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/webapp/about"; ?>">About</a></li>
                <li><a href="<?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/webapp/product"; ?>">Products</a></li>
                <li><a href="<?php echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/webapp/huduma"; ?>">Services</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>