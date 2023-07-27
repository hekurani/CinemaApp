<?php include "dbconnection.php";//require();

function Search_db($search_input){
    global $connection;
    $query = "INSERT INTO search (content) VALUES (?)";
    $statement=mysqli_prepare($connection,$query);

    if($statement){
mysqli_stmt_bind_param($statement,'s',$search_input);
mysqli_stmt_execute($statement);
mysqli_stmt_close($statement);    
}
    else{
        echo "Error: " . mysqli_error($connection);
    }
}

function getColumnNames($tableName) {
    global $connection;
    $query = "SELECT COLUMN_NAME
              FROM INFORMATION_SCHEMA.COLUMNS
              WHERE TABLE_NAME = '$tableName'";
    $result = mysqli_query($connection, $query);
 
    $columnNames = array();
 
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
	
                if($row['COLUMN_NAME']=="USER"||$row['COLUMN_NAME']=="CURRENT_CONNECTIONS"||$row['COLUMN_NAME']=="TOTAL_CONNECTIONS"){

                }
                else{
                      $columnNames[] = $row['COLUMN_NAME'];
                }
          
        }
    } else {
        echo "<script>alert('Nuk Egziston tabela ose ndonje prole tjeter')</script>";
       }
 
    return $columnNames;
 }

function data_insert($tabela){
   global $connection;
   $query="Select * from $tabela";
   $fetch=mysqli_query($connection,$query);
 $word="";
   if(!$fetch){
      die("Query failed" . mysqli_error($connection));
   }
   else{
      while($row=mysqli_fetch_assoc($fetch)){
         global $connection;
         $word.="<tr>";
         $word.="<td>
            <span class='custom-checkbox'>
               <input type='checkbox'  name='options[]' value='1'>
               <label ></label>
            </span>
         </td>";
         $num_fields=mysqli_num_fields($tabela);
          $result = mysqli_query($connection, "SELECT * FROM $tabela");
          if ($result) {
              for ($i = 0; $i < $num_fields; $i++) {
                  $field_info = mysqli_fetch_field($result);
                  $word.="<td>";
                  $word.=$row[$field_info->name];
                  $word.="</td>";
               }
               $word.="</tr>";
          } else {
              die("Query failed: " . mysqli_error($connection));
          }
      }
   $word.="	<td>
   <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
   <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
</td>";
   }

   mysqli_close($connection);
   return $word;
}
$check=false;

function add($table,$array=[], $values = [],$webpage) {
 global $connection; 
if (count($array) == count($values)) {
    $columnNamesString = implode(', ', $array);
    $placeholders = implode(', ', array_fill(0, count($values), '?'));
    
    // Prepare the INSERT query
    try {
        $query = "INSERT INTO $table ($columnNamesString) VALUES ($placeholders)";
        $stmt = mysqli_prepare($connection, $query);
        
        // Bind values to the prepared statement
        mysqli_stmt_bind_param($stmt, str_repeat('s', count($values)), ...$values);
        
        // Execute the prepared statement
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            
            // Handle the successful insertion
            // ...
        } else {
            echo "<script>alert('Table does not exist or incorrect number of values provided')</script>";
            echo "Error: " . mysqli_error($connection);
        }
    } catch (Exception $e) {
        echo $e;
    }
} else {
   
}

// echo "<script>window.location=".$webpage."</script>";
}
function validate(){
    global $check;
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
    if(!isset($_SESSION['username'])&&!isset($_SESSION['password'])&&$curPageName!="log-in-main.php"){
        $check=true;
        echo "<script>window.location='../log_in/log-in-main.php'</script>";
    }
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    if(isset($_SESSION['username'] )&& $curPageName=="log-in-main.php"){
        if($_SESSION['role']=="admin"||$_SESSION['role']=="superadmin"){
            header("Location: ../admin/dashboard.php");//header(Location)

        }
        else{
        header("Location: ../users/Movies_prova.php");//header(Location)
        }
    }
    
}
function validate2(){
if(!isset($_SESSION['faqja'])  ){
        echo "<script>window.location.href='./../users/Movies_prova.php'</script>";
    }
}
function validate3($link){
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
    if(!strpos($curPageName,$link)){
echo "<script>window.location.href='$link'</script>";
    }
    }

