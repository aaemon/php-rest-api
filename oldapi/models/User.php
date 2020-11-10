<?php
class User
{
    // DB stuff
    private $conn;
    private $table = 'usertable';

    // Post Properties
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $mobile;
    public $package;
    public $carnivalid;
    public $reg_date;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get Posts
    public function read()
    {
        // Create query
        $query = 'SELECT u.id, u.firstname, u.lastname, u.email, u.address, u.mobile, u.package, u.carnivalid, u.reg_date
                    FROM ' . $this->table . ' u
                    ORDER BY
                        u.reg_date DESC';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }
}
