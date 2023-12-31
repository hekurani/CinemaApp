<?php
include "includes/header-dashboard.php";//include file header-dashboard in folder includes which is file for importing header in web page
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
<link rel="stylesheet" href="../css/dashboard.css">
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
	#formm{
		margin-left:600px;
	}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>
    
<form id="formm" method="POST" class="form-inline ml-auto">
    
	<select name="mySelect">
		  <option value="username">username:</option>
		  <option value="movies">movies:</option>
		  <option value="cmimi">cmimi:</option>
		  <option value="salla">salla:</option>
	</select>
		<input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
		<input class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="sub" value="Search">
	</form> 
<?php
//Here is the logic of showing table which is function which is included in header-dashboard and includes the table with each data
if(isset($_POST['sub'])&&!empty($_POST['search'])){
	$search=$_POST['search'];//get the search value
	$array=array();//empty array
	$table="user_ticket";//tables name
	switch($_POST['mySelect']){// Switch cases for 
case 'username':
	 showtablesearch($table,$array,"user_name",$search);// show table for search value in field that was choosen in select 
	break;
	case 'movies':
		showtablesearch($table,$array,"movie_name",$search);// same for each case but with different field
		break;
		case 'cmimi':
			showtablesearch($table,$array,"cmimi",$search);
			break;
			case 'salla':
				showtablesearch($table,$array,"Salla",$search);
				break;
	}

}
else{// If there are no search value then showtable for all
$array=array();
$table="user_ticket";
 showtable($table,$array);
}
?>
    
	<!-- Edit Modal HTML -->
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
							<label>Movie-Name:</label>
							<input type="text" name="movie" class="form-control" >
						</div>	
                        <div class="form-group">
							<label>Salla:</label>
							<input type="text" class="form-control" name="Salla" >
						</div>		
						<div class="form-group" >
						<input type="number" id="hidden"style="display: none;" name="id">
                        </div>
                        <div class="form-group">
							<label>buy-tickets:</label>
							<input type="text" name="Buy" class="form-control" >
						</div>
						<div class="form-group">
							<label>Phone number:</label>
							<input type="text" name="phone2" class="form-control" >
						</div>
					</div> 
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> 
						<input type="submit" name="submitedit" class="btn btn-info" >
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Delete <?php echo $table?></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					     <input type="text" name="hiden" id="hidden2" style="display:none">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submitdelete" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>	
<script>
	var array=[];//empty array
	$('a.edit').click(function(){// in element a and attribute class .edit when it is clicked and then include function
var id = $(this).attr('id');//Get that ID of a .edit
if(isNaN(id)){
	var id2=parseInt(id);//Convert in int id
}
else{
	var id2=id;
}
$('#hidden').val(id2);// In hidden input push the ID value 
	})
	//same logic downhere as edit
$('a.delete').click(function(){
var id = $(this).attr('id');
if(isNaN(id)){
	var id2=parseInt(id);
}
else{
	var id2=id;
}
console.log(id);
$('#hidden2').val(id2);
	})
// when is clicked the input with class check then this function is excecuted and gets id of this attribute and for every array
//element it looks if that element excists in array of checked list and if not it pushes if yes it pops out that elemnt because it is double clicked
// and if array is empty then dont push the value in input but if it has something then push it into input
$('input.check').click(function(){
	var check = false;
  var id = $(this).attr('id');

  for (var i = 0; i < array.length; i++) {
    if (array[i] === id) {
      array.pop(array[i]);
      check = true;
      break;
    }
  }

  if ((check === false || array.length === 0)&&check!=true) {
    array.push(id);
  }
if(array.length>0){
	$('#hidden2').val(array);
}
  console.log(array);
	})
                 // Get the form and input elements
    //             var form = document.getElementById('myform');
    //             var input = document.getElementById('myInput');

    //             // Set the value of the input element
    //             input.value = 'Your value here';

    //             // Submit the form
    //             form.submit();
    //         });
    //     });
</script>
</body>
</html>


<?php
 // Assign a default value to $id


// if theinput with name submit edit is clicked then get that ID with name id in input hidden maybe it is old school but i wanted to explain this way of excecuting the edit in admin 
	 if (isset($_POST['submitedit'])) {
		$id=intval($_POST['id']);
		$query="SELECT * FROM user_ticket WHERE ID=$id";// string of selection all elements in user_ticket which ID's has value of id there
		$fetch=mysqli_query($connection,$query);//fetch from database
		while($row=mysqli_fetch_assoc($fetch)){//foreach every row in database
			$buy=$row['buy_tickets'];//get the elemnts in db with that id 
			$salla=$row['Salla'];
			$name=$row['movie_name'];
			$phone=$row['phone'];
		}
		// if the superglobal variables from inputs ehith that name is empty then initialize value of that POST variable to the one we eant to edit
if(empty($_POST['Buy'])){
	$_POST['Buy']=$buy;
}
if(empty($_POST['movie'])){
	$_POST['movie']=$name;
}
if(empty($_POST['phone2'])){
	$_POST['phone2']=$phone;
}
if(empty($_POST['Salla'])){
	$_POST['Salla']=$salla;
}
		$array=["movie_name","	buy_tickets","Salla",'phone'];// array of name of fields that are for editing
		$values=[$_POST['movie'],$_POST['Buy'],$_POST['Salla'],$_POST['phone2']];//values of the ones field for editing
	    edit($table,$id,$array,$values);
		echo("<script>window.location.href='booking_d.php'</script>");//header() is alternative for these but i choose to show another way or alternative way of reloading page

}
    if(isset($_POST['submitdelete'])){// if input with name submitdelete is clicked it is true that variable
		$id=intval($_POST['hiden']);//get the integer value of input
		$all="";//all variable is empty
		if(empty($_POST['hiden'])){//if it is empty variable POST['hidden'] is true inside if
			$query="DELETE FROM $table";//string for deleting all from table variable 
			$query=mysqli_query($connection,$query);//send the request of deletingquery in server
		}
		
		else if(strpos($_POST['hiden'], ',') !== false){// if POST['hidden'] includes , and it is not false
			$array = explode(",", $_POST['hiden']);// create an array from string with comma and create an array of elements as the , are plus 1
		    for($i=0;$i<count($array);$i++){//iterate in that array
				$temp=intval($array[$i]);// get the integer value of each element of array and put it in the temp variable
				$query="DELETE from $table WHERE ID=$temp";//query to delete the table when ID is temp
				mysqli_query($connection,$query);// send the request in server
			}
		}
		else{
delete_product($table,$id);// call the function which is declared in includes folder in function.php file
		}
echo("<script>window.location.href='booking_d.php'</script>");// reload the page
	}

// ?> 