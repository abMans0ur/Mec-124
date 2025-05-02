    <form action="" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
    <?php
    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: login.php');
    }
    ?>