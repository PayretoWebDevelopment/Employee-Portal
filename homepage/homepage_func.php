<?php
    function get_bday(){
        // require_once "../includes/db_ep-inc.php";
        // include "../includes/db_ep-inc.php";
        $query = "SELECT * FROM `bday`";
        // $result = mysqli_query($conn, $query);
        $rows = array();
        $result = db_query($query);
        while($row = mysqli_fetch_assoc(($result))){
            $rows[] = $row['pic_path'];
        }

        return $rows;
    }

    function get_wc(){
        // require_once "../includes/db_ep-inc.php";
        // include "../includes/db_ep-inc.php";
        $query = "SELECT * FROM `hp_welcome`";
        // $result = mysqli_query($conn, $query);
        $rows = array();
        $result = db_query($query);
        while($row = mysqli_fetch_assoc(($result))){
            $rows[] = $row['hp_w_pic'];
        }

        return $rows;
    }

    function get_announcement(){
        // include "../includes/db_ep-inc.php";
        $query = "SELECT * FROM hp_announcement";
        // $result = mysqli_query($conn, $query);
        $rows = array();
        $result = db_query($query);
        while($row = mysqli_fetch_assoc(($result))){
            $rows[] = $row;
        }

        return $rows;
    }
    
    function db_query($data){
        include "../includes/db_ep-inc.php";
        $result = mysqli_query($conn, $data);
        // $rows = array();

        return $result;
    }
?>