function delete_product($tabela,$id){
   global $connection;
   $query="DELETE FROM $tabela WHERE ID=$id";
   $fetch=mysqli_query($connection,$query);
   if(!$fetch){
       echo "<script>alert('it didnt work this action')</script>";
   }
   }
   function edit($table, $id,$array=[], $values = []) {
      global $connection;
      if(count($array)==count($values)){
      // Construct the SET clause of the UPDATE query
      $setClause = [];
      for($i=0;$i<count($values);$i++){
       
        $column=$array[$i];
        $vlera2=$values[$i];
        $setClause[] = "$column = '$vlera2'";
      }

      $setClauseString = implode(", ", $setClause);
      $query = "UPDATE $table SET $setClauseString WHERE ID = $id";
      $result = mysqli_query($connection, $query);
      if (!$result) {
 echo "<script>alert('Failed to execute the query')</script>";
      }
   }
}
function search($table,$value,$array,$page){
    global $connection;
    $query="SELECT * from $table where $array=$value";
    $fetch=mysqli_query($connection,$query);
    return $fetch;
}  
function showtablesearch($table,$notallowedcolumns=[],$column,$search){
    global $connection;
   $query="Select * from $table WHERE $column='$search'";
   $fetch=mysqli_query($connection,$query);
   if(!$fetch){
      echo "<script>alert('Failed to execute the query')</script>";
   }
   else{
   $columnName=getColumnNames($table);
   $header="";
   for($i=0;$i<count($columnName);$i++){
    if(!in_array($columnName[$i],$notallowedcolumns,true)){
$header.='<th>'.$columnName[$i].'</th>';
    }
   }
   if($table=="users"){
   $return = '
   <div class="container">
       <div class="table-responsive">
           <div class="table-wrapper">
               <div class="table-title">
                   <div class="row">
                       <div class="col-xs-6">
                           <h2>Manage <b> '.$table.' </b></h2>
                       </div>
                       <div class="col-xs-6" style="display:flex; margin-right:0">
                           <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New'.$table.' </span></a>
                           <form method="POST" id="form" >
                        <input type="text" id="special"name="spec"style="display:none">
                        <input type="submit" class="delete" name="delete" value="delete" style="color:white;background-color:red;">	</input>					
                    </form>
                           </div>
                   </div>
               </div>
               <table class="table table-striped table-hover">
                   <thead>
                       <tr>
                           <th>
                           </th>'.
                           $header
                          
                           .' 
                       </tr>
                   </thead>';
   }
   else if($table=="faq"){
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                        <form method="POST" id="form">
                        <input type="text" id="special"name="spec" style="display:none;" >
                        <input type="submit" class="delete" name="delete" value="delete" style="color:white;background-color:red;">	</input>					
                    </form>
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
   }
   else if($table=="user_ticket"){
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
   }
   else{
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New'.$table.' </span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <theads>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
   }
                   while($row=mysqli_fetch_assoc($fetch)){
$arrayelement="";
      for($i=0;$i<count($columnName);$i++){
        if(!in_array($columnName[$i],$notallowedcolumns,true)){
            if(isset($row[$columnName[$i]])){
                if($columnName[$i]=="image_url"|| $columnName[$i]=="profile_picture"){
$arrayelement.='<td style="width: 200px; height: 200px;"><img style="max-width: 100%; max-height: 100%;" src=./../'.$row[$columnName[$i]].' /></td>';
                }
                else if($columnName[$i]=="videoURL"){
                    $arrayelement.='<td style="width: 200px; height: 200px;"><video style="max-width: 100%; max-height: 100%;" src=./../'.$row[$columnName[$i]].' </video></td>';

                }
                else{
                    $arrayelement.='<td>'.$row[$columnName[$i]].'</td>';
                }
              
                   } 
                      }
}
if($table=="faq"|| $table=="users"){
    if($table=="users"){
        $arrayelement .= '<td>
        <a href="user_d.php?id=' . $row['ID'] . '" id="' . $row['ID'] . '" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
        <a href="user_d.php?delete='.$row['ID'].'" id="' . $row['ID'] . '" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
    </td>';
    }
    else{
    $arrayelement.='	<td>
    <a href="#editEmployeeModal" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
    <a  href="faq_d.php?delete='.$row['ID'].'" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
</td>';
    }
}
else{
    $arrayelement.='	<td>
    <a href="#editEmployeeModal" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
    <a  href="#deleteEmployeeModal" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
</td>';
}
      $return.='				
<tbody>
<tr>
    <td>
      <span class="custom-checkbox" >
         <input type="checkbox" id="'.$row['ID'].'" class="check"  name="options[]" value="1">
         <label ></label>
      </span>
    </td>
   '.
   $arrayelement
   .'
   <td>
   </td>
</tr>
';
   }
   $return.='</tbody>
   </table>
</div>
</div>        
</div>';
}
echo  $return;
}
function showtable($table,$notallowedcolumns=[]){
   global $connection;
   $query="Select * from $table";
   $fetch=mysqli_query($connection,$query);
   if(!$fetch){
      echo "<script>alert('Failed to execute the query')</script>";
   }
   else{
   $columnName=getColumnNames($table);
   $header="";
   for($i=0;$i<count($columnName);$i++){
    if(!in_array($columnName[$i],$notallowedcolumns,true)){
$header.='<th>'.$columnName[$i].'</th>';
    }
   }
   if($table=="users"){
   $return = '
   <div class="container">
       <div class="table-responsive">
           <div class="table-wrapper">
               <div class="table-title">
                   <div class="row">
                       <div class="col-xs-6">
                           <h2>Manage <b> '.$table.' </b></h2>
                       </div>
                       <div class="col-xs-6" style="display:flex; margin-right:0">
                           <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New'.$table.' </span></a>
                           <form method="POST" id="form" >
                        <input type="text" id="special"name="spec"style="display:none">
                        <input type="submit" class="delete" name="delete" value="delete" style="color:white;background-color:red;">	</input>					
                    </form>
                           </div>
                   </div>
               </div>
               <table class="table table-striped table-hover">
                   <thead>
                       <tr>
                           <th>
                           </th>'.
                           $header
                          
                           .' 
                       </tr>
                   </thead>';
   }
   else if($table=="faq"){
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                        <form method="POST" id="form">
                        <input type="text" id="special"name="spec" style="display:none;" >
                        <input type="submit" class="delete" name="delete" value="delete" style="color:white;background-color:red;">	</input>					
                    </form>
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
   }
   else if($table=="user_ticket"){
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
   }
   else{
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New'.$table.' </span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <theads>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
   }
                   while($row=mysqli_fetch_assoc($fetch)){
$arrayelement="";
      for($i=0;$i<count($columnName);$i++){
        if(!in_array($columnName[$i],$notallowedcolumns,true)){
            if(isset($row[$columnName[$i]])){
                if($columnName[$i]=="image_url"|| $columnName[$i]=="profile_picture"){
$arrayelement.='<td style="width: 200px; height: 200px;"><img style="max-width: 100%; max-height: 100%;" src=./../'.$row[$columnName[$i]].' /></td>';
                }
                else if($columnName[$i]=="videoURL"){
                    $arrayelement.='<td style="width: 200px; height: 200px;"><video style="max-width: 100%; max-height: 100%;" src=./../'.$row[$columnName[$i]].' </video></td>';

                }
                else{
                    $arrayelement.='<td>'.$row[$columnName[$i]].'</td>';
                }
              
                   } 
                      }
}
if($table=="faq"|| $table=="users"){
    if($table=="users"){
        $arrayelement .= '<td>
        <a href="user_d.php?id=' . $row['ID'] . '" id="' . $row['ID'] . '" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
        <a href="user_d.php?delete='.$row['ID'].'" id="' . $row['ID'] . '" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
    </td>';
    }
    else{
    $arrayelement.='	<td>
    <a href="#editEmployeeModal" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
    <a  href="faq_d.php?delete='.$row['ID'].'" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
</td>';
    }
}
else{
    $arrayelement.='	<td>
    <a href="#editEmployeeModal" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
    <a  href="#deleteEmployeeModal" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
</td>';
}
      $return.='				
<tbody>
<tr>
    <td>
      <span class="custom-checkbox" >
         <input type="checkbox" id="'.$row['ID'].'" class="check"  name="options[]" value="1">
         <label ></label>
      </span>
    </td>
   '.
   $arrayelement
   .'
   <td>
   </td>
</tr>
';
   }
   $return.='</tbody>
   </table>
</div>
</div>        
</div>';
}
echo  $return;
}

