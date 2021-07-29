<?php
// Connection to CrewNew Hasura GraphQL to read/write "users" table apps.crewnew.com/console/data/schema/public/tables/users/browse and other tables. Here @borisa can help if any questions
require('graphqlConfig.php');
require('graphql/queries.php');
require('graphql/insertMutations.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Worker Account 2</title>
    <meta name="description" content="Create a new worker account at CrewNew. Step2.">
    <meta name="author" content="CrewNew">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <h1>Add Worker Account (step2)</h1>
    <?php
    if (!empty($_POST)) {
        $cnid = $_POST['cnid'];
        $username = strtolower($_POST['username']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $jobtitle = $_POST['jobtitle'];
        $cn_email = $username . "@crewnew.com";
        $cc = "others@e-stonia.co.uk";

        /*
            POST https://graph.microsoft.com/v1.0/users
            Content-type: application/json

            {
                "accountEnabled": true,
                "displayName": $username,
                "mailNickname": $username,
                "userPrincipalName": $cn_email,
                "passwordProfile" : {
                    "forceChangePasswordNextSignIn": false,
                    "password": $password
                }
            }
        */

        $subject = "Welcome on-boarding email & password (" . $cn;
        $body = "Heya!,<br><br>Login to <a href=\"https://go.crewnew.com\">go.crewnew.com</a> with<br>user: " . $username . "<br>pass: " . $password;
        $body .= "<br><br><a href=\"https://go.crewnew.com/index.php/s/YYCYwb4r9AjQYDi\">Lodin instructions>></a>";
    }
    ?>
</body>

</html>