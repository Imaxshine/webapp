<?php  
    if(isset($_POST['submit'])){
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];
        // create objects
        $firstDate = new DateTime($date1);
        $secondDate = new DateTime($date2);
        $diff = $firstDate->diff($secondDate);
        $diffDays = $diff->days;
        $output = "Kutoka Tarehe {$date1} mpaka Tarehe {$date2} kuna utofati ya siku {$diffDays}";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .date-container{
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 400px;
            background-color: #ccadda;
            margin: 20px auto;
            padding: 20px 22px;
        }
        .output{
            border: 1px solid #ddc;
            background-color: #aaadda;
            text-align: center;
            width: 400px;
            margin: 20px auto;
            border-radius: 10px;
        }
        input[type=submit]{
            background-color: blue;
            color: #ffffff;
            border: none;
            height: 25px;
            border-radius: 7px;
            box-shadow: 3px 2px 4px 3px rgba(0,0,0,0.4);
        }
    </style>
</head>
<body>
    <div class="date-container">
        <form action="#" method="post">
            <label for="date1">Date1</label><br>
            <input type="date" name="date1" id="date1" required><br><br>
            <label for="date2">Date2</label><br>
            <input type="date" name="date2" id="date2" required><br><br>
            <input type="submit" name="submit" value="Calculate">
        </form>
        <div class="output">
            <?php
                if(!empty($output)){
                    echo $output;
                }
            ?>
        </div>
    </div>
</body>
</html>