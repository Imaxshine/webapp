<?php
require 'config.php';
global $conn;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duka products</title>
    <style>
        body{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        .tb-body{
            width: 500px;
            height: auto;
            margin: 0 auto;
            box-shadow: 5px 6px 7px 0 rgba(0,0,0,0.5);
            padding: 15px 20px;
        }
        /* .main-body{
            overflow-y:auto;
        } */
        thead tr th{
            background-color:#000000;
            color: #ccc;
        }
        tbody tr td{
            border: 1px solid #ddd;
            padding: 3.4px;
        }
        .img{
            width: 100px;
            height: 100px;
            border-radius: 50px;
            cursor: pointer;
            border: 2px solid #45d;
        }
        .img:hover{
            border: 4px solid #45d;
        }
        .body-image{
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.1),rgba(0,0,0,0.1));
            position: fixed;
            display: none;
            justify-content: center;
            align-items: center;
        }
        .my-image{
            width: 400px;
            height: 400px;
            /* background-color: #45d; */
        }
        .page-container{
            display: flex;
            justify-content: center;
        }
        .page-container ul li{
            display: inline;
            margin: 0 4px;
            background: #928080;
            padding: 0.3em;
            border-radius: 6px;
        }
        .page-container ul li:hover{
            background: #0000ff;
        }
        .active{
            background: #ff0000;
            padding: 2px;
            border-radius: 6px;
        }
        .page-container ul li a{
            text-decoration: none;
            color: #ffffff;
        }
        .previous-btn a, .next-btn a{
            text-decoration: none;
        }
        .previous-btn,.next-btn,.pages-link{
            padding: 8px 11px;
            background: #4455dd;
            color: #cccccc;
        }
        .previous-btn:hover{
           transform: translateY(5px);
        }
        .next-btn:hover{
            transform: translateY(5px);
        }
        .previous-btn,.next-btn{
            margin-left: 100px;
            border: none;
            border-radius: 10px;
            box-shadow: 4px 4px 5px 4px rgba(0,0,0,0.2);
        }
        .link-container{
            border: 1px solid #ddd;
            margin: 20px auto;
            padding: 8px 5px;
            display: flex;
            /*flex-wrap: wrap;*/
            width: 50%;
            overflow: scroll;

        }
    </style>
</head>
<body>
    <div class="body-image">
        <div class="my-image"></div>
    </div>
    <div class="tb-body main-body">
        <table style="border: 1px solid; padding: 4px;">
            <thead>
                <tr>
                    <th>#</th>
                    <th title="Shorp name">Jina la duka</th>
                    <th title="photos">Picha</th>
                    <th title="Location">Eneo</th>
                    <th title="Actions">Vitendo</th>
                </tr>
            </thead>
            <!-- Php code -->
             <?php
             $count = "SELECT COUNT(*) FROM `duka`";
             $result1 = $conn->query($count);
             $totalRows = $result1->fetch_row()[0];
             $limit = 2;
             $page_show = 2;
             $Pages = ceil($totalRows / $limit);
//             echo $Pages;
            $page_no = isset($_GET['page'])? $_GET['page'] : null;
            if($page_no > $Pages){
                $page_no = 1;
            }elseif ($page_no == 0){
                $page_no = $Pages;
            }

             $offset = $page_show * ($page_no - 1);
                 $sql = "SELECT * FROM `duka` LIMIT {$offset},{$limit}";
                $result = $conn->query($sql);
                // Check if there is any data in row
                if($result->num_rows > 0){
                $id_num = 1;
                    while($data = $result->fetch_assoc()){?>
                        <tbody>
                            <tr>
                                <td><?php print $id_num++; ?></td>
                                <td><?php print $data['jina_duka']; ?></td>
                                <td>
                                    <img class="img" onclick="zoomImg('<?php print $data['image']; ?>')" src="upload/<?php print $data['image'] ?>" alt="photo">
                                </td>
                                <td><?php print $data["eneo"]; ?></td>
                                <td>
                                    <a href='editor/<?php echo $data['duka_id']; ?>'>Edit</a> |
                                    <button onclick='deleteData("<?php echo $data["duka_id"]; ?>")' class="btn">Delete</button> |
                                    <a href="view/<?php echo $data['duka_id']."/".$data['jina_duka']; ?>">view</a>
                                </td>
                                
                            </tr>
                        </tbody>

                    <?php
                    }

                }
             ?>
        </table>
        <nav class="page-container">
            <ul>
                <button class="previous-btn"><a class="pages-link" href="database.php?page=<?php echo $page_no - 1; ?>">Previous</a></button>
                <?php
                echo "<div class='link-container'>";
                for($i=1; $i <= $Pages; $i++){?>
                    <li ><a class="<?php if($page_no == $i){echo "active";} ?>" href="database.php?page=<?php echo $i; ?>"><?php echo $i;  ?> </a></li>
                <?php
                }
                echo "</div>";
                ?>
                <button class="next-btn"><a class="pages-link" href="database.php?page=<?php echo $page_no + 1;?>">Next</a></button>
            </ul>
        </nav>
    </div>
    <script>
        function zoomImg(img){
            // Take important parts
            const bodyImage = document.querySelector('.body-image');
            const toviewImage =document.querySelector('.my-image');
            // display bodyImage
            bodyImage.style.display = "flex";
            // Remove any picture within a toviewImage ton insure that is empty.
            toviewImage.innerHTML = "";
            // create DOM / HTML Element
            $newImage = document.createElement('img');
            // add src attribute so as make a path
            $newImage.src="upload/" + img;
            //Add scales
            $newImage.style.width = "100%";
            $newImage.style.height = "100%";
            // Insert a photo into .my-image by appending new element
            toviewImage.append($newImage);
            // Remove bodyImage by click any where from the screen
            bodyImage.onclick = ()=>{
                bodyImage.style.display = "none";
            }
        }
    </script>
</body>
</html>