<?php
class User
{
    // DB stuff
    private $conn;
    private $table = 'usertable';

    // User Properties
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

    // Get Users
    public function read()
    {
        // Create Query
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
    // Get Single User
    public function read_single()
    {
        // Create Query
        $query = 'SELECT u.id, u.firstname, u.lastname, u.email, u.address, u.mobile, u.package, u.carnivalid, u.reg_date
                    FROM ' . $this->table . ' u
                    WHERE
                        u.carnivalid = ?
                    LIMIT 0,1';

        // Prepare Statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->carnivalid);

        // Execute Query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set Properties
        $this->id = $row['id'];
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->email = $row['email'];
        $this->address = $row['address'];
        $this->mobile = $row['mobile'];
        $this->package = $row['package'];
        $this->carnivalid = $row['carnivalid'];
        $this->reg_date = $row['reg_date'];
    }
}
