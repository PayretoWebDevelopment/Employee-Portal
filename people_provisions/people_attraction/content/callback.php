<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div id="g_id_onload"
     data-client_id="https://noon-conservation-tune-reproduction.trycloudflare.com"
     data-login_uri="https://noon-conservation-tune-reproduction.trycloudflare.com"
     data-your_own_param_1_to_login="any_value"
     data-your_own_param_2_to_login="any_value">
</div>

<?php 

use Google\Client;
use Google\Service\Drive;
use Google\Service\Sheets;
/**
 * method to get a spreadsheet values in batch
 */

 

function batchGetValues($spreadsheetId)
    {
        /* Load pre-authorized user credentials from the environment.
        TODO(developer) - See https://developers.google.com/identity for
        guides on implementing OAuth2 for your application. */       
        $client = new Google\Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Google\Service\Drive::DRIVE);
        $service = new Google_Service_Sheets($client);
        try{
            $ranges = 'Sheet1!A1:B2';
            $params = array(
                'ranges' => $ranges
            );
            //execute the request
            $result = $service->spreadsheets_values->batchGet($spreadsheetId, $params);
            printf("%d ranges retrieved.", count($result->getValueRanges()));
            return $result;
        }
        catch(Exception $e) {
            // TODO(developer) - handle error appropriately
            echo 'Message: ' .$e->getMessage();
          }
        }
?>

<script src="https://accounts.google.com/gsi/client" onload="console.log('TODO: add onload function')">  
</script>
</body>
</html>