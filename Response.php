<?php
require_once ('vendor/autoload.php');
 
use com\realexpayments\hpp\sdk\domain\HppResponse;
use com\realexpayments\hpp\sdk\RealexHpp;
use com\realexpayments\hpp\sdk\RealexValidationException; 
use com\realexpayments\hpp\sdk\RealexException;

// Example of Response message sent by Mobile Libraries
// hppResponse=%7B%22REALWALLET_CHOSEN%22%3A%22MQ%3D%3D%22%2C%22BATCHID%22%3A%22MzA5NTQ4%22%2C%22HPP_ORIGIN%22%3A%22aHR0cDovL2Rldi5ybHhjYXJ0cy5jb20%3D%22%2C%22CAVV%22%3A%22Q0FBQ0JDZEJRVUNIRUlkVFUwRkJBQUFBQUFBPQ%3D%3D%22%2C%22AUTHCODE%22%3A%22MTIzNDU%3D%22%2C%22AMOUNT%22%3A%22MTAwMQ%3D%3D%22%2C%22ACCOUNT%22%3A%22eW9tYTNkc2VjdXJl%22%2C%22AVSADDRESSRESULT%22%3A%22TQ%3D%3D%22%2C%22CVNRESULT%22%3A%22TQ%3D%3D%22%2C%22myFieldName%22%3A%22bXlGaWVsZFZhbHVl%22%2C%22MESSAGE%22%3A%22WyB0ZXN0IHN5c3RlbSBdIEF1dGhvcmlzZWQ%3D%22%2C%22AVSPOSTCODERESULT%22%3A%22TQ%3D%3D%22%2C%22ORDER_ID%22%3A%22ZXpNMFJUY3dSVGt6TFVGR1FrVTNNdw%3D%3D%22%2C%22RESULT%22%3A%22MDA%3D%22%2C%22XID%22%3A%22VytwaHVoa2RoV3FvTGJkWXJIdW9BejFoSkNvPQ%3D%3D%22%2C%22PASREF%22%3A%22MTQ1NzM2NjUxMzY5Nzk3NzA%3D%22%2C%22SHA1HASH%22%3A%22MTg0YzM1YmMwYTZmZTgwOWI3Y2MzNmE1ZTJhZWFkMzc3ODEwZTQ3YQ%3D%3D%22%2C%22ECI%22%3A%22Ng%3D%3D%22%2C%22TIMESTAMP%22%3A%22MjAxNjAzMDcxNjAxMzA%3D%22%2C%22MERCHANT_ID%22%3A%22c2Vhbm1hY2RvbWhuYWxsdGVzdA%3D%3D%22%2C%22HPP_TEMPLATE_TYPE%22%3A%22TElHSFRCT1g%3D%22%7D"

$responseJson = $_POST['hppResponse'];

$realexHpp = new RealexHpp("secret");
 
try { 
	$hppResponse = $realexHpp->responseFromJson($responseJson); 
	echo $realexHpp->responseToJson($hppResponse); 
	return $realexHpp->responseToJson($hppResponse); 
}
catch (RealexValidationException $e) {
	echo $e->getMessage(); 
	return $e->getMessage();
}
catch (RealexException $e) {
	echo $e->getMessage(); 
	return $e->getMessage();
}

/* Example Response Values
* $resultMessage = $hppResponse->getMessage();
* $resultCode = $hppResponse->getResult();
* $authCode = $hppResponse->getAuthCode();
*/
?>