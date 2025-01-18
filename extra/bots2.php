<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title class="title">Login to the system</title>
    <style>
        .form-title{
            text-align: center;
            font-weight: bold;
            font-family: Verdana,Arial,Tahoma;
            color: #aaadda;
        }
        .container{
            display: grid;
            justify-content: center;
            margin: 30px auto;
            padding: 9px 10px;
            box-shadow: 4px 3px 5px 5px rgba(0,0,0,0.3);
            width: 400px;
        }
        .imgGrid img{
            width: 70px;
            height: 70px;
        }
        .imgGrid{
            display: grid;
            grid-template-columns: repeat(3, 70px);
            gap: 10px;
        }
        .notification-title{
            color: #f00fda;
            margin-bottom: 10px;
            font-family: Verdana,Arial,Tahoma;
            animation: Notification 3s infinite;
        }
        @keyframes Notification {
            0%{
        scale: 1;
            }
        50%{
            scale: 1.01;
        }
        80%{
            scale: 1.03;
        }
        100%{
            scale: 1;
        }
        }
        .selected{
            border: 2px solid #ff0000;
            border-radius: 6px;
        }
        .btn{
            width: 100%;
            height: 30px;
            border: none;
            border-radius: 12px;
            background: blue;
            color: #fff;
            font-family: Verdana,Arial,Tahoma;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4 class="form-title">Sign - in form</h4>
        <form id="form_catch" action="test.php" method="post">
            <input type="text" placeholder="Enter your Email" required><br><br>

            <input type="password" placeholder="Enter your password" required><br>
            <p class="notification-title">Wewe sio roboti? Chagua picha zote zenye maua kudhibitisha sio roboti</p>
            <div class="imgGrid" id="imgGrade">
                <img src="photos/ua1.jpg" alt="photo" data-type="flower">
                <img src="photos/motor.jpg" alt="photo" data-type="not_flower">
                <img src="photos/ua3.jpg" alt="photo" data-type="flower">
                <img src="photos/ua2.jpg" alt="photo" data-type="flower">
                <img src="photos/mti.jpg" alt="photo" data-type="not_flower">
                <img src="photos/ua4.jpg" alt="photo" data-type="flower">
            </div>
            <br>
            <button class="btn" type="submit">Tuma</button>
        </form>
    </div>
    <script src="bots2.js"></script>
</body>
</html>