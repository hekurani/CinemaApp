<?php
class Rating {
// Database credentials
 private $host     = 'localhost:3307';
 private $username = 'root';
 private $password = '';
 private $database = 'movies3';
private $db;
public function __construct(){
	// Connect to the database    
	try {
	$this->db = new mysqli($this->host, $this->username, $this->password, $this->database);
	
	}catch (Exception $e){
	$error = $e->getMessage();
	echo $error;
	}
}
public function __destruct() {
	$this->db->close();
}
public function Format($userid,$productid,$rating){
	$stmt = mysqli_prepare($this->db, "SELECT * FROM rating WHERE userID=? AND ProductID=?");
mysqli_stmt_bind_param($stmt, "ii", $userid, $productid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $updateStmt = mysqli_prepare($this->db, "UPDATE rating SET rate=? WHERE userID=? AND ProductID=?");
    mysqli_stmt_bind_param($updateStmt, "iii", $rating, $userid, $productid);
    mysqli_stmt_execute($updateStmt);
} else {
    $insertStmt = mysqli_prepare($this->db, "INSERT INTO rating (ProductID, userID, rate) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($insertStmt, "iii", $productid, $userid, $rating);
    mysqli_stmt_execute($insertStmt);
}
}
public function GetRating($ProductID,$userID){
	$fetch=mysqli_query($this->db,"SELECT * FROM rating WHERE userID=$userID and ProductID=$ProductID");
if(mysqli_num_rows($fetch)>0){
	$row=mysqli_fetch_assoc(mysqli_query($this->db,"SELECT * FROM rating WHERE userID=$userID and ProductID=$ProductID"));
	return $row['rate'];
}
else{
return 0;
}
}
}
$rating = new Rating();
?>