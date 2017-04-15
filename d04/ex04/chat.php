<?php
    session_start();
    if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != "" && file_exists('../private/chat')) {
        $chat = unserialize(file_get_contents('../private/chat'));
        foreach ($chat as $msg)
            echo "[" . date('H:i', $msg['time']) . "] <b>" . $msg['login'] . "</b>: " . $msg['msg'] . "<br />";
    }
    else
        echo "ERROR\n";
?>