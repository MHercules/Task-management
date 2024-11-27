<?php
session_start();
if (isset($_SESSION['role']) && isset($_SESSION['id'])) {

    include "dbh.inc.php";
    include "app/Model/Task.php";
    include "app/Model/User.php";

    if ($_SESSION['role'] == "admin") 
    {
        $todaydue_task = count_tasks_due_today($pdo);
        $overdue_task = count_tasks_overdue($pdo);
        $nodeadline_task = count_tasks_NoDeadline($pdo);
        $num_task = count_tasks($pdo);
        $num_users = count_users($pdo);
        $pending = count_pending_tasks($pdo);
        $in_progress = count_in_progress_tasks($pdo);
        $completed = count_completed_tasks($pdo);
    } else 
    {
        $num_my_task = count_my_tasks($pdo, $_SESSION['id']);
        $overdue_task = count_my_tasks_overdue($pdo, $_SESSION['id']);
        $nodeadline_task = count_my_tasks_NoDeadline($pdo, $_SESSION['id']);
        $pending = count_my_pending_tasks($pdo, $_SESSION['id']);
        $in_progress = count_my_in_progress_tasks($pdo, $_SESSION['id']);
        $completed = count_my_completed_tasks($pdo, $_SESSION['id']);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <title>Dashboard</title>
    </head>

    <body>
        <input type="checkbox" id="checkbox">
        <?php include "inc/header.php" ?>
        <div class="body">
            <?php include "inc/nav.php" ?>
            <section class="section-1">
                <?php if ($_SESSION['role'] == "admin") { ?>
                    <div class="dashboard">
                        <div class="dashboard-item">
                            <i class="fa fa-users"></i>
                            <span><?= $num_users ?> Users</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa fa-tasks"></i>
                            <span><?= $num_task ?> All Tasks</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-solid fa-gauge"></i>
                            <span><?= $overdue_task ?> Overdue</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-solid fa-ellipsis"></i>
                            <span><?= $nodeadline_task ?> No Deadline</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa fa-exclamation-triangle"></i>
                            <span><?= $todaydue_task ?> Due Today</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa fa-bell"></i>
                            <span><?= $overdue_task ?> Notifications</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-solid fa-hourglass-half"></i>
                            <span><?= $pending ?> Pending</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa fa-spinner"></i>
                            <span><?= $in_progress ?> In progress</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-regular fa-square-check"></i>
                            <span><?= $completed ?> Completed</span>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="dashboard">
                        <div class="dashboard-item">
                            <i class="fa fa-tasks"></i>
                            <span><?= $num_my_task ?> My Tasks</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-solid fa-gauge"></i>
                            <span><?= $overdue_task ?> Overdue</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-solid fa-ellipsis"></i>
                            <span><?= $nodeadline_task ?> No Deadline</span>
                        </div>
                        <div class="dashboard-item">
                        <i class="fa-solid fa-hourglass-half"></i>
                            <span><?= $pending ?> Pending</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa fa-spinner"></i>
                            <span><?= $in_progress ?> In progress</span>
                        </div>
                        <div class="dashboard-item">
                            <i class="fa-regular fa-square-check"></i>
                            <span><?= $completed ?> Completed</span>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </div>
        <script type="text/javascript">
            var active = document.querySelector("#navList li:nth-child(1)");
            active.classList.add("active");
        </script>
    </body>

    </html>
<?php } else {
    $em = "First Login";
    header("Location:login.php?error=$em");
    exit();
}
?>