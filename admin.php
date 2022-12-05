<?php 
session_start();
$_SESSION['current']='Admin';
if(isset($_SESSION['user_id']))
    if($_SESSION['user_id']==1){
include 'DB.php';
include 'nav.php';
$errors = array();
$uploadedFiles = array();
if(isset($_POST['btnSubmit'])){
    if(!empty($_FILES['file']['name'])){
$extension = array("jpeg","jpg","png","gif","JPEG","JPG","PNG","GIF");
$UploadFolder="UploadFolder";
$UploadOk = true;
$temp=$_FILES['file']['tmp_name'];
$tmp = $_FILES['file']['name'];
$ing=$_POST['ing'];
$title=$_POST['title'];
$category=$_POST['category'];
$price=$_POST['price'];
// $filename=explode('.',$tmp)[0];
$file_ext=explode('.',$tmp)[1];
$devided = explode(' ',$title);
    $j=0;
     $file_name="";
    while($j<count($devided))
    {
        $file_name.=$devided[$j];
        if($j!=count($devided)-1){
        $file_name.="-";
        }
        $j++;
    }  
$full_file_name=$file_name.'.'.$file_ext;
$dir = "UploadFolder/".$full_file_name;
    //checking
    if(in_array($file_ext, $extension) == false){
        $UploadOk = false;
        array_push($errors, $title." is invalid file type");
    }
    if(file_exists($UploadFolder."/".$full_file_name) == true){
        $UploadOk = false;
        array_push($errors, $tmp." file already exists");
    }
    if($UploadOk == true){
        $insert_query="INSERT INTO food (Title,ingrediants,img_dir,Category,Price) 
        VALUES ('$title','$ing','$dir','$category','$price')";
        $db->query($insert_query)or array_push($errors,"Database insertion failed");
        if(count($errors)<1){
        move_uploaded_file($temp,$UploadFolder."/".$full_file_name);
        array_push($uploadedFiles, $file_name);
        }
    }
}
else
    array_push($errors,"Please choose a file to upload");
}
?>
<!Doctype html>
<html>
    <head>
    <link rel="stylesheet" href="style.php">
        <title>Admin</title>
    </head>
    <body>
    <div class="container">
    <div class="upload-box">
                <form id="uploadform" method="post" enctype="multipart/form-data"  name="formUploadFile">		
				<label>Upload</label></br>
				<input type="text" name="title" placeholder="Title" required>
				<input type="text" name="ing" placeholder="Ingredients" required>
                <input type="text" name="price" placeholder="Price" required>
                <select id="category" form="uploadform" name="category" required>
                    <label>Category</label>
                    <option value="Main">Main</option>
                    <option value="Appetizer">Appetizer</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Beverage">Beverage</option>
                    <option value="Breakfast">Breakfast</option>
                </select>
				<input id="file-upload" type="file" name="file" >
                <?php if(isset($_POST['btnSubmit'])){if(count($errors)>0){ ?>
						<?php foreach($errors as $error)
						{
							echo '<p class="error">'.$error;
							echo '</p>';
						}
					}
					elseif($uploadedFiles>0){
						echo '<p class="success">'.'Success';
						echo '</p>';
					}
				}
						?>
				<style>
						.error{
							background-color:rgba(241, 0, 0, 0.349);
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';
                    font-weight:bold;color:white;border-radius:5px;margin-bottom:-1cm;margin-bottom:5px;
						}
						.success{
							background-color: rgba(0, 255, 13, 0.459);;
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';font-weight:bold;color:white;border-radius:5px;
						}
				</style>
				<button type="submit" value="Upload File" name="btnSubmit">Upload</button>
			</form>	
                    </div>	
                    </div>
    </body>
</html>
<?php
}
else{
    include 'nav.php';
?>
<html>
    <head>
    <link rel="stylesheet" href="style.php">
        <title>Admin_Not Authorized</title>
</head>
<body class="Not-Authorized-body">
<div class="not-auth-div">
<p class="not-auth">You're not authorized to get into Admin page, You are being redirected ...</p>
</div>
</body>
<?php
header('Refresh:3, Login.php');
}
?>