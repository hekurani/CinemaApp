<?php
include "../includes/function.php";
include "../includes/dbconnection.php";
session_start();
validate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/1.7.1/jquery.min.js"></script>
    <style>
        body{
	margin:0;
	color:#6a6f8c;
	background:lightblue;
	font:600 16px/18px 'Open Sans',sans-serif;
     background-image: url("images/backimage.jpg");
}
#tab-1:hover{
cursor:pointer;
}
*,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
	width:100%;
	margin:auto;
	max-width:525px;
	min-height:670px;
	position:relative;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
#id2{
	color:red;
}
.login-html{
	width:100%;
	height:100%;
	position:absolute;
	padding:90px 70px 50px 70px;
	background:rgba(40,57,101,.9);
}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
	top:0;
	left:0;
	right:0;
	bottom:0;
	position:absolute;
	transform:rotateY(180deg);
	backface-visibility:hidden;
	transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
	display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
	text-transform:uppercase;
}
.login-html .tab{
	font-size:22px;
	margin-right:15px;
	padding-bottom:5px;
	margin:0 15px 10px 0;
	display:inline-block;
	border-bottom:2px solid transparent;
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
	color:#fff;
	border-color:#1161ee;
}
.login-form{
	min-height:345px;
	position:relative;
	perspective:1000px;
	transform-style:preserve-3d;
}
.login-form .group{
	margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
	width:100%;
	color:#fff;
	display:block;
}
.login-form .group .input,
.login-form .group .button{
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
	-webkit-text-security:circle;
}
.login-form .group .label{
	color:#aaa;
	font-size:12px;
}
.login-form .group .button{
	background:#1161ee;
}
.button{
    opacity: 0.6;
    transition: 0.3s;
}
.button:hover {
    opacity: 1;
}
.login-form .group label .icon{
	width:15px;
	height:15px;
	border-radius:2px;
	position:relative;
	display:inline-block;
	background:rgba(255,255,255,.1);
}
.button:hover{
    cursor:pointer;
    background-color:brown;
}
#forgot:hover{
color:#f5f5f5;
}
#member:hover{
    color:white;
    cursor:pointer;
   
      
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
	content:'';
	width:10px;
	height:2px;
	background:#fff;
	position:absolute;
	transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
	left:3px;
	width:5px;
	bottom:6px;
	transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
	top:6px;
	right:0;
	transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
	color:#fff;
}
.login-form .group .check:checked + label .icon{
	background:#1161ee;
}
.login-form .group .check:checked + label .icon:before{
	transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
	transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
	transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
	transform:rotate(0);
}

.hr{
	height:2px;
	margin:60px 0 50px 0;
	background:rgba(255,255,255,.2);
}
.foot-lnk{
	text-align:center;
}
#id{
	color:red;
}
.red-border {
  border: 2px solid red;
}
    </style>
    <link rel="stylesheet" href="CSS/index.css">
    <title>Document</title>
</head>
<body>
 <form action="" method="POST">
    <div class="login-wrap">
        <div class="login-html">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input <?php if(isset($_GET['username'])){ echo 'style="border: 2px solid red;"';}?> name="username1" id="user" type="text" class="input" placeholder="Enter Username">
						<?php if(isset($_GET['username'])){ echo '<SMAll style="color:red">Username is not correct</SMAll>';}?>
					</div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input  <?php if(isset($_GET['password'])){ echo 'style="border: 2px solid red;"';}?> name="password1" id="pass" type="password" class="input" data-type="password" placeholder="Enter Password">
						<?php if(isset($_GET['password'])){ echo '<SMAll style="color:red">Password is not correct</SMAll>';}?>
					</div>
					<div class="group">
	</div>
                    <div class="group">
                        <input type="submit" class="button" name="sub"  value="Sign In">
                    </div>
