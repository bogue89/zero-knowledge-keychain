<?php
class ZKKGenerator {
	static public function generateSeed($username) {
		return md5($username.mt_rand(0, mt_getrandmax()));
	}
	static public function generatePassword($request, $seed) {
		$context = $request['context'];
		$username = $request['username'];
		
		$pass = convBase(md5($context.$username.$seed), '0123456789abcdef', "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNIOPQRSTUVWXYZ()-_!$%&=@#");

		return $pass;
	}

}