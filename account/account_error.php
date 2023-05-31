<?php
                    //error message
                    if (isset($_GET["error"])) {

                        $error_color = "red";
                        if ($_GET["error"] == "toolarge") {
                            //echo "<script>console.log(" . $_GET["error"] . ")</script>";
                            $error_string = "The uploaded image was too large! The maximum image file size is 1.2 MB.";
                        } else if ($_GET["error"] == "wrongtype") {
                            $error_string = "Invalid or No File! The only supported file types are: .jpg .jpeg and .png files. ";
                        } else if ($_GET["error"] == "resizeErr") {
                            $error_string = "There was an error when uploading the file.";
                        } else if ($_GET["error"] == "changepfp") {
                            $error_color = "green";
                            $error_string = "File uploaded successfully!";
                        }
                        echo "<p align='center' class='error-msg' style='color:" . $error_color . ";'>" . $error_string;
                    }
?>