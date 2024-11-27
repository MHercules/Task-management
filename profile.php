<?php 
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id']) && $_SESSION['role'] == "employee") {
    include "dbh.inc.php";
    include "app/Model/User.php";
    $user = get_user_by_id($pdo, $_SESSION['id']);
    
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
	<title>Profile</title>

</head>
<body>
	<input type="checkbox" id="checkbox">
	<?php include "inc/header.php" ?>
	<div class="body">
		<?php include "inc/nav.php" ?>
		<section class="section-1">
			<h4 class="title">Profile <a href="edit_profile.php">Edit Profile</a></h4>
         <table class="main-table" style="max-width: 300px;">
				<tr>
					<td>Full Name</td>
					<td><?=$user['full_name']?></td>
				</tr>
				<tr>
					<td>User name</td>
					<td><?=$user['username']?></td>
				</tr>
				<tr>
					<td>Joined At</td>
					<td><?=$user['created']?></td>
				</tr>
			</table>

		</section>
	</div>

<script type="text/javascript">
	var active = document.querySelector("#navList li:nth-child(3)");
	active.classList.add("active");
</script>
</body>
</html>
<?php }else{ 
   $em = "First login";
   header("Location: login.php?error=$em");
   exit();
}
 ?>