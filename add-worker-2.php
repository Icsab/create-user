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

		$userObj='{
				"accountEnabled": true,
				"displayName": '.$username.',
				"mailNickname": '.$username.',
				"userPrincipalName": '.$cn_email.',
				"passwordProfile" : {
				"forceChangePasswordNextSignIn": false,
				"password": '.$password.'
			  }
			}';
		$token=getAuthToken();
		

        echo createUser($userObj,$token);
		
		
		
		function getAuthToken(){
			$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => 'https://login.microsoftonline.com/2dd89291-2322-415b-a600-5d6b3858e44d/oauth2/v2.0/token',
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => '',
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 0,
				  CURLOPT_FOLLOWLOCATION => true,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => 'POST',
				  CURLOPT_POSTFIELDS => array('client_id' => '66a8ddde-1195-4f8c-a6d0-379a96452a9e','client_secret' => '2.t~KHCum5M0TfO2wGE4bX2Sr~-OA-AnMJ','grant_type' => 'client_credentials','scope' => 'https://graph.microsoft.com/.default'),
				  /*CURLOPT_HTTPHEADER => array(
					'Cookie: fpc=AqoPH8btg85Is2AWqM781n5Tye8WAQAAAM6HmdgOAAAA; stsservicecookie=estsfd; x-ms-gateway-slice=estsfd'
				  ),*/
				));

				$response = curl_exec($curl);

				curl_close($curl);
				$resp = json_decode($response,true);
				return($resp['access_token']);
			
		}
		
		function createUser($userObj,$token){
			
			 $curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => 'https://graph.microsoft.com/v1.0/users',
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => '',
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 0,
					  CURLOPT_FOLLOWLOCATION => true,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => 'POST',
					  CURLOPT_POSTFIELDS =>$userObj,
					  CURLOPT_HTTPHEADER => array(
						'Authorization: Bearer '.$token,
						'Content-Type: application/json'
					  ),
					));

					$response = curl_exec($curl);

					curl_close($curl);
					return $response;
			
		}
        
 
        $subject = "Welcome on-boarding email & password (" . $cn;
        $body = "Heya!,<br><br>Login to <a href=\"https://go.crewnew.com\">go.crewnew.com</a> with<br>user: " . $username . "<br>pass: " . $password;
        $body .= "<br><br><a href=\"https://go.crewnew.com/index.php/s/YYCYwb4r9AjQYDi\">Lodin instructions>></a>";
    }
    ?>
</body>

</html>
