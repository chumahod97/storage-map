<?php
ob_start();
session_start();
?>

<h2>Login</h2>
    <form method="post">
    <input type="text" name="user">
    <input type="password" name="password">
    <input type="submit">
</form>

<?php
$password = file_get_contents('./password.txt');

if ($password === false) {
    throw new Exception("password.txt is not found");
}

$users = ["user" => $password];

$user = $_POST['user'];

if (password_verify($_POST['password'], $users[$user]) && isset($users[$user])) {
    $_SESSION['user'] = $user;
    header("Location: editor.php");
    exit();
}
?>
