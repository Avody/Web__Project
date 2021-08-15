<?php  



function emptyInputSignup($uname,$fname,$email,$pwd) {
	$result;

	if( empty($uname) || empty($fname) || empty($email) || empty($pwd)) {
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;

};

function invalidUname($uname) {
	$result;

	if( !preg_match("/^[a-zA-Z0-9]*$/", $uname )) {
		$result = true ;
	}
	else{
		$result = false;
	}
	return $result;



};

function invalidEmail($email) {
	$result;

	if( !filter_var($email,FILTER_VALIDATE_EMAIL )){
		$result = true;
	}
	else{
		$result = false;
	}
	return $result;


	
};
function invalidPwd($pwd) {

	$result;
	if(strlen($pwd)<8 || !preg_match('/[\'^£$%&\/*()!}{@#.~?><>,|=_+¬-]/', $pwd) || !preg_match('/[A-Z]/',$pwd) || !preg_match('/[0-9]/',$pwd) ) {
		$result = true;
	}
	else{
		$result = false;
	}

	return $result;
	
}

function unameExists($conn, $uname, $email){

	$sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;" ;
	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../sign_up.html?error=stmtfailed");
		exit();

	}
	mysqli_stmt_bind_param($stmt,"ss",$uname, $email);

	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	myqsli_stmt_close($stmt);
}

function createUser($conn,$uname,$fname,$email,$pwd){

	$sql = " INSERT INTO users (usersFullname,usersUsername,usersEmail,usersPwd) VALUES (?,?,?,?); " ;
	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../sign_up.php?error=stmtfailed");
		exit();

	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"ssss",$fname,$uname, $email, $hashedPwd);

	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location:../sign_in.php?error=none");

}

function emptyInputSignin($uname,$pwd){

	$result;

	if(empty($uname) || empty($pwd) ){
		$result = true;

	}

	else{
		$result= false;
	}
	return $result;
	
}


function signinUser($conn,$uname,$pwd){

	$unameExists = unameExists($conn,$uname,$uname);

	if($unameExists === false){
		header("location: ../sign_in.php?error=wronglogin");
		exit();
	}

	$hashed_pwd = $unameExists["usersPwd"];

	$checkPwd = password_verify($pwd,$hashed_pwd);


	if($checkPwd === false){
		header("location: ../sign_in.php?error=wronglogin");
		exit();

	}
	else if($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $unameExists["usersId"];
		$_SESSION["useruid"] = $unameExists["usersUsername"];
		$_SESSION["fullname"] = $unameExists["usersFullname"];
		$_SESSION["email"] = $unameExists["usersEmail"];
		header("location: ../home.php");
		exit();
	}
	
	


}
/****** Edit page Adds******/

function usernameExistsEdit($conn, $uname){

	$sql = "SELECT * FROM users WHERE usersUsername = ? ;" ;
	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../edit_page.html?error=stmtfailed");
		exit();

	}
	mysqli_stmt_bind_param($stmt,"s",$uname );

	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else{
		$result = false;
		return $result;
	}

	myqsli_stmt_close($stmt);
}

function wrong_pwd_check($conn,$pwd,$id){
	
	$sql = "SELECT * FROM users WHERE usersId = ? ";
	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../edit_page.php?error=stmtfailed");
		exit();

	}
	mysqli_stmt_bind_param($stmt,"s", $id);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_assoc($resultData);
	$hashedPwd = $row["usersPwd"];

	if ( password_verify($pwd, $hashedPwd) !== true ){

		$result=false;		
		return $result;
		exit();
	}

}

function update_username($conn,$uname,$id){

	
	$sql = " UPDATE users SET usersUsername = ? WHERE usersId = ? ;" ;

	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../edit_page.php?error=stmtfailed");
		exit();

	}

	
	mysqli_stmt_bind_param($stmt,"ss",$uname,$id);

	mysqli_stmt_execute($stmt);
	$_SESSION["useruid"] = $uname;
	mysqli_stmt_close($stmt);

	

}

function emptyInputNameSurname($surname,$name,$pwd){

	$result;

	if(empty($surname) || empty($name) || empty($pwd) ){
		$result = true;

	}

	else{
		$result= false;
	}
	return $result;
	
}

function update_name($conn,$surname,$name,$id){

	$fullname = $surname." ".$name;

	$sql = " UPDATE users SET usersFullname = ? WHERE usersId = ? ;" ;

	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../edit_page.php?error=stmtfailed");
		exit();

	}

	
	mysqli_stmt_bind_param($stmt,"ss",$fullname,$id);

	mysqli_stmt_execute($stmt);
	$_SESSION["fullname"] = $fullname;
	mysqli_stmt_close($stmt);

	

}

function update_email($conn,$email,$id){


	$sql = " UPDATE users SET usersEmail = ? WHERE usersId = ? ;" ;

	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../edit_page.php?error=stmtfailed");
		exit();

	}

	
	mysqli_stmt_bind_param($stmt,"ss",$email,$id);

	mysqli_stmt_execute($stmt);
	$_SESSION["email"] = $email;
	mysqli_stmt_close($stmt);

	

}

function update_password($conn,$pwd,$id){
	$sql = " UPDATE users SET usersPwd = ? WHERE usersId = ? ;" ;

	$stmt = mysqli_stmt_init($conn);

	if( !mysqli_stmt_prepare($stmt,$sql)){
		header("location:../edit_page.php?error=stmtfailed");
		exit();

	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
	
	mysqli_stmt_bind_param($stmt,"ss",$hashedPwd,$id);

	mysqli_stmt_execute($stmt);
	
	mysqli_stmt_close($stmt);
	
}