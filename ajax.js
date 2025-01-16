    function AddData() {
    const formHolder = document.getElementById('formInfo');
    const allFormData = new FormData(formHolder);

//apply AJAX to sending a form data to the saver
    const xhr = new XMLHttpRequest();
//start to request
    xhr.open('POST', 'insert_data.php', true);
//reload the specific data
    xhr.addEventListener('load', function () {
        if (xhr.status === 200) {
            document.querySelector('.any-alert').inner = alert(xhr.responseText);
            setTimeout(function () {
                document.querySelector('.any-alert').innerText = "";
                formHolder.reset();
            }, 1000)
        }else{
            document.querySelector('.any-alert').innerText = "We failed to add a new data!"; 
            function Errors(){
                document.querySelector('.any-alert').innerText = "";
            }
            setTimeout(Errors,4000);
            // setTimeout(function () {
            //     document.querySelector('.any-alert').innerText = "Tumeshindwa kuifadhi data mpya, jaribu tena!";
            // }, 4000)
        }
    });
//sending a requests
    xhr.send(allFormData);

}