<?php

class DbOperation
{
    private $conn;

    //include the necessary files and initialize the connection in the constructor
    function __construct()
    {
        require_once dirname(__FILE__) . '/Config.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }



    //this method will return all the data from the user table
    public function getAllData(){
        $stmt = $this->conn->prepare("SELECT * FROM User");
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    //method will receive a staff name and return the last onsite info of this specific staff
    public function getLastRecordOfStaff($staff){


        //tconstruct the query string
        $sql = "SELECT OnSite FROM $staff ORDER BY id DESC limit 1";
        $Onsite;
        //query the database
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {

                $Onsite = $row['OnSite'];

            }

        }

        return $Onsite;
    }

 

}

?>
