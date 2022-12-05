<?php
    header("Content-type: text/css; charset: UTF-8");
    session_start();
    if($_SESSION['current']=="reg"){
        $current='#reg-btn';
    }
    if($_SESSION['current']=="home"||$_SESSION['current']=="index"){
        $current='#home-btn';
    }
    if($_SESSION['current']=="account"){
        $current='#acc-btn';
    }
    if($_SESSION['current']=="Admin"){
        $current='#admin-btn';
    }
    if($_SESSION['current']=='login'){
        $current='#login-btn';
    }
?>
<?php echo $current ?> {
    background-color: rgba(17, 0, 255, 0.315);
}
.nav{
    display:flex;
    position: relative;
    justify-content: center;
    animation-duration: 2s;
    animation-name: sliding;
    background-color: rgba(49, 88, 160, 0.199);
    height: 1.2cm;
    margin-top: 1ch;
    width: 100%;
}

button{
    height: 0.7cm;
    color: rgb(255, 255, 255);
    background-color: rgba(47, 0, 255, 0.521);
    border:0ch;
    border-radius: 8px;
    margin-bottom: 1cm;
    margin-top: 1cm;
    border-color: black;
    width: 4cm;
    font-family:cursive;
    font-weight: 900;
    transition: 1s;
}
.nav button{
    margin-left: 0.01cm;
    margin-right: 0.01cm;
    margin-top: 1ch;
    height: 0.8cm;
    font-family: cursive;
    font-weight: bolder;
    font-size: 11pt;
    background-color: rgba(0, 0, 0, 0);
}
button:hover{
    background-color: rgba(255, 255, 255, 0.432);
    color:rgb(37, 9, 90);
    cursor: pointer;
    animation-duration: 1s;
    animation-name: fill;
    height: 0.9cm;
}
a{
    color:inherit;
    text-decoration: none;
}
.container{
    text-align: center;
    align-self: center;  
    display: block;
    margin-top:4cm;
}
.loginbox{
    border:1px solid rgba(255, 255, 255, 0.11);
    border-radius: 10px;
    background-color: rgba(49, 88, 160, 0.082);
    width: 7cm;
    height: 6cm;
    display: inline-table;
    animation-duration: 2s;
    animation-name: sliding;
    padding: 20px;
}
.loginbox input , .registerbox input{
    height: 0.5cm;
    width: 5cm;
    font-family: 'Segoe UI';
    width: 4cm;
    border: 1px solid black;
    border-radius: 5px;
    margin: 10px;
    margin-top: 1cm;
    background-color: rgb(255, 255, 255);
    text-align: center;
    font-weight: bold;
    color: black;
}
.loginbox input:hover , .registerbox input:hover{
    border:3px solid blue;
    font-style: italic;
}
.registerbox{
    border:1px solid rgba(255, 255, 255, 0.11);
    border-radius: 10px;
    background-color: rgba(49, 88, 160, 0.082);
    width: 8cm;
    height: 5cm;
    display:inline-table;
    animation-duration: 2s;
    animation-name: sliding;
    margin-top: -1.5cm;
    padding: 20px;
}
.forgot-password{
    font-size: 10pt;
    font:smaller;
    margin-bottom: 5px;
    margin-left: 0.3cm;
    color: white;
    text-align:left;
    display: block;
    font-family: cursive;
}
.forgot-password:hover{
    color: blue;
    cursor: pointer;
}
.website-title{
    font-size: 12pt;
    font-family: sans-serif;
    font-weight: bolder;
    font-style: italic;
    text-align:right;
    color: rgb(245, 245, 245);
    padding: 0cm;
}
.website-title{
  align-self: center;
  margin: 20px;
}
#cart-img-container:hover{
    cursor: pointer;
}
#cart-img{
    width: 45px;
    height: 45px;
    background-color: coral;
}
#cart-img:hover{
    cursor: pointer;
    filter:invert();
}
#cart-section{
    background-color: crimson;
    position: center;
}
.hello{
    margin-left: 3cm;
    margin-right: 3cm;
    color:white;
    font-size: 12pt;
   font-family: 'Segoe UI';
   position: relative;
   top: 20%;
   -ms-transform: translateY(-50%);
   transform: translateY(-50%);
}
body{
    margin: 0px;
    background:fixed 100%;
    background-image: linear-gradient(rgba(0,0,0,0.7),
    rgba(0,0,0,0.7)),url("bgimg.jpg");
    background-size:cover;
    background-repeat: no-repeat;
    padding: 0px;
}
*{
    max-width: 100vw;
}
.user-info-container{
    background-color: rgba(49, 88, 160, 0.199);
    width: fit-content;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}
