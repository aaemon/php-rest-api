<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$user = new User($db);

// Get ID
$user->carnivalid = isset($_GET['carnivalid']) ? $_GET['carnivalid'] : die();

// Get post
$user->read_single();

// Create array
$user_arr = array(
    'id' => $user->id,
    'firstname' => $user->firstname,
    'lastname' => $user->lastname,
    'email' => $user->email,
    'address' => $user->address,
    'mobile' => $user->mobile,
    'package' => $user->package,
    'carnivalid' => $user->carnivalid,
    'reg_date' => $user->reg_date,

);

// Make JSON
print_r(json_encode($user_arr));
