<?php
	// credits : http://blog.ethlo.com/2013/02/01/using-php-and-existing-htpasswd-file-for-authentication.html
	// This is how apache crypt the password with htpasswd.
	function cryptApr1Md5($plainpasswd, $salt)
    {
        $len = strlen($plainpasswd);
        $text = $plainpasswd.'$apr1$'.$salt;
        $bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
        for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
        for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
        $bin = pack("H32", md5($text));
        for($i = 0; $i < 1000; $i++) {
            $new = ($i & 1) ? $plainpasswd : $bin;
            if ($i % 3) $new .= $salt;
            if ($i % 7) $new .= $plainpasswd;
            $new .= ($i & 1) ? $bin : $plainpasswd;
            $bin = pack("H32", md5($new));
        }
        $tmp = '';
        for ($i = 0; $i < 5; $i++) {
            $k = $i + 6;
            $j = $i + 12;
            if ($j == 16) $j = 5;
            $tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
        }
        $tmp = chr(0).chr(0).$bin[11].$tmp;
        $tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
        "./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        return "$"."apr1"."$".$salt."$".$tmp;
    }

	// Loading htpasswd file in a array
	function load_htpasswd(){
		if(!file_exists("/etc/oar/api-users")){
			return Array();
		}

		$res = Array();
		foreach (file("/etc/oar/api-users") as $key => $value) {
			$array = explode(':',$value);
			$user = $array[0];
			$pass = rtrim($array[1]);
			$res[$user]=$pass;
		}

		return $res;
	}

	// Compare input password with htpasswd password for the $user
	// credits : http://blog.ethlo.com/2013/02/01/using-php-and-existing-htpasswd-file-for-authentication.html
	// 	     with some minors modifications.
	function test_passwd($user,$pwd){
		$array_htpasswd = load_htpasswd();
		// Unknown user !
		if(!isset($array_htpasswd[$user])){
			return false;
		}
		// $apr1 is a specific chain of characters used by htpasswd
		if(strpos($array_htpasswd[$user],'$apr1')===0){
			// MD5
			$pwd_h = explode('$',$array_htpasswd[$user]);
			$salt = $pwd_h[2];
			$hash = cryptApr1Md5($pwd,$salt);
			return $hash == $array_htpasswd[$user];
		}else{
			// crypt
			$salt = substr($array_htpasswd[$user],0,2);
			$hash = crypt($pwd,$salt);
			return $hashed == $array_htpasswd[$user];
		}
	}
?>
