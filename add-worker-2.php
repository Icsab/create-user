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
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $jobtitle = $_POST['jobtitle'];
    }
    ?>
</body>

</html>