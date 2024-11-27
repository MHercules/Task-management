<?php 

function get_all_users($pdo)
{
	$sql = "SELECT * FROM users WHERE role =? ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(["employee"]);

	if($stmt->rowCount() > 0){
		$users = $stmt->fetchAll();
	}else $users = 0;

	return $users;
}

function insert_user($pdo, $data)
{
	$sql = "INSERT INTO users (full_name, username, password, role) VALUES(?,?,?, ?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

function get_user_by_id($pdo, $id)
{
	$sql = "SELECT * FROM users WHERE id =? ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$user = $stmt->fetch();
	}else $user = 0;

	return $user;
}

function update_user($pdo, $data)
{
	$sql = "UPDATE users SET full_name=?, username=?, password=?, role=? WHERE id=? AND role=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

function delete_user($pdo, $data)
{
	$sql = "DELETE FROM users WHERE id=? AND role=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

function update_profile($pdo, $data){
	$sql = "UPDATE users SET full_name=?,  password=? WHERE id=? ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

function count_users($pdo)
{
	$sql = "SELECT id FROM users WHERE role='employee'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}