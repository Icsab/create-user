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
	$token="eyJ0eXAiOiJKV1QiLCJub25jZSI6Il9SSzVKUmpWSTN1Z2VEV2ozLVdNQ1VkSjFkNGNubEtHd1pPeHRaV3EwWWciLCJhbGciOiJSUzI1NiIsIng1dCI6Im5PbzNaRHJPRFhFSzFqS1doWHNsSFJfS1hFZyIsImtpZCI6Im5PbzNaRHJPRFhFSzFqS1doWHNsSFJfS1hFZyJ9.eyJhdWQiOiJodHRwczovL2dyYXBoLm1pY3Jvc29mdC5jb20iLCJpc3MiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC8yZGQ4OTI5MS0yMzIyLTQxNWItYTYwMC01ZDZiMzg1OGU0NGQvIiwiaWF0IjoxNjI3NjQzMDAxLCJuYmYiOjE2Mjc2NDMwMDEsImV4cCI6MTYyNzY0NjkwMSwiYWlvIjoiRTJaZ1lJaXkvSmtwMWlreFFmaGhzNDdWMFU5Y0FBPT0iLCJhcHBfZGlzcGxheW5hbWUiOiJDcmVhdGVOZXdVc2VyIiwiYXBwaWQiOiI2NmE4ZGRkZS0xMTk1LTRmOGMtYTZkMC0zNzlhOTY0NTJhOWUiLCJhcHBpZGFjciI6IjEiLCJpZHAiOiJodHRwczovL3N0cy53aW5kb3dzLm5ldC8yZGQ4OTI5MS0yMzIyLTQxNWItYTYwMC01ZDZiMzg1OGU0NGQvIiwiaWR0eXAiOiJhcHAiLCJvaWQiOiI4Y2I4NTY4ZS05MzRhLTQ5ZjgtYTNkNC03MDUzODM2M2ZhOGEiLCJyaCI6IjAuQVlFQWtaTFlMU0lqVzBHbUFGMXJPRmprVGQ3ZHFHYVZFWXhQcHRBM21wWkZLcDZCQUFBLiIsInN1YiI6IjhjYjg1NjhlLTkzNGEtNDlmOC1hM2Q0LTcwNTM4MzYzZmE4YSIsInRlbmFudF9yZWdpb25fc2NvcGUiOiJFVSIsInRpZCI6IjJkZDg5MjkxLTIzMjItNDE1Yi1hNjAwLTVkNmIzODU4ZTQ0ZCIsInV0aSI6IlJsRHFYNFFyN2syY2YtMmVqeUVjQUEiLCJ2ZXIiOiIxLjAiLCJ3aWRzIjpbIjA5OTdhMWQwLTBkMWQtNGFjYi1iNDA4LWQ1Y2E3MzEyMWU5MCJdLCJ4bXNfdGNkdCI6MTYyMjAxNjk3NX0.WVL4cLn3BKiK3TJhffHb2iuHVZcvAA25eU9iz9H4-fLKv3heqaHuzp1mQfw_tWZY90vs_Ie4vL5Hodil2XI3odQKEBaN9DwUqyFKA2tXldlk4LFJ7curO_zz1rVj9HnO3VX-Boe6zoBcyUijPuRSWnW6hfxTEMsfaS8NAT2zKlENTngHzwoH4j0eI4c3PUoZL2TD3h6NUazEse5STMiFgiVZ2ilHnusrzon-Nosd2gbPUE4ntjpe6nAQRS0ejCA57F8hB54Syx8ZqHiNMYFy2hiypg6ycr6yhEo75-Hq4pUoxFlIvjfXkQK_aF2s-uQK5OzDOsVMZyg7j2nhpmkzOA";
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
        
      
	   
	  
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://graph.microsoft.com/v1.0/users',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_POSTFIELDS =>'{
				"accountEnabled": true,
				"displayName": '.$username.',
				"mailNickname": '.$username.',
				"userPrincipalName": '.$cn_email.',
				"passwordProfile" : {
				"forceChangePasswordNextSignIn": false,
				"password": '.$password.'
			  }
			}',
		  CURLOPT_HTTPHEADER => array(
			'Authorization: Bearer '.$token,
			'Content-type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
				

        $subject = "Welcome on-boarding email & password (" . $cn;
        $body = "Heya!,<br><br>Login to <a href=\"https://go.crewnew.com\">go.crewnew.com</a> with<br>user: " . $username . "<br>pass: " . $password;
        $body .= "<br><br><a href=\"https://go.crewnew.com/index.php/s/YYCYwb4r9AjQYDi\">Lodin instructions>></a>";
    }
    ?>
</body>

</html>
