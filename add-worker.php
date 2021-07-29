<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Worker Account</title>
    <meta name="description" content="Create a new worker account at CrewNew">
    <meta name="author" content="CrewNew">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <h1>Add Worker Account</h1>
    <form action="add-worker-2.php" method="post">
        <table cellspacing="8" cellpadding="8">
            <tr>
                <td><strong>cnID <span style="color:red">**</span></strong></td>
                <td><input type="text" name="cnid" />
                    <!--TODO3: Get first name from DB & if first name exists as a username then "firstname." + first letter of surname & if that also exists then "firstname" + 1 & if exists then 2, 3 etc.-->
                </td>
            </tr>
            <!--TODO3: Get the profile pic from DB-->
            <tr>
                <td><strong>Username <span style="color:red">**</span></strong></td>
                <td><input type="text" name="username" />
                    <!--TODO3: PHP make all small letters-->
                </td>
            </tr>
            <tr>
                <td><strong>Email <span style="color:red">**</span></strong></td>
                <td><input type="text" name="email" />
                    <!--TODO3: Get email from DB-->
                </td>
            </tr>
            <tr>
                <td><strong>Password <span style="color:red">**</span></strong></td>
                <td><input type="text" value="<?php echo "Pass!Me" . rand(1, 999); ?>" name="password" /></td>
            </tr>
            <tr>
                <td><strong>Job title</strong></td>
                <td><input type="text" name="jobtitle" size="30" /></td>
                <!--TODO3: Get from DB-->
            </tr>
        </table>
        <br />
        <input type="submit" value="Create accounts & send welcome email>>" />
    </form>
</body>

</html>
