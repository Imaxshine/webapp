async function reloadNewdata(){
    try{
        let feedback = await fetch('database.php'); //database.php
        if(feedback.ok){
            const toShow = document.querySelector("#results");
            let newData = await feedback.text();
            toShow.innerHTML = newData;
        }else{
            throw new Error(`${feedback.status}, ${feedback.statusText}`);
        }
    }catch(e){
        let showError = document.querySelector("#results")
        console.error('Error. ',e);
        showError.innerHTML = `${e}`;
    }
}
setInterval(reloadNewdata,1000);