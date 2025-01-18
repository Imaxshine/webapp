<?php
    if(!$_SERVER['REQUEST_METHOD'] === "GET"){
        echo "Only GET method is required";
        exit;
    }
    if(isset($_POST['submit']) && isset($_POST['check_time'])){
        $name = (string) $_POST['name'];
        $pass = $_POST['password'];
        $time = time() - $_POST['check_time'];
        if($time < 5){
            die("Request fields not for the bots");
        }else{
            echo "Welcome {$name} | Your passwords is {$pass}";
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="name" placeholder="Andika jina lako hapa" required><br><br>
        <input type="password" name="password" placeholder="Weka neno siri" required><br><br>
        <input type="hidden" name="check_time" value="<?php echo time(); ?>">
        <input type="submit" name="submit" value="Tuma">
    </form>
</body>
</html>
