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
		header("location: ../home.php");
		exit();
	}
	
	


}