function showtable2($table,$notallowedcolumns=[],$fetch){
    global $connection;
    if(!$fetch){
       echo "<script>alert('Failed to execute the query')</script>";
    }
    else{
    $columnName=getColumnNames($table);
    $header="";
    for($i=0;$i<count($columnName);$i++){
     if(!in_array($columnName[$i],$notallowedcolumns,true)){
 $header.='<th>'.$columnName[$i].'</th>';
     }
    }
    if($table=="users"){
    $return = '
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6">
                            <h2>Manage <b> '.$table.' </b></h2>
                        </div>
                        <div class="col-xs-6" style="display:flex; margin-right:0">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New'.$table.' </span></a>
                            <form method="POST" id="form">
                            <input type="text" id="special"style="color:black; display:none;" name="spec">
                            <input type="submit" class="delete" name="delete" value="delete" style="color:white;background-color:red;">	</input>					
                        </form
                            </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                            </th>'.
                            $header
                           .' 
                        </tr>
                    </thead>';
    }
    else if($table=="faq"){
     $return = '
     <div class="container">
         <div class="table-responsive">
             <div class="table-wrapper">
                 <div class="table-title">
                     <div class="row">
                         <div class="col-xs-6">
                             <h2>Manage <b> '.$table.' </b></h2>
                         </div>
                         <div class="col-xs-6" style="display:flex; margin-right:0">
                         <form method="POST" id="form">
                         <input type="text" id="special"style="color:black; display:none;" name="spec">
                         <input type="submit" class="delete" name="delete" value="delete" style="color:white;background-color:red;">	</input>					
                     </form
                             </div>
                     </div>
                 </div>
                 <table class="table table-striped table-hover">
                     <thead>
                         <tr>
                             <th>
                             </th>'.
                             $header
                            .' 
                         </tr>
                     </thead>';
    }
    else if($table=="user_ticket"){
    $return = '
     <div class="container">
         <div class="table-responsive">
             <div class="table-wrapper">
                 <div class="table-title">
                     <div class="row">
                         <div class="col-xs-6">
                             <h2>Manage <b> '. $table  .' </b></h2>
                         </div>
                         <div class="col-xs-6" style="display:flex; margin-right:0">
                             <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                             </div>
                     </div>
                 </div>
                 <table class="table table-striped table-hover">
                     <thead>
                         <tr>
                             <th>
                             </th>'.
                             $header
                            .' 
                         </tr>
                     </thead>';
    }
    else{
     $return = '
     <div class="container">
         <div class="table-responsive">
             <div class="table-wrapper">
                 <div class="table-title">
                     <div class="row">
                         <div class="col-xs-6">
                             <h2>Manage <b> '.$table.' </b></h2>
                         </div>
                         <div class="col-xs-6" style="display:flex; margin-right:0">
                             <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New'.$table.' </span></a>
                             <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                             </div>
                     </div>
                 </div>
                 <table class="table table-striped table-hover">
                     <thead>
                         <tr>
                             <th>
                             </th>'.
                             $header
                            .' 
                         </tr>
                     </thead>';
    }
                    while($row=mysqli_fetch_assoc($fetch)){
 $arrayelement="";
       for($i=0;$i<count($columnName);$i++){
         if(!in_array($columnName[$i],$notallowedcolumns,true)){
             if(isset($row[$columnName[$i]])){
                 if($columnName[$i]=="image_url"|| $columnName[$i]=="profile_picture"){
 $arrayelement.='<td style="width: 200px; height: 200px;"><img style="max-width: 100%; max-height: 100%;" src='.$row[$columnName[$i]].' /></td>';
                 }
                 else if($columnName[$i]=="videoURL"){
                     $arrayelement.='<td style="width: 200px; height: 200px;"><video style="max-width: 100%; max-height: 100%;" src='.$row[$columnName[$i]].' </video></td>';
                 }
                 else{
                     $arrayelement.='<td>'.$row[$columnName[$i]].'</td>';
                 }
                    } 
                       }
 }
 if($table=="faq"){
     $arrayelement.='	<td>
     <a href="#editEmployeeModal" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
     <a href="faq_d.php?delete='.$row['ID'].'" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
 </td>';
 }
 else{
    if($table=="users"){
        $arrayelement.='	<td>
                 <a href="#" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                 <a href="#deleteEmployeeModal" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
             </td>';  
    }
    else{
        $arrayelement.='	<td>
                 <a href="#editEmployeeModal" id="'.$row['ID'].'" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                 <a href="#deleteEmployeeModal" id="'.$row['ID'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
             </td>';  
    }
 
 }
       $return.='				
 <tbody>
 <tr>
     <td>
       <span class="custom-checkbox" >
          <input type="checkbox" id="'.$row['ID'].'" class="check"  name="options[]" value="1">
          <label ></label>
       </span>
     </td>
    '.
    $arrayelement
    .'
    <td>
    </td>
 </tr>
 ';
    }
    $return.='</tbody>
    </table>
 </div>
 </div>        
 </div>';
 }
 echo  $return;
 }

?>