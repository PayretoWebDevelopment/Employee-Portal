<?php  
    //encodes a string's special characters into html entities --------------------------------------------------------------------
    function htmlEntEncode($text){
        $text = htmlentities($text, ENT_QUOTES);
        $text = htmlentities($text, ENT_QUOTES);
        return $text;
    }

    //Login functions -----------------------------------------------------------
    //empty input for login  --------------------------------------------------------------------
    function emptyInput($email, $pass){
        $result = '';
        if (empty($email) || empty($pass)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }
    
    //empty input for forgotten password
    function emptyInputForget($email){
        $result = '';
        if (empty($email)){
            $result = true;
        } else{
            $result = false;
        }
        return $result;
    }
    //for login purposes --------------------------------
    // checks for duplicate email, mostly used for login purposes --------------------------------------------------------------------
    function duplicateEmail($conn, $email){
        $sql = "SELECT * FROM empportcredentials WHERE email = ?; ";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            echo "<script> window.location.href='../login/login.php?error=statementfailed' </script>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $rdata = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($rdata)){
            return $row;
        } else {
            $sql = "SELECT * FROM empportcredentials WHERE uname = ?; ";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                echo "<script> window.location.href='../login/login.php?error=statementfailed' </script>";
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $rdata = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($rdata)){
                return $row;
            } else {
                $result = false;
                return $result;
            }
        }

        mysqli_stmt_close($stmt);
    }

    
    //function for loggin in --------------------------------------------------------------------
    function login($conn, $email, $pass){
        
        $dupeEmail = duplicateEmail($conn, $email);

        if($dupeEmail === true){
            echo "<script> window.location.href='../login/login.php?error-wronglogin2' </script>";
            exit();
        }

        //Passwords_check_if_salthashed
        @$ipass = $dupeEmail["password"];

        if (password_verify($pass, $ipass) === true){
            $check = true;
        } else{
            $check = false;
        }

        if ($check === false){
            echo "<script> window.location.href='../login/login.php?error=wronglogin' </script>";
            exit();
        } else if($check === true){
            // session_start();
            $_SESSION["email"] = $dupeEmail["email"];
            
            echo "<script> window.location.href='../homepage/homepage.php' </script>";
            exit();
        }
    }

    //checks for duplicate email for forgot password --------------------------------------------------------------------
    function dupeMailForget($conn, $eforget){
        $sql = "SELECT email FROM empportcredentials WHERE email = '$eforget'";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    //Password Reset --------------------------------------------------------------------
    //checks if password for new password and confirm password is the same --------------------------------------------------------------------
    function passmatch($pass, $cpass){
        $result = false;
        if ($pass !== $cpass) {
            $result = true  ;
        } else {
            $result = false;
        }
        return $result;
    }

    //checks if new password is the same as the old password --------------------------------------------------------------------
    function samepass($opass, $pass){
        $result = false;
        if ($opass == $pass){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

    //checks if original password is the same as the passwrod stored in the database --------------------------------------------------------------------
    function wrongopass($opass){
        if ($opass == $_SESSION["password"]){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    //function for checking if the entered password for password reset and creatung a new user is weak --------------------------------------------------------------------
    function weakpass($pass) {
        $result = false;
        if (strlen($pass) < 6){
            $result = true;
        }
        if (!preg_match("#[0-9]+#", $pass)){
            $result = true;
        }
        if (!preg_match("#[a-z]+#", $pass)){
            $result = true;
        }
        if (!preg_match("#[A-Z]+#", $pass)){
            $result = true;
        }
        if (!preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $pass)){
            $result = true;
        }
        return $result;
    }

    //change password only --------------------------------------------------------------------
    function changepass1($conn, $email, $pass){
        $hpass = passSaltHash($pass);
        $sql = "UPDATE empportcredentials SET password = ? WHERE email = '$email'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            // header("location: ../account_settings.php?error=statementfailed");
            echo "<script> window.location.href='../account/account_settings.php?error=statementfailed' </script>";
            exit();
        }
        $_SESSION["password"] = $hpass;
        mysqli_stmt_bind_param($stmt, "s", $hpass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // header("location: ../account_settings.php?error=changepass");
        echo "<script> window.location.href='../account/account_settings.php?error=changepass' </script>";
        exit();
    }

    //change username only --------------------------------------------------------------------
    function changepass2($conn, $email, $uname){
        $sql = "UPDATE empportcredentials SET uname = ? WHERE email = '$email'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            // header("location: ../account_settings.php?error=statementfailed");
            echo "<script> window.location.href='../account/account_settings.php?error=statementfailed' </script>";
            exit();
        }
        $_SESSION["uname"] = $uname;
        mysqli_stmt_bind_param($stmt, "s", $uname);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // header("location: ../account_settings.php?error=changeuser");
        echo "<script> window.location.href='../account/account_settings.php?error=changeuser' </script>";
        exit();
    }

    //change both password and username --------------------------------------------------------------------
    function changepass3($conn, $email, $uname, $pass){
        $hpass = passSaltHash($pass);
        $sql = "UPDATE empportcredentials SET uname = ?, password = ? WHERE email = '$email'";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            // header("location: ../account_settings.php?error=statementfailed");
            echo "<script> window.location.href='../account/account_settings.php?error=statementfailed' </script>";
            exit();
        }
        $_SESSION["uname"] = $uname;
        $_SESSION["password"] = $hpass;
        mysqli_stmt_bind_param($stmt, "ss", $uname, $hpass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // header("location: ../account_settings.php?error=changeall");
        echo "<script> window.location.href='../account/account_settings.php?error=changeall' </script>";     
        exit();
    }
    
    // checks if inputs for password reset are empty --------------------------------------------------------------------
    function emptyInputPassAll($conn, $email, $uname, $opass, $pass, $cpass){
        $sql = "SELECT * FROM empportcredentials WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
            $dbpass = $row['password'];
        }

        if (empty($uname.$opass.$pass.$cpass)){ //empty all
            return $result = 0;
        }else{
            if(empty($uname)){ //empty user
                if(!empty($opass.$pass.$cpass)){ //if all pass inputs are not empty
                    if(password_verify($opass,$dbpass) == true && $pass == $cpass){ // checking if opass is same as pass in db, and $pass is same as $cpass
                        $dbpass = NULL;
                        $pass = NULL;
                        $opass = NULL;
                        $cpass = NULL;
                        return $result = 1;
                    }else{
                        return $result = 4;
                    }
                }
            }else{ //not empty user
                if(empty($opass.$pass.$cpass)){ 
                    return $result = 2; //just user
                }else if (!empty($uname.$opass.$pass.$cpass)){
                    if (!empty($pass)){
                        if (!empty($cpass)){
                            return $result = 3; //both user and pass filled in
                        }
                    }
                } else {
                    return $result = 4;
                }
            }
        }
    }

    //password hashing and salting --------------------------------------------------------------------
    function passSaltHash($pass){
        return password_hash($pass, PASSWORD_BCRYPT);
    }


    //get information of user --------------------------------------------------------------------
    function getInfo($conn, $email){
        $sql = "SELECT *  FROM empportcredentials WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["FN"] = $row['FN'];
            $_SESSION["LN"] = $row['LN'];
            $_SESSION["role"] = $row['role'];
            $_SESSION["location"] = $row['location'];
            $_SESSION["department"] = $row['department'];
            $_SESSION["admin"] = $row['admin'];
            $_SESSION["admin_oa"] = $row['admin_oa'];
            $_SESSION["img"] = $row['img'];
        }
    }

    //change pfp --------------------------------------------------------------------
    function resize_imagejpg($file) {
        if(file_exists($file)){
            $max_res = 500; //half scale
            $og_img = imagecreatefromjpeg($file);
            $og_w = imagesx($og_img);
            $og_h = imagesy($og_img);

            $ratio = $max_res / $og_w;
            $nw_w = $max_res;
            $nw_h = $og_h * $ratio;

            if($nw_h > $max_res){
                $ratio = $max_res / $og_h;
                $nw_h = $max_res;
                $nw_w = $og_w * $ratio;
            }

            if($og_img){
                $new_img = imagecreatetruecolor($nw_w, $nw_h);
                imagecopyresampled($new_img, $og_img, 0, 0, 0, 0, $nw_w, $nw_w, $og_w, $og_h);
                imagejpeg($new_img, $file,90);
            }
            // echo "<b>jpg</b>";
        }else{
            // header("location: ../account_settings.php?error=resizeErr");
            echo "<script> window.location.href='../account/account_settings.php?error=resizeErr' </script>";    
            exit();
        }
    }

    function uploadImage($conn, $email, $img){
        $sql = "UPDATE empportcredentials SET img = ? WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            // header("location: ../account_settings.php?error=statementfailed");
            echo "<script> window.location.href='../account/account_settings.php?error=statementfailed' </script>"; 
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $img);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        // header("location: ../account_settings.php?error=changepfp");
        echo "<script> window.location.href='../account/account_settings.php?error=changepfp' </script>"; 
        exit();
    }

    //file upload functions for admin access --------------------------------------------------------------------
    //it helpdesk
    function add_load_file_ithelp($folder, $id){
        $sql = "UPDATE `it_helpdesk` SET `link` = '$folder' WHERE `id` = '$id';";
        return $sql;
    }

    //people management
    function add_load_file_pman($folder, $id){
        $sql = "UPDATE `p_management` SET `link` = '$folder' WHERE `id` = '$id';";
        return $sql;
    }

    //people excellence
    function add_load_file_pxcl($folder, $id){
        $sql = "UPDATE `p_excellence` SET `link` = '$folder' WHERE `id` = '$id';";
        return $sql;
    }

    //file upload for e_admin
    function add_load_file_eadm($folder, $id){
        $sql = "UPDATE `e_admin` SET `link` = '$folder' WHERE `id` = '$id';";
        return $sql;
    }


    //file upload for p_support
    function add_load_file_psup($folder, $id){
        $sql = "UPDATE `p_support` SET `link` = '$folder' WHERE `id` = '$id';";
        return $sql;
    }

    //file upload for p_support
    function add_load_file_events_activities($folder, $id){
        $sql = "UPDATE `events_activities` SET `e_img` = '$folder' WHERE `e_id` = '$id';";
        return $sql;
    }



    //user list settings ------------------------------------------------------------
    function while_loop($loop){
    	$result = array();
    	while ($row = mysqli_fetch_array($loop)){
    		$result[] = $row;
    	}

    	return $result;
    }

    function find_by_sql($query){
		include 'db_ep-inc.php';
		$result = mysqli_query($conn,$query);
		$result_set = while_loop($result);

		return $result_set;
	}

    //gets all employees from the database
    function find_employee_list(){
        $query = "SELECT * FROM empportcredentials";

        return find_by_sql($query);
    }

    //for data sanitization ------------------------------------------------------------
    function sanitize($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    
    //for adding new user to the database --------------------------------
    function insert_employee($username, $FN, $LN, $role, $location, $department, $email, $password, $admin, $admin_oa, $img){
        $query = "INSERT INTO empportcredentials (`ID`, `uname`, `FN`, `LN`, `role`, `location`, `department`, `email`, `password`, `admin`, `admin_oa`, `img`) VALUES
                    ( default, '$username', '$FN', '$LN', '$role', '$location', '$department', '$email', '$password', '$admin', '$admin_oa', '$img' )";
        return $query;
    }
    
    //for deletion of user from the database --------------------------------
    function delete_employee($ID){
        $query = "DELETE FROM empportcredentials WHERE ID = '$ID'";
        return $query;
    }

    // for updating password of existing user --------------------------------
    function update_password($email, $new_pass){
		$query = "UPDATE empportcredentials SET password = '$new_pass' WHERE email = '$email'";
		return $query;
	}

    //for updating all contents of the existing user
    function update_user($id, $username, $FN, $LN, $role, $location, $department, $email, $admin, $admin_oa){
        $query = "UPDATE empportcredentials SET `uname` = '$username', `FN` = '$FN', `LN`='$LN', `role`='$role', `location`='$location', `department`='$department', `email`='$email', `admin`='$admin', `admin_oa`='$admin_oa' WHERE `id` = '$id'";
        return $query;
    }

    //check if duplicate username for superadmin adding new users
    function checkUserDuplicate($conn, $user){
        $sql = "SELECT `uname` FROM empportcredentials";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($row as $key => $value){
            if ($user == $value){
                return true;
            }
        }
    }

    //checks if there is duplicate email for adding new users
    function checkEmailDuplicate($conn, $email){
        $sql = "SELECT `email` FROM empportcredentials";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach ($row as $key => $value){
            if ($email == $value){
                return true;
            }
        }
    }

    //Homepage Birthday Image



    /**
     * Find all payreto points users
     */
    function findPayretoPoints($email){
        include 'db_ep-inc.php';
        $sql = "SELECT FN, LN FROM empportcredentials WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $fn = strtolower($row['FN']);
            $ln = strtolower($row['LN']);
        }

        $name = $ln . ", " . $fn;
        $name2 = $fn . " " . $ln;

        $sql2 = "SELECT * FROM payreto_points WHERE LOWER(name_p) = '$name' OR LOWER(name_p) = '$name2'";

        $result = mysqli_query($conn, $sql2);

        $datas = Array();
        while($rows = mysqli_fetch_assoc($result)){
            $datas[] = $rows;
        }

        // if(empty($datas)){

        // }

        return $datas;
    }
