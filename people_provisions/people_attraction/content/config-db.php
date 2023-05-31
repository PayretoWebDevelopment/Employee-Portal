<?php 



    function is_table_empty(){
        include '../../../includes/db_ep-inc.php';
        $result = mysqli_query($conn, "SELECT id FROM google_oauth WHERE provider = 'google'");
        if($result->num_rows){
            return false;
        }
        else{
            return true;
        }
    }

    function get_access_token(){
        include '../../../includes/db_ep-inc.php';
        $sql = mysqli_query($conn, "SELECT provider_value FROM google_oauth WHERE provider = 'google'");
        $result = $sql->fetch_assoc();
        return json_decode($result['provide_value']);
    }

    function get_refersh_token(){
        $result = get_access_token();
        return $result->refresh_token;
    }

    function update_access_token($token){
        include '../../../includes/db_ep-inc.php';
        if(is_table_empty()){
            mysqli_query($conn,"INSERT INTO google_oauth(provider, provider_value) VALUES('google', '$token')");
        }
        else{
            mysqli_query($conn, "UPDATE google_oauth SET provider_value = '$token' WHERE provider = 'google'");
        }
    }


?>