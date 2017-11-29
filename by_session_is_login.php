<?php


class by_session_is_login
{
	//判断是否登录
	public function is_login()
	{
		$auth = session('auth');
		$auth_sign = session('auth_sign');
		if(empty($auth) || empty($auth_sign))
		{
			$user_info = $_POST;
			$this->save_session($user_info);
		}
		else
		{
			if ($auth_sign == $this->set_sign($auth))
			{
				//登录过
				///
			}
			else
			{
				//未登录
				////
			}
		}
	}
	//对用户登录信息进行 签名认证
	private function set_sign($auth)
	{
		ksort($auth);
		$str = http_build_str($auth);
		return sha1($str);
	}
	//登录是生成签名,保存session
	private function save_session($user_info)
	{
/*		$user_info = [
			'user' => 'weipeng',
			'pwd' => '123456',
			'last_login_time' => date('Y-m-d H:i:s',time())
		];*/
		session('auth',$user_info);
		session('auth_sign', $this->set_sign($user_info));
	}
}