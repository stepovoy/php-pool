<?php
    session_start();
    if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] != "") {
        if ($_POST['msg']) {
            if (!file_exists('../private/chat'))
                mkdir("../private");
            $arr = unserialize(file_get_contents('../private/chat'));
            $file = fopen('../private/chat', "w");
            flock($file, LOCK_EX);
            $arr[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);
            file_put_contents('../private/chat', serialize($arr));
            fclose($file);
        }
        ?>
        <html><head>
            <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
        </head><body>
            <form action="speak.php" method="POST">
                <input type="text" name="msg" value="" />
                <input type="submit" name="submit" value="Send" />
            </form>
        </body></html>
        <?php
    }
    else
        echo "ERROR\n";
?>
