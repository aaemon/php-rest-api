<?php
            if(isset($_POST['search'])){
                $carnivalid = $_POST['carnivalid'];
                include('server.php');

                $search_query = "SELECT * FROM usertable WHERE carnivalid='$carnivalid'";
                $result = mysqli_query($conn, $search_query);
                $user = mysqli_fetch_assoc($result);

                // echo $user['firstname'];
                // echo "<br />";
                // echo $user['lastname'];
                // echo "<br />";
                // echo $user['email'];
                // echo "<br />";
                // echo $user['address'];
                // echo "<br />";
                // echo $user['mobile'];
                // echo "<br />";
                // echo $user['package'];
                // echo "<br />";
                // echo $user['carnivalid'];
                // echo "<br />";

                $josn_array = array();
                $josn_array[] = $user;

                echo '<pre>';
                print_r($josn_array);
                echo '</pre>';
                }
            
        ?>