<?php
/**
	通过邮箱来获取用户的头像
*/
function getAvatarProfile($email){

	$hash=md5(strtolower($email));
	return 'http://www.gravater.com/avatar/'.$hash;
}