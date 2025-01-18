<?php
    include "menu.php";
    include "functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>services</title>
    <style type="text/css">
        .routing-div{
            width: 95vw;
            background: #ffffff;
            margin: 0 auto;
            height: calc(90vh - 70px);
            padding: 45px 10px;
            border: 2px solid;
            overflow: scroll;
        }

    </style>
</head>
<body>
    <div class="routing-div">
        <?php
        //Start a routing
        $request = $_SERVER['REQUEST_URI'];
        $destine = '/webapp/';
        $request2 = str_replace($destine,"",$request);
        //re-direct the pages
        $pathUrl = parse_url($request2);
        $path = isset($pathUrl["path"])? $pathUrl["path"] : "";
        $queryString = isset($pathUrl["query"])? $pathUrl["query"] : 1;
        parse_str($queryString,$_GET);
        if($request2 === "home")
        {
            home();
        }elseif ($request2 === "about"){
            about();
        }elseif($path === "product")
        {
            products();
        }elseif ($request2 === "contact")
        {
            contact();
        }
        elseif ($request2 === "huduma"){
            service();
        }elseif ($request2 === "")
        {
            home();
        }elseif (preg_match('/^edit\/([0-9]+)$/',$request2,$match))
        {
            $_GET['id'] = $match[1];
            edit();
        }elseif (preg_match('/^view\/([0-9]+)\/([a-zA-Z0-9]+)$/',$request2,$match))
        {
            $_GET['id'] = $match[1];
            $_GET['name'] = $match[2];
            viewData();
        }
        else{
            errorCode();
        }
        //create full url
//        echo $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REDIRECT_URL'];
//        echo "<pre>";
//        print_r($_SERVER);
//        echo "</pre>";
        ?>
    </div>
</body>
</html>