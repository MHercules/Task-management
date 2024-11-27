<?php 

function insert_task($pdo, $data)
{
	$sql = "INSERT INTO tasks (title, description, assigned_to, due_date) VALUES(?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

function get_all_tasks($pdo)
{
	$sql = "SELECT * FROM tasks ORDER BY id DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	if($stmt->rowCount() > 0){
		$tasks = $stmt->fetchAll();
	}else $tasks = 0;

	return $tasks;
}
function get_all_tasks_due_today($pdo)
{
	$sql = "SELECT * FROM tasks WHERE due_date = CURDATE() AND status != 'completed' ORDER BY id DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	if($stmt->rowCount() > 0){
		$tasks = $stmt->fetchAll();
	}else $tasks = 0;

	return $tasks;
}
function count_tasks_due_today($pdo)
{
	$sql = "SELECT id FROM tasks WHERE due_date = CURDATE() AND status != 'completed'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}

function get_all_tasks_overdue($pdo)
{
	$sql = "SELECT * FROM tasks WHERE due_date < CURDATE() AND status != 'completed' ORDER BY id DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	if($stmt->rowCount() > 0){
		$tasks = $stmt->fetchAll();
	}else $tasks = 0;

	return $tasks;
}
function count_tasks_overdue($pdo)
{
	$sql = "SELECT id FROM tasks WHERE due_date < CURDATE() AND status != 'completed'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}


function get_all_tasks_NoDeadline($pdo)
{
	$sql = "SELECT * FROM tasks WHERE status != 'completed' AND due_date IS NULL OR due_date = '0000-00-00' ORDER BY id DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	if($stmt->rowCount() > 0){
		$tasks = $stmt->fetchAll();
	}else $tasks = 0;

	return $tasks;
}
function count_tasks_NoDeadline($pdo)
{
	$sql = "SELECT id FROM tasks WHERE status != 'completed' AND due_date IS NULL OR due_date = '0000-00-00'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}



function delete_task($pdo, $data)
{
	$sql = "DELETE FROM tasks WHERE id=? ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}


function get_task_by_id($pdo, $id)
{
	$sql = "SELECT * FROM tasks WHERE id =? ";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$task = $stmt->fetch();
	}else $task = 0;

	return $task;
}
function count_tasks($pdo)
{
	$sql = "SELECT id FROM tasks";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}

function update_task($pdo, $data)
{
	$sql = "UPDATE tasks SET title=?, description=?, assigned_to=?, due_date=? WHERE id=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}

function update_task_status($pdo, $data)
{
	$sql = "UPDATE tasks SET status=? WHERE id=?";  
	$stmt = $pdo->prepare($sql);
	$stmt->execute($data);
}


function get_all_tasks_by_id($pdo, $id)
{
	$sql = "SELECT * FROM tasks WHERE assigned_to=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	if($stmt->rowCount() > 0){
		$tasks = $stmt->fetchAll();
	}else $tasks = 0;

	return $tasks;
}



function count_pending_tasks($pdo)
{
	$sql = "SELECT id FROM tasks WHERE status = 'pending'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}

function count_in_progress_tasks($pdo)
{
	$sql = "SELECT id FROM tasks WHERE status = 'in_progress'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}

function count_completed_tasks($pdo)
{
	$sql = "SELECT id FROM tasks WHERE status = 'completed'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([]);

	return $stmt->rowCount();
}


function count_my_tasks($pdo, $id)
{
	$sql = "SELECT id FROM tasks WHERE assigned_to=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->rowCount();
}

function count_my_tasks_overdue($pdo, $id)
{
	$sql = "SELECT id FROM tasks WHERE due_date < CURDATE() AND status != 'completed' AND assigned_to=? AND due_date != '0000-00-00'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->rowCount();
}

function count_my_tasks_NoDeadline($pdo, $id)
{
	$sql = "SELECT id FROM tasks WHERE assigned_to=? AND status != 'completed' AND due_date IS NULL OR due_date = '0000-00-00'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->rowCount();
}

function count_my_pending_tasks($pdo, $id)
{
	$sql = "SELECT id FROM tasks WHERE status = 'pending' AND assigned_to=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->rowCount();
}

function count_my_in_progress_tasks($pdo, $id)
{
	$sql = "SELECT id FROM tasks WHERE status = 'in_progress' AND assigned_to=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->rowCount();
}

function count_my_completed_tasks($pdo, $id)
{
	$sql = "SELECT id FROM tasks WHERE status = 'completed' AND assigned_to=?";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([$id]);

	return $stmt->rowCount();
}