<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Web App with AJAX</title>
    <style>
        /* weka.html-sytles */
        .myctn{
            width: 340px;
            margin: 40px auto;
            box-shadow: 5px 6px 7px 0 rgba(0,0,0,0.5);
            padding: 15px 20px;
        }
        .bi-plus{
            font-size: 19px;
            color: rgb(143, 46, 255);
        }
    </style>
</head>
<body>
<!-- <button id="btn" onclick="loadData()">View new data</button> -->
<!-- <p id="view"></p> -->
<div id="results">Inapakia data...</div>


<!-- Weka.html  -->
<div class="myctn">
    <form id="formInfo" enctype="multipart/form-data">
        <label for="duka">Jina la duka</label><br>
        <input type="text" name="duka" id="duka" placeholder="Jina la duka" required><br><br>

        <label for="file">Chagua picha</label><br>
        <input type="file" name="file" id="file" required><br><br>

        <label for="eneo">Eneo</label><br>
        <input type="text" name="eneo" id="eneo" placeholder="Eneo" required><br><br>

        <button type="button" onclick="AddData()"><i class="bi bi-plus"></i> Ongeza bidhaa</button>
    </form>
    <p class="any-alert"></p>
</div>
<!-- End Weka.html  -->

<script>
    // Function to load data
    // const theBtn = document.querySelector('#btn');
    function loadData(){
        // create xmlhttprequest object
        const xhr = new XMLHttpRequest();
        // open the request method
        xhr.open('POST','database.php',true);
        xhr.onload = function(){
            // check the HTTP Responses is 200 ore < 202
            if(xhr.status < 202){
                document.querySelector("#view").innerHTML = xhr.responseText;
            }else{
                document.querySelector("#view").innerHTML = "Failed to send or reserve requests";
            }
        }
        //sending a requests
        xhr.send();
    }

    // Function to delete data
    function deleteData(id){
        if(confirm(`Je ungependa kufuta bidhaa hii?`)){
            let xhr = new XMLHttpRequest();
            xhr.open("GET","delete.php?id=" + id, true);
            xhr.onload = ()=>{
                if(xhr.status === 200){
                    // alert('Data imefutwa kikamilifu');
                    loadData();
                }else{
                    alert('Kuna tatizo, Data  haikufanikiwa kufutwa');
                }
            }
            xhr.send();
        }

    }
    setInterval(loadData, 1000);
</script>
<script src="ajax.js"></script>
<script src="fetch.js"></script>
</body>
</html>
