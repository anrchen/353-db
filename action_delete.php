<?php

                    /* Link the TID from deletedPost.php to delete.php
                    still have errors
                    -*/
                    echo $_GET['TID'];


                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "trip";
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);


                    $result = $conn->query("DELETE FROM trip
                                              WHERE trip.tid=$TID;");


                    echo 'Successfully deleted.';
                    echo '<a href="deletePost.php">Click here to go back and delete more.</a>';

?>