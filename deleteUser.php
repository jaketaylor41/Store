<?php


require_once 'UserBusinessService.php';
require_once 'User.php';

$id = $_GET['id'];

$bs = new UserBusinessService();

$success = $bs->deleteItem($id);

if ($success) {
    echo "<div class='container'>";
    echo '<h2>User ' . $id . ' Deleted</h2>';
    echo '<p>User ' . $id . ' was deleted successfully.</p>';
    echo "<p>Please click <a href='adminUsers.php'>HERE</a> to go back to the <b>User Admin Page.</b></p>";
    echo "</div>";
} else {
    echo "<div class='container'>";
    echo '<h2>User Deletion Failed</h2>';
    echo '<p>Delete operation was not successful.</p>';
    echo "<p>Please click <a href='adminUsers.php'>HERE</a> to go back to the <b>User Admin Page</b>.</p>";
    echo "</div>";
}