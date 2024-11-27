<nav class="side-bar">
    <div class="user-p">
        <img src="images/NicePng_watsapp-icon-png_9332131.png">
        <h4><?=$_SESSION['username']?></h4>
    </div>
    <?php
    if ($_SESSION['role'] == "employee") {
    ?>
        <!--Employee Navigation bar-->
        <ul id="navList">
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-computer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="my_task.php">
                    <i class="fa-solid fa-list-check"></i>
                    <span>My Tasks</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class="fa-solid fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="notifications.php">
                    <i class="fa-solid fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    <?php } else { ?>
        <!--Admin Navigation bar-->
        <ul id="navList">
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-computer"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="user.php">
                    <i class="fa-solid fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li>
                <a href="create_task.php">
                    <i class="fa-solid fa-plus"></i>
                    <span>Create Task</span>
                </a>
            </li>
            <li>
                <a href="tasks.php">
                    <i class="fa-solid fa-tasks"></i>
                    <span>All tasks</span>
                </a>
            </li>
            <li>
                <a href="notifications.php">
                    <i class="fa-solid fa-bell"></i>
                    <span>Notifications</span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa-solid fa-sign-out"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    <?php } ?>
</nav>