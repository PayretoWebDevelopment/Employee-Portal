<?php 

    include '../../../includes/db_ep-inc.php';

    $selected = $_POST['option'];
    $query = "SELECT * FROM p_excellence WHERE id = '$selected'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Error executing query: ');
      }

    while($row = mysqli_fetch_assoc($result)){
        $rows = $row['link'];
    }

    if(!empty($rows)){
        echo "Checked";
    }
    else{
        echo '';
    }
    

    // return json_encode($selected);

?>