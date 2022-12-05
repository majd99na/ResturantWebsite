window.onload=function(){
document.querySelector('.change-pass-btn').addEventListener("click",function(){
    document.querySelector('.edit-form-container').style.display="block";
});
document.querySelector('.close').addEventListener("click",function(){
    document.querySelector('.edit-form-container').style.display="none";
});
document.querySelector('.delete-btn').addEventListener("click",function(){
    document.querySelector('.delete-form-container').style.display="block";
});
document.querySelector('.close2').addEventListener("click",function(){
    document.querySelector('.delete-form-container').style.display="none";
});


}