.user-info{
    color:white;
    font-family: 'Segoe UI';
    font-size: 10pt;
    margin-left: 10px;
}
.edit-title{
    color: white;
    text-align: center;
    font-family: 'Segoe UI';
    font-weight: bold;
    font-size: 18pt;
}
.buttons{
    display: flex;
    margin-left: 20px;
}
.buttons button{
    margin: 20px;
}
.edit-form-container{
    background-color: rgba(0, 0, 0, 0.534);
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	justify-content: center;
	align-items: center;
    display: none;
}
.form-container{
    height: fit-content;
	width: 500px;
	background-color: white;
	text-align: center;
	padding: 20px;
	position: relative;
	border-radius: 20px;
    margin-top: 10%;
    margin-left: auto;
    margin-right: auto;
}
.form-container input:not(.username-input){
    margin: 25px auto;
	display: block;
	width: 50%;
	padding: 8px;
	border: 1px solid gray;
    
}
.close , .close2 , .close-cart , .close-food-edit {
	position: absolute;
	top: 0;
	right: 10px;
	font-size: 42px;
	color: #333;
	transform: rotate(45deg);
	cursor: pointer;
}
.close:hover , .close2:hover , .close-cart:hover{
		color: rgba(23, 7, 252, 0.712);
}
.form-container button{
    background-color: rgba(47, 0, 255, 0.692);
    margin-top: 0.1cm;
}
.username-input{
    margin: 25px auto;
	display: block;
	width: 50%;
	padding: 8px;
	border: 1px solid gray;
    font-style: unset;
    cursor: unset;
}
.username-input:hover{
    font-style: unset;
    cursor: unset;
}
.username-input:focus{
    outline: unset;
}
.delete-form-container{
    background-color: rgba(0, 0, 0, 0.534);
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	justify-content: center;
	align-items: center;
    display: none;
}
#file-upload , #file-upload:hover{
    min-width:fit-content;
    border:unset;
    height:fit-content;
}
label{
    color:white;
    margin-top: 25px;
    font-family: 'Segoe UI';
    font-weight: bolder;

}
.Not-Authozied-body{
    padding:20px;
    position: absolute;
}
.not-auth-div{
    background-color:rgba(241, 0, 0, 0.425);
    width: fit-content;
    height: fit-content;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    position:center;
    margin-top: 15%;
}
.not-auth{
    font-size: 20pt;
    color: white;
    font-family: cursive;
}
.upload-box{
border:1px solid rgba(255, 255, 255, 0.11);
border-radius: 10px;
background-color: rgba(49, 88, 160, 0.082);
width: 8cm;
height: 5cm;
display:inline-table;
animation-duration: 2s;
animation-name: sliding;
-ms-zoom-animation: inherit;
margin-top: -1.5cm;
padding: 20px;
}
.upload-box input{
    height: 0.6cm;
    min-width: fit-content;
    font-family: 'Segoe UI';
    width: 4cm;
    border: 1px solid black;
    border-radius: 5px;
    margin: 10px;
    margin-top: 1cm;
    background-color: rgb(255, 255, 255);
    text-align: center;
    font-weight: bold;
    color: black;
}
#category{
    display: block;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-top: 15px;
    margin-bottom: -10px;
    background-color: rgba(13, 18, 90, 0.452);
    color:white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
}
#category option{
    background-color: rgba(13, 18, 90, 0.726);
    color:white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
}
.cards-container{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    
}
.card{
    background-color: rgba(187, 187, 187, 0.418);
    width: 270px;
    height: 340px;
    margin: 10px;
    padding: 10px;
    position: relative;
    transition: transform 1s;
}
.card-img{
    height: 150px;
    margin-bottom: 15px;
    background-size:contain;
    min-width: fit-content;
    background-repeat: no-repeat;
    position: relative;
    margin-left: 25%;
}
.delete-button{
    transform: rotate(45deg);
    position: absolute;
	top: 0;
    right: 10px;
    font-size: 20pt;
    color: red;
}
.delete-msg{
    visibility: hidden;
    width: 50px;
    font-size: 9pt;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: rgba(13, 18, 90, 0.726);
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
    position: absolute;
    right: 10px;
    top:10px;
    z-index: 1;
}
.hov{
    position: absolute;
	top: 0;
    right: 10px;
    font-size: 20pt;
    color: red;   
}
.hov:hover .delete-msg{
    visibility: visible;
    transform:none;
}
#edit-food-btn{
    position: absolute;
    margin-left: 20%;
    display: block;
    bottom: 0px;
}
.food-title{
    color: black;
    font-family: cursive;
    text-align: center;
    font-weight: bold;
    margin: 0;
}
.food-ing{
    font:black;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    opacity: 0;
    margin:10px;
}
.food-price{
    font:black;
    font-weight: 700;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    position: absolute;
    bottom: 5px;
    margin-bottom: 5px;
}
.card:hover{
    background-color:rgba(0, 0, 0, 0.281) ;
    transform: scale(0.9);
}
.card:hover .food-title{
    color: white;
}
.card:hover .food-ing{
    animation-name: fadein;
    animation-duration: 2s;
    opacity: 100;
    color: white;
}
@keyframes fadein {
    from{
        opacity: 0;
    }
    to{
        opacity: 100;
    }
}
.card:hover .food-price{
    color: white;
}
.add-cart-btn{
    position: absolute;
    bottom:0px;
    margin-left: 20%;

}
.cart-container-container{
    background-color: rgba(0, 0, 0, 0.534);
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
    display: none;
    padding: 0%;
}
.cart-container{
    height: fit-content;
	width: 800px;
	background-color: white;
	text-align: center;
	padding: 50px;
	position: relative;
	border-radius: 0px;
    margin-top: 10%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 20px;
}
table{
    width: 100%;
    border-collapse: collapse;
    color: black;
    font-family:cursive;
}