</div>
</form> 
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user2" class="label">Username</label>
                        <input id="user2" type="text" class="input" placeholder="Enter Username" pattern="[a-zA-Z0-9]{4,16}" name="username">
                         <div id="id">

						 </div>
					</div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass2" name="password" type="password" class="input"  data-type="password" placeholder="Enter Password">
						<div id="id2">

						</div>
						
					</div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" name="email" type="text" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" class="input" placeholder="Enter Email">
                        <div id="tekst">

						</div>
					</div>
					<div class="group">
                        <label for="pass" class="label">choose profile-image</label>
                        <input type="file" id="pass" name="image" class="input" placeholder="Enter Email">
                    </div>
					<div class="group">
					<label>
    <input type="radio" name="gender" value="male" required>
    Male
    </label>
    <label>
    <input type="radio" name="gender" value="female" required>
    Female
    </label>
    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up" name="submit">
					</div>

                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label id="member" for="tab-1">Already Member?</a>
                    </div>
                </div>
            </form>          
            </div>
        </div>
    </div>
	<script type="text/javascript">
		// when document(webpage) is opened then when in signup username is written it livechecks it if it matches the requirements
		//if not then it inserts some text under that
$(document).ready(function(){
$('#user2').keyup(function(){
var name=$('#user2').val();
$.ajax({
type:"POST",
url:"includes_login//log_check.php",
data:"name="+name,
success:function(data){
	$('#id').html(data);
	if(data.length==2)
	{
		$('#user2').css('border','2px solid transparent');
	}
	else{
		$('#id').html(data);
		$('#user2').css('border','2px solid red');
	}
}
})
})
$('#pass2').keyup(function(){
var name=$('#pass2').val();
$.ajax({
type:"POST",
url:"includes_login//log_check2.php",
data:"password="+name,
success:function(data){
	$('#id2').html(data);
	if(data.length==2){
		$('#pass2').css('border','2px solid transparent');
	}
	else{
		$('#id2').html(data);
		$('#pass2').css('border','2px solid red');
	}
}
})
})
})
</script>
</body>
</html>
<?php
// here it inserts the value of signup if its not has the same values of another user
$check=false;
if(isset($_POST['submit'])){
$array=["username","password","email","profile_picture","gjinia","roli"];
$post_image=$_FILES['image']['name'];//$_FILES['image']['name']
$post_temp_file=$_FILES['image']['tmp_name'];//$_FILES['image']['tmp_name']
move_uploaded_file($post_temp_file,"C:/xampp/htdocs/MOVIES/images/$post_image");
$values=[$_POST['username'],password_hash($_POST['password'], 
PASSWORD_DEFAULT),$_POST['email'],"images/".$post_image,$_POST['gender'],"user"];
$query="SELECT * FROM users";
$fetch=mysqli_query($connection,$query);
$repeated_data=false;
while($row=mysqli_fetch_assoc($fetch)){
	if($_POST['username']==$row['username']||password_hash($_POST['password'], 
	PASSWORD_DEFAULT)==$row['password']){
		$repeated_data=true;
	}
}
if(!$repeated_data){
add("users",$array,$values,"log-in-main.php");
}
}
// it signs in the user and get set SESSIONS and depends if the role is user or admin then 
if(isset($_POST['sub'])){
$username=mysqli_real_escape_string($connection,$_POST['username1']);
$password=mysqli_real_escape_string($connection,$_POST['password1']);
$check=false;
$query="SELECT * FROM users";
global $id;
	$fetch=mysqli_query($connection,$query);
	if($fetch){
	while($row=mysqli_fetch_assoc($fetch)){
if($username===$row['username'] &&password_verify($password, $row['password']) && !($row['disabled'] === 1)){
	$row['loged_in']=1;
$_SESSION['username']=$username;
$_SESSION['password']=$password;
$id=$row['ID'];
$check=true;
$_SESSION['ID']=$id;
$_SESSION['profile']=$row['profile_picture'];
if($_SESSION['profile']==='images/'){
	if($row['gjinia']=="male"){
$_SESSION['profile']="avatar_men.jpg";
	}
	else{
		$_SESSION['profile']="avatar_woman.jpg";
	}
}
$_SESSION['role']=$row['roli'];
if($_SESSION['role']==='admin'||$_SESSION['role']==='superadmin'){
	$_SESSION['faqja']=$row['specifikimet'];
	header("Location: ../admin/dashboard.php");
}
else{
	echo "<script>window.location.href='../users/Movies_prova.php'</script>";
	
}
}
 else if($username===$row['username']&&!password_verify($password, $row['password'])){
echo "<script>window.location.href='log-in-main.php?password=wrong'</script>";
   }
   else if(password_verify($password, $row['password'])&&$username!==$row['username']){
	echo "<script>window.location.href='log-in-main.php?username=wrong'</script>";
   }

}
	if(!$check){
		echo "<script>window.location.href='log-in-main.php?username=wrong&&password=wrong'</script>";
	   }
}
	}

?>
