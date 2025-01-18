// Page title
function LoadTitle(){
    const Title = document.querySelector(".title");
    if(Title.textContent === "Login to the system"){
        Title.textContent = "Ingia kwenye mfumo";
    }else if (Title.textContent === "Ingia kwenye mfumo"){
        Title.textContent = "Login to the system";
    }
}
setInterval(LoadTitle,3000)

//Form title
function play_form_Title(){
    const formTitle = document.querySelector('.form-title')
    if(formTitle.textContent === "Sign - in form")
    {
        formTitle.textContent = "Fomu ya kuingia";
    }else if (formTitle.textContent === "Fomu ya kuingia")
    {
        formTitle.textContent = "Sign - in form";
    }
}
setInterval(play_form_Title,6000);

// Tuchunguze picha zilizochaguliwa
const imageGrade = document.getElementById("imgGrade");
const form = document.getElementById("form_catch");
//my array
let selectedImages = [];

//Listen to a container with images
imageGrade.addEventListener('click',(e)=>{
    if(e.target.tagName === "IMG"){
    const img = e.target;
    const imgType = img.getAttribute("data-type")
        const imgIndex = selectedImages.indexOf(img);
    if (imgIndex > -1){
        //Ondoa picha kama ipo kwenye array
        img.classList.remove("selected")
        selectedImages.splice(imgIndex,1)
    }else{
        img.classList.add("selected")
        selectedImages.push(img)
    }
    }
});
//captcha the form before
form.addEventListener('submit',e=>{
    e.preventDefault();
    const wantedImage = selectedImages.every(img=>img.getAttribute("data-type") === "flower");
    if(wantedImage && selectedImages.length === 4){
        alert("Umefanikiwa");
        form.submit();
    }else{
        alert("Tafadhali, hakikisha umechagua picha zote zenye maua kwa usahihi");
    }
})