td,th{
    text-align: center;
    font-weight: bold;
    /* background-color:rgba(16, 102, 66, 0.342); */
}
thead{
    border-bottom: 1px solid rgba(102, 10, 10, 0.753);
    color:red;
    background-color: rgba(18, 16, 150, 0.404);
    font-weight: bolder;
}
.cart-container button{
    background-color: rgb(76, 0, 255);
}
.cart-container button:hover{
    background-color: rgba(76, 0, 255, 0.336);
    animation: changecolor 1s ;
    transition: 1s;
}
@keyframes changecolor {
from{
    background-color: rgb(76, 0, 255);
}    
to{
    background-color: rgba(76, 0, 255, 0.336);
}
}
#total{
    background-color: rgba(18, 16, 150, 0.404);
}
#cart-indicator{
    position: fixed;
    right: 211px;
    top:9px;
    font-family: cursive;
    font-size: 8pt;
    font-weight: bold;
    color: blue;
    width: fit-content;
    height: fit-content;
    padding:2px;
}
#reduce-quantity-btn , #add-quantity-btn {
width: 1cm;
position: relative;
}
#quantity{
    position: relative;
}
#remove-btn{
    width: fit-content;
    position: absolute;
    margin-left: 10px;
}
#clear-cart{
    bottom: -20px;
    width: 2cm;
    left: 45%;
    position: absolute;
}
#order{
    font-family: cursive;
    margin: 0px;
    top: 0px;
    left: 50px;
    right: 50px;
    position: absolute;
}
#breakfast , #main , #desserts{
    background-color: rgba(6, 13, 110, 0.418);
    color: white;
    text-align: center;
    font-family: cursive;
}
.slides{
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}
.slide{
    background-color: #fff;
    width: 150px;
    margin: 10px;
    padding: 10px;
    position: relative;
    transition: transform 1s; 
}
.img{
    height: 150px;
    background-repeat: no-repeat;
    background-size: contain;
}
#edit-food-container{
    background-color: rgba(0, 0, 0, 0.534);
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	justify-content: center;
	align-items: center;
    display: none;
}
#edit-food-form{
    height: fit-content;
	width: 500px;
	background-color: white;
	text-align: center;
	padding: 20px;
	position: relative;
	border-radius: 20px;
    margin-top: 10%;
    margin-left: auto;
    margin-right: auto;
    justify-content: center;
}
#edit-food-form input{
    margin: 25px auto;
	display: block;
	width: 50%;
	padding: 8px;
	border: 1px solid gray;
}

#edit-title-label{
    color: black;
    position: absolute;
    top:25px;
    left: 40px;
    margin-right: 50px;
}
#edit-ing-label{
    color: black;
    position: absolute;
    top:80px;
    left: 40px;
    margin-right: 50px;
}
#edit-price-label{
    color: black;
    position: absolute;
    top:140px;
    left: 40px;
    margin-right: 50px;
}
    @keyframes sliding {
    from {
      margin-right: -100%;
    
    }
  
    to {
      margin-right: 0%;
    }
}
    @keyframes fill{
        from{
            height: 0.8cm;
            color: rgb(255, 255, 255);
            background-color: rgba(47, 0, 255, 0.521);
    
        }
        to{
            height: 0.9cm;
            background-color: rgba(255, 255, 255, 0.432);
            color:rgb(37, 9, 90);
        }
    }