?>

<!-- Javascript for adding new fields -->
<script type='text/javascript'>
    //function for adding new fields for Post-Event Surveys
        function addFieldsP(){
            // disable anchor tag for adding new fields
            document.getElementById('addrowP').style.pointerEvents = 'none';
            // Generate a dynamic number of inputs
            var numberP = document.getElementById("p_field").value;
            // Get the element where the inputs will be added to
            var contain1 = document.getElementById("contain1");
            contain1.appendChild(document.createElement("br"));
            for (i=1;i<=numberP;i++){
                // Append a node with a random text
                // contain.appendChild(document.createTextNode((i+1)));
                // Create an <input> element, set its type and name attributes
                
                contain1.appendChild(document.createElement("br"));
                var inputP = document.createElement("input");
                inputP.type = "text";
                inputP.name = "p_field" + i;
                inputP.id = "p_field" + i;
                if(i/2==1){
                    inputP.placeholder = "Event Link";
                } else {
                    inputP.placeholder = "Event Name";
                }
                
                contain1.appendChild(inputP);
                // Append a line break 
                contain1.appendChild(document.createElement("br"));
                console.log(inputP.id);
            }
        }

        //function for adding new fields for List of Intern Positions
        function addFieldsI(){
            // disable anchor tag for adding new fields
            document.getElementById('addrowI').style.pointerEvents = 'none';
            // Generate a dynamic number of inputs
            var numberI = document.getElementById("i_field").value;
            // Get the element where the inputs will be added to
            var contain5 = document.getElementById("contain5");
            contain5.appendChild(document.createElement("br"));
            for (i=1;i<=numberI;i++){
                // Append a node with a random text
                // contain.appendChild(document.createTextNode((i+1)));
                // Create an <input> element, set its type and name attributes
                
                contain5.appendChild(document.createElement("br"));
                var inputI = document.createElement("input");
                inputI.type = "text";
                inputI.name = "i_field" + i;
                inputI.id = "i_field" + i;
                if(i==1){
                    inputI.placeholder = "Position";
                } else {
                    inputI.placeholder = "Number";
                }
                
                contain5.appendChild(inputI);
                // Append a line break 
                contain5.appendChild(document.createElement("br"));
                console.log(inputI.id);
            }
        }

        //function for adding new fields for List of Open Requisitions
        function addFieldsR(){
            // disable anchor tag for adding new fields
            document.getElementById('addrowR').style.pointerEvents = 'none';
            // Generate a dynamic number of inputs
            var numberR = document.getElementById("r_field").value;
            // Get the element where the inputs will be added to
            var contain4 = document.getElementById("contain4");
            contain4.appendChild(document.createElement("br"));
            for (i=1;i<=numberR;i++){
                // Append a node with a random text
                // contain.appendChild(document.createTextNode((i+1)));
                // Create an <input> element, set its type and name attributes
                
                contain4.appendChild(document.createElement("br"));
                var inputR = document.createElement("input");
                inputR.type = "text";
                inputR.name = "r_field" + i;
                inputR.id = "r_field" + i;
                if(i==1){
                    inputR.placeholder = "Position";
                } else {
                    inputR.placeholder = "Number";
                }
                
                contain4.appendChild(inputR);
                // Append a line break 
                contain4.appendChild(document.createElement("br"));
                console.log(inputR.id);
            }
        }

        //function for adding new fields for List of OSH Programs and Activities
        function addFieldsO(){
            // disable anchor tag for adding new fields
            document.getElementById('addrowO').style.pointerEvents = 'none';
            // Generate a dynamic number of inputs
            var numberO = document.getElementById("o_field").value;
            // Get the element where the inputs will be added to
            var contain3 = document.getElementById("contain3");
            contain3.appendChild(document.createElement("br"));
            for (i=1;i<=numberO;i++){
                // Append a node with a random text
                // contain.appendChild(document.createTextNode((i+1)));
                // Create an <input> element, set its type and name attributes
                
                contain3.appendChild(document.createElement("br"));

                if(i==1){
                    var inputO = document.createElement("input");
                    inputO.type = "text";
                    inputO.name = "o_field" + i;
                    inputO.id = "o_field" + i;
                    inputO.placeholder = "Program Name";
                    contain3.appendChild(inputO);
                } else if(i==2) {
                    var inputO = document.createElement("input");
                    inputO.type = "date";
                    inputO.name = "o_field" + i;
                    inputO.id = "o_field" + i;
                    contain3.appendChild(inputO);
                } else if(i==3) {
                    var textarea = document.createElement("textarea");
                    textarea.className = "g-form fs-6 fw-semibold my-1";
                    textarea.name = "o_field" + i;
                    textarea.id = "o_field" + i;
                    textarea.placeholder = "Description";
                    contain3.appendChild(textarea);
                } else if (i==4) {
                    var labelO = document.createElement("label");
                    labelO.setAttribute("for", "o_img" + i);
                    labelO.className = "mb-2 mt-2 fs-6";
                    labelO.innerHTML = "Poster Image Here (not required):";
                    labelO.id = "o_img" + i;
                    labelO.name = "o_img" + i;
                    contain3.appendChild(labelO);

                    var inputO = document.createElement("input");
                    inputO.type = "file";
                    inputO.className = "form-control";
                    inputO.name = "o_img" + i;
                    inputO.id = "o_img" + i;
                    contain3.appendChild(inputO);
                }

                // Append a line break 
                contain3.appendChild(document.createElement("br"));
                console.log(inputO.id);
            }
        }


        //function for adding new fields for Events and Activities
        function addFieldsE(){
            // disable anchor tag for adding new fields
            document.getElementById('addrowE').style.pointerEvents = 'none';
            // Generate a dynamic number of inputs
            var numberE = 5;
            // Get the element where the inputs will be added to
            var contain2 = document.getElementById("contain2");
            contain2.appendChild(document.createElement("br"));
            for (i=1;i<=numberE;i++){
                // Append a node with a random text
                // contain2.appendChild(document.createTextNode((i+1)));
                // Create an <input> element, set its type and name attributes
                
                contain2.appendChild(document.createElement("br"));

                if(i==1){
                    var inputE = document.createElement("input");
                    inputE.type = "text";
                    inputE.name = "e_field" + i;
                    inputE.id = "e_field" + i;
                    inputE.placeholder = "Event Name";
                    contain2.appendChild(inputE);
                } else if(i==2) {
                    var inputE = document.createElement("input");
                    inputE.type = "text";
                    inputE.name = "e_field" + i;
                    inputE.id = "e_field" + i;
                    inputE.placeholder = "Team Name";
                    contain2.appendChild(inputE);
                } else if(i==3) {
                    var inputE = document.createElement("input");
                    inputE.type = "date";
                    inputE.name = "e_field" + i;
                    inputE.id = "e_field" + i;
                    contain2.appendChild(inputE);
                } else if(i==4) {
                    var textarea = document.createElement("textarea");
                    textarea.className = "g-form fs-6 fw-semibold my-1";
                    textarea.name = "e_field" + i;
                    textarea.id = "e_field" + i;
                    textarea.placeholder = "Content";
                    contain2.appendChild(textarea);
                }else if(i==5) {
                    var labelE = document.createElement("label");
                    labelE.setAttribute("for", "e_img" + i);
                    labelE.className = "mb-2 mt-2 fs-6";
                    labelE.innerHTML = "Poster Image Here (not required):";
                    labelE.id = "e_img" + i;
                    labelE.name = "e_img" + i;
                    contain2.appendChild(labelE);

                    var inputE = document.createElement("input");
                    inputE.type = "file";
                    inputE.className = "form-control";
                    inputE.name = "e_img" + i;
                    inputE.id = "e_img" + i;
                    contain2.appendChild(inputE);
                }
                
                // Append a line break 
                contain2.appendChild(document.createElement("br"));
                console.log(inputE.id);
            }
        }

        var decodeEntities = (function() {
        // this prevents any overhead from creating the object each time
        var element = document.createElement('div');

        function decodeHTMLEntities (str) {
            if(str && typeof str === 'string') {
            // strip script/html tags
            str = str.replace(/<script[^>]*>([\S\s]*?)<\/script>/gmi, '');
            str = str.replace(/<\/?\w(?:[^"'>]|"[^"]*"|'[^']*')*>/gmi, '');
            element.innerHTML = str;
            str = element.textContent;
            element.textContent = '';
            }

            return str;
        }

        return decodeHTMLEntities;
        })();
</script>