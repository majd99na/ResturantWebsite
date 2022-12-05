
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
function submitform(s){
var name='form'+s;
document.getElementById(name).submit();
}
function cart(){
    if(document.getElementById('footer').style.left!="0px"){
    document.getElementById('footer').style.left="0px";
    document.getElementById('cart').style.transform="rotate(180deg)";
    }
    else{
    document.getElementById('cart').style.transform="rotate(0deg)";
    document.getElementById('footer').style.left="-80px";
    }
}
window.onload=function(){
document.getElementById('cart-img-container').addEventListener('click',function(){
    document.querySelector('.cart-container-container').style.display="block";
});
document.getElementById('cart-indicator').addEventListener('click',function(){
    document.querySelector('.cart-container-container').style.display="block";
});
document.querySelector('.close-cart').addEventListener('click',function(){
    document.querySelector('.cart-container-container').style.display="none";
});
document.getElementById('edit-food-btn').addEventListener('click',function(){
    document.getElementById('edit-food-container').style.display="block";
});
document.querySelector('.close-food-edit').addEventListener('click',function(){
    document.getElementById('edit-food-container').style.display="none";
});
}