<?php

session_start();
date_default_timezone_set('Asia/Colombo');
$Command = "";

if (isset($_GET['Command'])) {

    $Command = $_GET["Command"];
    include './DB_connector.php';
}


if ($Command == "CheckUsers") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $email = $_GET["email"];
    // $Password = $_GET["Password"];

    // $sql = "SELECT * FROM m_registration WHERE email =  '" . $email . "' and password =  '" . $Password . "' ";
    // $result = $conn->query($sql);

    if (true) {


        $sql = "SELECT registration_ref FROM sys_info";
            $result = $conn->query($sql);
            $row = $result->fetch();
            $no = $row['registration_ref'];

            $tmpinvno = "000000" . $row["registration_ref"];
            $lenth = strlen($tmpinvno);
            $no1 = trim("REG/") . substr($tmpinvno, $lenth - 7);


            $sql = "insert into m_registration(REF, email, country) values
            ('" . $no1 . "', '" . $_GET["email"] . "', '" . $_GET["country"] . "')";
            $result = $conn->query($sql);


            $no2 = $no + 1;
            $sql = "update sys_info set registration_ref = $no2 where registration_ref = $no";
            $result = $conn->query($sql);

        $sessionId = session_id();
        $_SESSION['sessionId'] = session_id();
        session_regenerate_id();
        $ip = $_SERVER['REMOTE_ADDR'];
        $_SESSION['email'] = $email;
        $_SESSION['CURRENT_USER'] = $email;



        


        $action = "ok";
        // $cookie_name = "bookshop_client";
        // $cookie_value = $email;

        // $token = substr(hash('sha512', mt_rand() . microtime()), 0, 50);
        // $extime = time() + 43200;


        // $domain = $_SERVER['HTTP_HOST'];


        // setcookie('bookshop_client', $cookie_value, $extime, "/", $domain);


        // $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
        echo $action;


        // $time = mktime(date('h'), date('i'), date('s'));
        // $time = date("g.i a");
        // $today = date('Y-m-d');
    } else {
        // $action = "not";
        // $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
        // $ResponseXML .= "</salesdetails>";
        // echo $ResponseXML;
    }
}



if ($_GET["Command"] == "save_inv") {

    

    $sql = "select * from m_token where token='" . $_GET["uniq_id"] . "' and block = '0'";
        $result = $conn->query($sql);
        if ($row1 = $result->fetch()) {

            $sql = "update m_token set block = '1' where token='" . $_GET["uniq_id"] . "'";
            $result = $conn->query($sql);

        $sql = "select * from m_registration where email='" . $_GET["email"] . "'";
        $result = $conn->query($sql);
        if ($row1 = $result->fetch()) {
            echo "Already Registered";
        } else {
            
            $sql = "SELECT registration_ref FROM sys_info";
            $result = $conn->query($sql);
            $row = $result->fetch();
            $no = $row['registration_ref'];

            $tmpinvno = "000000" . $row["registration_ref"];
            $lenth = strlen($tmpinvno);
            $no1 = trim("REG/") . substr($tmpinvno, $lenth - 7);

            $sql = "insert into m_registration(REF, first_name, email, password,uniq_id) values
            ('" . $no1 . "', '" . $_GET["full_name"] . "', '" . $_GET["email"] . "', '" . $_GET["pass"] . "', '" . $_GET["uniq_id"] . "')";
            $result = $conn->query($sql);

        
            $no2 = $no + 1;
            $sql = "update sys_info set registration_ref = $no2 where registration_ref = $no";
            $result = $conn->query($sql);



            date_default_timezone_set('Asia/Colombo');

        $sql = "SELECT * FROM m_registration WHERE email =  '" . $_GET["email"] . "'";
        $result = $conn->query($sql);

        if ($row = $result->fetch()) {

            $sessionId = session_id();
            $_SESSION['sessionId'] = session_id();
            session_regenerate_id();
            $ip = $_SERVER['REMOTE_ADDR'];
            $_SESSION['email'] = $_GET["email"];
            $_SESSION["CURRENT_USER"] = $row['first_name'] . " " . $row['last_name'];
            $_SESSION["REF"] = $row['REF'];
            $_SESSION["TYPE"] = $row['type'];
            $_SESSION["PRO_ID"] = $row['id'];

        


            if($row['type'] == "S"){
                $action = "S";
            }else{
                $action = "B";
            }


            $cookie_name = "bookshop_client";
            $cookie_value = $_GET["email"];

            $token = substr(hash('sha512', mt_rand() . microtime()), 0, 50);
            $extime = time() + 160000000;
            $domain = $_SERVER['HTTP_HOST'];
            setcookie('bookshop_client', $cookie_value, $extime, "/", $domain);

        
            $time = date("H:i:s");
            $today = date('Y-m-d');

        } else {
        
            return "not";
            echo 'not';
        }



                echo "LOG";
            
        }
    }else{



        $sql = "select * from m_token where token='" . $_GET["uniq_id"] . "' and block = '1'";
        $result = $conn->query($sql);
        if ($row1 = $result->fetch()) {
            echo "EX ID";
        }else{
            echo "NO ID";
        }



        

    }


}


if ($_GET["Command"] == "become_a_seller") {


    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

      

        $sql = "update m_registration set type = 'S' where REF = '" . $_SESSION['REF'] . "'";
        $result = $conn->query($sql);

        $sql = "Insert into sys_log(REF, entry, operation, user, ip)values
                        ('" . $_SESSION['REF'] . "' ,'entry' ,'Become a seller'  ,'" . $_SESSION['CURRENT_USER'] . "' ,'ip')";
        $result = $conn->query($sql);



        $conn->commit();
        echo "SELLER";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($Command == "logout") {

    $today = date('Y-m-d');
    $domain = $_SERVER['HTTP_HOST'];
    setcookie('bookshop_client', "", 1, "/", $domain);



    session_unset();
    session_destroy();
}


if ($_GET["Command"] == "getdt") {

    $tb = "";
    $tb .= "<table class='table table-hover'>";


    $sql = "select * from user_mast order by user_name desc";




    $tb .= "<tr>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">Name</th>";
    $tb .= "<th style=\"width: 200px;\" class=\"success\">User Type</th>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">User Department</th>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">User Email</th>";
    $tb .= "<th style=\"width: 200px;\" class=\"success\">Department Head Mail</th>";

    $tb .= "</tr>";

    foreach ($conn->query($sql) as $row) {
        $tb .= "<tr>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['user_name'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['user_type'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['user_depart'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['U_email'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['R_email'] . "</td>";
        $tb .= "</tr>";
    }
    $tb .= "</table>";

    echo $tb;
}


if ($_GET["Command"] == "edit") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql2 = "update user_mast set user_type = '" . $_GET['user_type'] . "',user_depart = '" . $_GET['user_depart'] . "',U_email = '" . $_GET['U_email'] . "',R_email = '" . $_GET['R_email'] . "' where user_name = '" . $_GET['user_name'] . "'";

        $result = $conn->query($sql2);

        $conn->commit();
        echo "EDIT";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {

    $sql = "delete from user_mast where user_name = '" . $_GET['user_name'] . "'";
    $result = $conn->query($sql);

//    $conn->commit();
    echo "Delete";
}

?>