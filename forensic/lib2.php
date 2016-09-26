<?php
setlocale(LC_ALL, 'es_ES.utf8');

session_start();

function getForm($var, $default = '') {
  if(isset($_POST[$var]))
    return $_POST[$var];
  elseif(isset($_GET[$var]))
    return $_GET[$var];
  else
    return $default;
} // getForm

function getFormNull($var, $default = '') {
  if(isset($_POST[$var]))
    return $_POST[$var];
  elseif(isset($_GET[$var]))
    return $_GET[$var];
  else
    return null;
} // getForm

function getFormFile($var) {
  if(isset($_FILES[$var]))
    return $_FILES[$var];
  else
    return false;
} // getForm

function getCookie($var, $default) {
  if(isset($_COOKIE[$var])) 
    return $_COOKIE[$var];
  else
    return $default;
} // getCookie

function writeCookie($var, $value, $onlySession) {
	if(isset($value)) {
		if($onlySession){
			$estaSetteada = setcookie($var, $value, 0); 
		}
		else{	 
			setcookie($var, $value, time()+2592000);  // 30*24*60*60
		}
	} else
		setcookie($var, '', time()-60);
} // setCookie

function cleanCookies(){
	foreach ($_COOKIE as $name => $value) {
		if(strpos($name,'098')!==false && strpos($name,'098')==0){
			setcookie($name, '', time()-60);
		}
	}
}
function getSession($var, $default) {
  if(isset($_SESSION[$var]))
    return $_SESSION[$var];
  else
    return $default;
} // getCookie

function setSession($var, $value) {
        $_SESSION[$var]=$value;
        /*if(isset($value)) {
                if($onlySession){
                        $estaSetteada = setSession($var, $value, 0);
                }
                else{
                        setSession($var, $value, time()+2592000);  // 30*24*60*60
                }
        } else
                setSession($var, '', time()-60);*/
} // setCookie

function CallAPI2($method, $url, $data = false)
{
    $curl = curl_init();
    switch ($method)
    {
        case "POST":
                        curl_setopt($curl, CURLOPT_POST, true);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        case "DELETE":
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                        $curl_post_data = array(
                                        'note' => 'this is spam!',
                                        'useridentifier' => 'agent@example.com',
                                        'apikey' => 'key001'
                        );
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
                        break;
                default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
                        curl_setopt($curl, CURLOPT_URL, $url);
    }

//    // Optional Authentication:
//    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $error_message = '';
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
              $info = curl_getinfo($curl);
                return $info;
        }
        curl_close($curl);

        $decoded = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                $error_message = '2.error occured during curl exec. Additional info: ' . $decoded->response->errormessage;
                return $error_message;
        }
    return $curl_response;
}


function checkUser($user, $password){
	return "true";
/*	$curl = curl_init();
	curl_setopt($curl, CURLOPT_POST, true);

        $data = array(
                'user' => $user,
                'password' => $password
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//    // Optional Authentication:
//    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
	curl_setopt($curl, CURLOPT_URL, 'http://dev.digitale-kuratierung.de/api/e-parrot/checkUser');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);

	$error_message = '';
	$curl_response = curl_exec($curl);
	if ($result === false) {
	//              $info = curl_getinfo($curl);
		$error_message = '1.error occured during curl exec. ';
		return $error_message;
	}
	curl_close($curl);

	$decoded = json_decode($curl_response);
	if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
		$error_message = '2.error occured during curl exec. Additional info: ' . $decoded->response->errormessage;
		return $error_message;
	}
	return $result;*/
}

function registerUser($user, $password, $password2, $name){
//        return "true";
      $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);

        $data = array(
                'user' => $user,
                'password' => $password,
                'password2' => $password2,
                'name' => $name
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'http://dev.digitale-kuratierung.de/api/e-parrot/registerUser');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        $error_message = '';
        $curl_response = curl_exec($curl);
        if ($result === false) {
        //              $info = curl_getinfo($curl);
                $error_message = '1.error occured during curl exec. ';
                return 'ERROR:'.$error_message;
        }
        curl_close($curl);

        $decoded = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                $error_message = '2.error occured during curl exec. Additional info: ' . $decoded->response->errormessage;
                return 'ERROR:'.$error_message;
        }
        return $result;
}

function modifyUser($user, $password, $password2, $name){
//        return "true";
      $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);

        $data = array(
                'user' => $user,
                'password' => $password,
                'password2' => $password2,
                'userName' => $name
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'http://dev.digitale-kuratierung.de/api/e-parrot/modifyUser');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        $error_message = '';
        $curl_response = curl_exec($curl);
        if ($result === false) {
        //              $info = curl_getinfo($curl);
                $error_message = '1.error occured during curl exec. ';
                return $error_message;
        }
        curl_close($curl);

        $decoded = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                $error_message = '2.error occured during curl exec. Additional info: ' . $decoded->response->errormessage;
                return $error_message;
        }
        return $result;
}

function existUser($user){
//        return "false";
      $curl = curl_init();
        curl_setopt($curl, CURLOPT_POST, true);

        $data = array(
                'user' => $user,
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_URL, 'http://dev.digitale-kuratierung.de/api/e-parrot/existUser');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        $error_message = '';
        $curl_response = curl_exec($curl);
        if ($result === false) {
        //              $info = curl_getinfo($curl);
                $error_message = '1.error occured during curl exec. ';
                return $error_message;
        }
        curl_close($curl);

        $decoded = json_decode($curl_response);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                $error_message = '2.error occured during curl exec. Additional info: ' . $decoded->response->errormessage;
                return $error_message;
        }
        return $result;
}

function createDocument($collectionName,$documentName,$description,$user,$format,$filecontent,$analysis){
        $data = array(
        'documentName' => $documentName,
        'documentDescription' => $description,
        'user' => $user,
        'informat' => $format,
        'input' => $filecontent,
        'path' => '',
        'analysis' => trim($analysis,",")
        );
//        var_dump($data);
//	echo '<br/>';
//	echo '<br/>';
//	echo '<br/>';
        
        $result = CallAPI2("POST", "http://dev.digitale-kuratierung.de/api/e-parrot/".$collectionName."/addDocument", $data);
        $json = json_decode($result);
//	var_dump($json);
//	exit(0);
        if(strpos($result,"successfully")==false){
//                echo 'Error at generating the document: '.$documentName.'<br/>'.$result;
                return $result;
        }
        else{
//                echo 'Correct document : '.$documentName.' Creation<br/>';
                return true;
        }
}

require_once('printNavbarPath.php');
?>
