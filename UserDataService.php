<?php



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_connector.php';
require_once 'User.php';

class UserDataService
{

    function findByFirstOrLastName($fN, $lN)
    {
        $db = new db_connector();


        $connection = $db->getConnection();

        $stmt = $connection->prepare("SELECT * FROM USERS WHERE FIRST_NAME LIKE ? OR LAST_NAME LIKE ?");

        $like_fN = "%" . $fN . "%";
        $like_lN = "%" . $lN . "%";
        $stmt->bind_param("ss", $like_fN, $like_lN);

        $stmt->execute();

        $result = $stmt->get_result();


        if (!$result) {

            echo "Assume the SQL statement has an error.";
            return null;

        }


        if ($result->num_rows == 0) {
            return null;

        } else {
            //echo "I found " . $result->num_rows . " result(s)<br>";

            $firstNameLastName_array = array();
            while ($name = $result->fetch_assoc()) {


//                echo "Person id = " . $person['ID'] . "<br>";
//                echo "Person First Name = " . $person['FIRST_NAME'] . "<br>";
//                echo "Person Last Name = " . $person['LAST_NAME'] . "<br>";
//                echo "<br>";

                array_push($firstNameLastName_array, $name);

            }
            return $firstNameLastName_array;


        }

    }


    function showAllUsers(){


        // Returns an array of persons. Every in the database.

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;

        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            //echo "I found " . $result->num_rows . " results!<br>";

            $person_array = array();
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            return $person_array;
        }
    }

    function updateUser($id, $user){

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("UPDATE USERS SET FIRST_NAME = ?, LAST_NAME = ? WHERE ID = ? LIMIT 1");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }



        $fn = $user->getFirstName();
        $ln = $user->getLastName();

        $stmt->bind_param("ssi", $fn, $ln, $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;

        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            //echo "I found " . $result->num_rows . " results!<br>";

            $person_array = array();
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            return $person_array;
        }


    }


    function findById($id) {
        // id is the number; returns a person object

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE ID = ? LIMIT 1;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        //$like_n = "%" . $n . "%";
        $stmt->bind_param("s", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            $person_array = array();
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            $p = new User($person_array[0]['ID'], $person_array[0]['FIRST_NAME'], $person_array[0]['LAST_NAME'],
                $person_array[0]['EMAIL'], $person_array[0]['USERNAME'], $person_array[0]['PASSWORD']);
            return $p;
        }
    }


    function findByFirstName($n) {
        // $n is the search string; returns an array of persons

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE FIRSTNAME LIKE ?;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            //echo "I found " . $result->num_rows . " results!<br>";

            $person_array = array();
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            return $person_array;
        }
    }

    function findByLastName ($n) {
        // returns an array of persons by last name

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("SELECT * FROM USERS WHERE LAST_NAME LIKE ?;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        $like_n = "%" . $n . "%";
        $stmt->bind_param("s", $like_n);

        $stmt->execute();

        $result = $stmt->get_result();

        if (!$result) {
            echo "Assume the SQL statement has an error.<br>";
            return null;
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            $person_array = array();
            while ($person = $result->fetch_assoc()) {
                array_push($person_array, $person);
            }
            return $person_array;
        }
    }

    function deleteItem($id) {
        // id is the number to delete; returns a true (success) or false (failure)

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("DELETE FROM USERS WHERE ID = ? LIMIT 1;");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }

        //$like_n = "%" . $n . "%";
        $stmt->bind_param("s", $id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    function makeNew($person) {
        // Accepts a $person object. Inserts a new record into the USERS table.

        $db = new db_connector();
        $connection = $db->getConnection();
        $stmt = $connection->prepare("INSERT INTO USERS (FIRST_NAME, LAST_NAME, USERNAME, EMAIL, PASSWORD)
                                      VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {
            echo "Something wrong in the binding process. SQL error?";
            exit;
        }



        $fn = $person->getFirstName();
        $ln = $person->getLastName();
        $un = $person->getUsername();
        $em = $person->getEmail();
        $pw = $person->getPassword();

//        $fn = $person->getFirstName();
//        $ln = $person->getLastName();
//        $un = $person->getUsername();
//        $em = $person->getEmail();
//        $pw = $person->getPassword();


        $stmt->bind_param("sssss", $fn, $ln, $un, $em, $pw);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

    }


}

