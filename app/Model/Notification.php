
<?php

function get_all_my_notifications($pdo, $id)
{
    
    $sql = "SELECT * FROM notifications WHERE recipient=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        $notifications = $stmt->fetchAll();
    } else $notifications = 0;

    return $notifications;
}


function count_notification($pdo, $id)
{
    $sql = "SELECT id FROM notifications WHERE recipient=? AND is_read=0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->rowCount();
}

function insert_notification($pdo, $data)
{
    $sql = "INSERT INTO notifications (message, recipient, type) VALUES(?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
}

function notification_make_read($pdo, $recipient_id, $notification_id)
{
    $sql = "UPDATE notifications SET is_read=1 WHERE id=? AND recipient=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$notification_id, $recipient_id]);
}
