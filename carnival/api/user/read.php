<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

// Instantiate DB & Connect
$database = new Database();
$db = $database->connect();

// Instantiate User Object
$user = new User($db);

// User Query
$result = $user->read();
// Get Row Count
$num = $result->rowCount();

// Check If Any User Exists
if ($num > 0) {
    // Users Array
    $users_arr = array();
    // $users_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'address' => $address,
            'mobile' => $mobile,
            'package' => $package,
            'carnivalid' => $carnivalid,
            'reg_date' => $reg_date
        );

        // Push to "data"
        array_push($users_arr, $user_item);
        // array_push($users_arr['data'], $user_item);
    }

    // Turn to JSON & output
    echo json_encode($users_arr);
} else {
    // No Users
    echo json_encode(
        array('message' => 'No User Found')
    );
}
