<?php
    //import vaules of variables from HTML form
    $names = $_GET['names'];
    $match = $_GET['match'];
    $robot = $_GET['robot'];
    $teamnumber = $_GET['teamnumber'];
    $noshow = $_GET['noshow'];
if(empty($noshow)){
    $noshow = 0;
}
    $location = $_GET['location'];
    $auto_upper_cone = $_GET['auto_upper_cone'];
    $auto_middle_cone = $_GET['auto_middle_cone'];
    $auto_lower_cone = $_GET['auto_lower_cone'];
    $auto_upper_cube = $_GET['auto_upper_cube'];
    $auto_middle_cube = $_GET['auto_middle_cube'];
    $auto_lower_cube = $_GET['auto_lower_cube'];
    $mobility = $_GET['mobility'];
if(empty($mobility)){
    $mobility = 0;
}
    $auto_pickup = $_GET['auto_pickup'];
if(empty($auto_pickup)){
    $auto_pickup = 0;
}
    $auto_dock_engage = $_GET['auto_dock_engage'];
    $teleop_upper_cone = $_GET['teleop_upper_cone'];
    $teleop_middle_cone = $_GET['teleop_middle_cone'];
    $teleop_lower_cone = $_GET['teleop_lower_cone'];
    $teleop_upper_cube = $_GET['teleop_upper_cube'];
    $teleop_middle_cube = $_GET['teleop_middle_cube'];
    $teleop_lower_cube = $_GET['teleop_lower_cube'];
    if($_GET['ground'] && $_GET['substation']){
        $teleop_pickup = 'BOTH';
    }else{
        if($_GET['ground']){
            $teleop_pickup = 'GROUND';
        }
        if($_GET['substation']){
            $teleop_pickup = 'SUBSTATION';
        }
        if(!$_GET['substation'] && !$_GET['ground']){
            $teleop_pickup = 'NONE';
        }
        
    }
    $links = $_GET['links'];
    $early_endgame = $_GET['early_endgame'];
if(empty($early_endgame)){
    $early_endgame = 0;
}
    $endgame = $_GET['endgame'];
    $num_docked = $_GET['num_docked'];
    $skill = $_GET['skill'];
    $defense = $_GET['defense'];
    $died = $_GET['died'];
if(empty($died)){
    $died = 0;
}
    $tipped = $_GET['tipped'];
if(empty($tipped)){
    $tipped = 0;
}
    $card = $_GET['card'];
if(empty($card)){
    $card = 0;
}
    $damage = $_GET['damage'];
if(empty($damage)){
    $damage = 0;
}
    $comments = $_GET['comments'];
    $combined = $names . $match . $robot . $teamnumber;
    $md5 = md5($combined);
    
    //setting up database connection
    $host = "localhost";
    $username = "api";
    $password = "";
    $dbname = "scouting2023";

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    //duplicate protection
    $read = "SELECT 'MD5 Hash' FROM `input_from_site` WHERE 'MD5 Hash' = '$md5'";
    $read_result = mysqli_query($conn, $read);
    if (mysqli_num_rows($read_result) > 0) {
        echo "<h1>Duplicate Information</h1>";
        //header('Location: index.html');
        //not needed since it auto-closes now
    }

    $insert = "INSERT INTO input_from_site VALUES ('$names', '$match', '$robot', '$teamnumber', '$noshow', '$location', '$mobility', '$auto_upper_cone', '$auto_middle_cone', '$auto_lower_cone', '$auto_upper_cube', '$auto_middle_cube', '$auto_lower_cube', '$auto_pickup', '$auto_dock_engage', '$teleop_upper_cone', '$teleop_middle_cone', '$teleop_lower_cone', '$teleop_upper_cube', '$teleop_middle_cube', '$teleop_lower_cube', '$teleop_pickup', '$links', '$early_endgame', '$endgame', '$num_docked', '$skill', '$defense', '$died', '$tipped', '$card', '$damage', '$comments', '$md5')";
    echo $insert;

    try{$write = mysqli_query($conn, $insert);}
    catch(Exception $e){
	echo'<script>window.close();</script>';
    }
    //because some reason the duplicate protection fails, do it again
        //header('Location: index.html');
        //not needed since it auto-closes now
    if($write)
    {
        echo "<h1>Entries added!</h1><p>redirecting...</p>";
        //header('Location: index.html');
        //not needed since it auto-closes now
    }
    mysqli_close($conn);

?>
<script>
    window.close(); //auto-close the window. 
                    //Eliminates the need to set default values and 
                    //save session variables and works better anyway.
</script>
