<?php
/**
 * Created by PhpStorm.
 * User: dingxiang-inc
 * Date: 2017/8/19
 * Time: 下午1:39
 */

namespace dingxiang\DeviceFingerprintHandle;

class DeviceFingerprintHandle
{
	public $timeout = 2;
	public static function setTimeout($timeout){
		$this->timeout = $timeout;
	}
    public static function sign($appSecret, $token)
    {
        return md5($appSecret . $token . $appSecret);
    }
	public function getDeviceInfo($url, $appKey, $appSecret,$token)
	{
		$map = array();
		$map["sign"]=$this->sign($appSecret,$token);
		$map["appId"]=$appKey;
		$map["token"]=$token;
		$data = http_build_query($map);
         
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);

		$response = curl_exec($ch);
		if (curl_errno($ch))
		{
			$response=json_encode(array( 'stateCode'=>curl_errno($ch),'message' => curl_error($ch)), JSON_FORCE_OBJECT);
		}
		curl_close($ch);

		return $response;
	}

    public function close($fp){
        try {
            if ($fp != null) {
                fclose($fp);
            }
        } catch (Exception $e) {
            echo "close error:" . $e->getMessage();
        }
    }

}
?>