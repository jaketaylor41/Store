<?php




class db_connector{
    ////jake's local database
    private $hostname = "localhost:8889";
    private $username = "root";
    private $password = "root";
    private $database = "ica17";


    function getConnection(){
        //establish db connect
        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        //old connector before class change
        //$conn = mysqli_connect($hostname, $username, $password, $database);

        // Create connection
        //$conn = mysqli_connect($user, $password, $db, $host, $port);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            return $conn;
        }
        //echo "Connection was successfully established!";
    }
}



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "ica17";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
