<?php
    $con = mysqli_connect('localhost', 'root', '', 'szakdgame');

    if(mysqli_connect_errno())
    {
        echo "1: connection failed"; // error code #1 = connection failed
        exit();
    }

    $username = $_POST["name"];
    $szint = $_POST["szint"];
    $tulelesido = $_POST["tulelesido"];
    $survived = $_POST["death"];
    $primaryWeapon = $_POST["primaryWeapon"];
    $secondaryWeapon = $_POST["SecondaryWeapon"];
    $damageTaken = $_POST["damageTaken"];
    $kills = $_POST["kills"];
    $date = date("Y-m-d");
    $death;

    if($survived == 1) $death = true;
    else $death = false;
    $time = $tulelesido;

    $characterid;
    $namecheckquery = "SELECT username FROM users WHERE username='" . $username . "';";
    $getidquery = "SELECT users.id INTO $characterid FROM users WHERE username='" . $username . "';";

    $namecheck = mysqli_query($con, $namecheckquery) or die("2: Name check query failed");
    if(mysqli_num_rows($namecheck) != 1){
        echo "3: Either no user with name, or more than one";
        exit();
    }

    // $insertintoquery = "INSERT INTO matches(cid, time, kills, death, primary_weapon, secondary_weapon, damage_taken, date) 
    // VALUES($characterid,$username,$time,$kills,$death,$primaryWeapon,$secondaryWeapon,$damageTaken,$date);";

    $insertintoquery = "call method add_new_match($characterid,$username,$time,$kills,$death,$primaryWeapon,$secondaryWeapon,$damageTaken,$date);";
    mysqli_query($con, $insertintoquery) or die("5: insert failed") ;

 	//  $user_created_at;
    //  $character_count;
    //  $character_id;
    //  $user_id;

    //  $characteridquery = "SELECT COUNT(*), characters.id INTO $character_count, $character_id FROM users 
 	// 	INNER JOIN characters ON users.id = characters.uid
 	// 	WHERE users.id = $user_id
    //     AND characters.name = $username;
          
    //  SELECT created_at INTO $user_created_at FROM users
    //  	WHERE users.id = $user_id;
    //  IF date < $user_created_at THEN
    //  	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Match date may not be earlier than the time of the user\'s registration!';
    //  END IF;
    
    //  IF $character_count < 1 THEN
    //  	INSERT INTO characters(uid, name)
    //      	VALUES(
    //              $user_id,
    //              $username);
                
    //      SELECT characters.id INTO $character_id FROM users
 	// 		INNER JOIN characters ON users.id = characters.uid
 	// 		WHERE users.id = $user_id
    //      	AND characters.name = $username;
    //  END IF;
    
    //     INSERT INTO matches(cid, time, kills, death, primary_weapon, secondary_weapon, damage_taken, date) 
    // 	VALUES(
    //     	$character_id,
    //         $tulelesido,
    //         $kills,
    //         $death,
    //         $primaryWeapon,
    //         $secondaryWeapon,
    //         $damageTaken,
    //         $date);";


?>