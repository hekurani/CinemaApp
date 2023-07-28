<?php
include "includes/header-dashboard.php";//include this file header
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/dashboard.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}
    .container{
        right:1000px;
        left:-200px;
        margin-right:120px;
        right:0;
        padding-right:0;
    }	
    .table-responsive{
        width:1500px;
    }
    .delete{
        height:60px;
        width:80px;
		margin-left:180px;
    }
    .delete:hover{
        box-shadow: 0 0 5px red;
    }
    .col-xs-6{
        margin-left:1200;

    }
    #Yeas{
        visibility:hidden;
    }
	.form-inline{
		margin-left: 290px;
	}
</style>
<form method="POST" class="form-inline ml-auto">
    
<select name="mySelect">
  <option value="pyetje">Pyetje:</option>
</select>
<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
<input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sub" value="Search">
</form>
<?php
if(isset($_POST['sub'])&&!empty($_POST['search'])){// if its set $_POST['sub'] and if it not empty the search input
	$search="";//set to "" search variable
	switch($_POST['mySelect']){// switch in POST['mySelect'] which in cases will be switched for what we want to search and then select the quetions with what is in the field's value
		case 'pyetje':
			
			$search=$_POST['search'];
			$query="SELECT * from faq where pyetje='$search'";
			$fetch=mysqli_query($connection,$query);
			$array2=array();
			showtable2("faq",$array2,$fetch);
			break;
			
	}

}
else{
// if its empty search or not pressed button search then call showtable function with table name faq and not array
$not=array();
$table="faq";
showtable("faq",$not);
}
?>
<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" enctype="multipart/form-data" onsubmit="submit()">
					<div class="modal-header">						
						<h4 class="modal-title">Edit <?php echo $table?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						 <div class="form-group">
							<label>Pergjigje:</label>
							<input type="text" name="per" class="form-control" required>
						</div>	
						<div class="form-group" >
						<input type="number" id="hidden"style="display: none;" name="id">
                        </div>
                       
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitedit" class="btn btn-info" >
					</div>
				</form>
			</div>
		</div>
	</div>

    <script>
        var array=[];// empty array
	$('a.edit').click(function(){// when <a class="edit" is clicked is called this function
var id = $(this).attr('id');//get the id of element
if(isNaN(id)){//check if its not an number
	var id2=parseInt(id);//get the int value of id
}
else{
	var id2=id;//if not get the id assigned in id2
}
$('#hidden').val(id2);// push the value of variable id2 in element of hidden ID 
	})
$('input.check').click(function(){// when <a class="edit" is clicked is called this function
	var check = false;// set check to false
  var id = $(this).attr('id');// get id value

  for (var i = 0; i < array.length; i++) {// iterate in all elements
    if (array[i] === id) {// if id value is in array then pop it beaceaus is double clicked
      array.pop(array[i]);
      check = true;// set check true 
      break;// break from loop
	}
  }

  if ((check === false || array.length === 0)&&check!=true) {// check if its false or length of array is 0 and check isnt true(is false) and push it in array
    array.push(id);
  }
  var el=document.getElementById('special');// get element with id special
if(array.length>0){// if length of arrayis morethan 0 go inside scope
    el.value=array;// vlue of that DOM element make it array
}
	})
    function funksioni(){// create an function to open modal
        const module = document.getElementById('deleteEmployeeModal');
        module.show();
    }
    </script>
    <?php
     if (isset($_POST['submitedit'])) {// if its clicked input submit with class=submitedit
		$id=intval($_POST['id']);//id is intvalue of POST['id']
		$array=["pergjigje"];//array is with value of fields that are for edited
		$values=[$_POST['per']];// value for those fields
	    edit("faq",$id,$array,$values);// call edit function with tablename id and array of fields and its valued as an array too
		 echo("<script>window.location.href='faq_d.php'</script>");//reload page
}

if(isset($_POST['delete'])){// if its set POST['delete']
    $id=intval($_POST['spec']);// get the id value in an input
    $all="";// all is ""
    if(empty($_POST['spec'])){// if its empty POST['spec'] enter in scope
        $query="Delete from  faq";//delete all fro faq
        $query=mysqli_query($connection,$query);//send request for query DELETE from faq
    }
    else if(strpos($_POST['spec'], ',') !== false){// if there is an comma go inside scope
        $array = explode(",", $_POST['spec']);//create an array with element as much as , has +1 
        for($i=0;$i<count($array);$i++){//iterate inside array
            $temp=intval($array[$i]);// get the value of array in i index
            $query="delete from faq WHERE ID=$temp";//delete all from faq 
            mysqli_query($connection,$query);// send request
        }
    }
    else{
        $query="delete from faq WHERE ID=$id";// delte from table where ID is same with variable id
        mysqli_query($connection,$query);// send request
    }
echo("<script>window.location.href='faq_d.php'</script>");// reload page
}
if(isset($_GET['delete'])){// if its set GET delete go inside scope
	$id = intval($_GET['delete']);// get that delete variable
    if ($id > 0) {// if is id>0
        // Assuming $connection is properly defined
        $query = "Delete from faq where ID=?";// query for any ID that we want to reuse after
        $stmt = mysqli_prepare($connection, $query);//prepare the query
        mysqli_stmt_bind_param($stmt, "i", $id);// send the id
        mysqli_stmt_execute($stmt);// excecute the query
        mysqli_stmt_close($stmt);// close the stmt variable
    }
    echo("<script>window.location.href='user_d.php'</script>");//reload page
}
    ?>