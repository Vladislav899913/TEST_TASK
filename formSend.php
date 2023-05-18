<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $theme = $_POST["theme"];
    $message = $_POST["message"];
    if (!$name || !$email || !$phone || !$theme || !$message) {
        echo "<script> alert(\"Вы ввели не все данные!\"); </script>";
        exit;
    } else
    {
        $db = new mysqli("localhost", "root", "", "TEST_TASK");
        if (!$db) {
            echo "<script> alert(\"Ошибка соединения с БД!\"); </script>";
            exit;
        } else {
            $selectContact = mysqli_query($db, "select * from Contacts where Email = '$email' and Phone = '$phone'"); 
            $numberOfContacts = mysqli_num_rows($selectContact);
            if(!$numberOfContacts) {
                $insertContact = mysqli_query($db, "insert into Contacts values(NULL,'" . $name . "', '" . $email . "', '" . $phone . "')");
            }

            $selectTheme = mysqli_query($db, "select * from Themes where Theme = '$theme'");
            $numberOfThemes = mysqli_num_rows($selectTheme);
            if(!$numberOfThemes) {
                $insertTheme = mysqli_query($db, "insert into Themes values(NULL,'" . $theme . "')");
            }

            $selectIdContact = mysqli_query($db, "select * from Contacts where Name = '". $name ."'");
            $IdContact = mysqli_fetch_assoc($selectIdContact)['id'];

            $selectIdTheme = mysqli_query($db, "select * from Themes where Theme = '". $theme ."'");
            $IdTheme = mysqli_fetch_assoc($selectIdTheme)['id'];

            $insertMessage = mysqli_query($db, "insert into Messages values(NULL,'$message', '$IdContact', '$IdTheme')");

            $response = ["messageResult" => "Письмо отправлено!", "name" => $name, "email" => $email, "phone" => $phone, "theme" => $theme, "message" => $message];
            echo json_encode($response);
            exit;
        }
        exit;
    }
?>