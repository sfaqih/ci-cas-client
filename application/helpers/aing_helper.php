<?php
/**
 * Function Name
 *
 * Function description
 *
 * @access	public
 * @param	type	name
 * @return	type	
 */
 
if (! function_exists('greeting'))
{
	function greeting($nama = false)
	{
		date_default_timezone_set("Asia/Jakarta");

		$b = time();
		$hour = date("G",$b); 

		if ($hour>=0 && $hour<=11)
		{
		echo "Selamat Pagi ".$nama." :)";
		}
		elseif ($hour >=12 && $hour<=14)
		{
		echo "Selamat Siang ".$nama." :) ";
		}
		elseif ($hour >=15 && $hour<=17)
		{
		echo "Selamat Sore ".$nama." :) ";
		}
		elseif ($hour >=17 && $hour<=18)
		{
		echo "Selamat Petang ".$nama." :) ";
		}
		elseif ($hour >=19 && $hour<=23)
		{
		echo "Selamat Malam ".$nama." :) ";
		}		
	}

	function block_access()
	{
		redirect(base_url(), 'refresh');
	}
	

	function not_found()
	{
		$CI =& get_instance();

		$CI->load->view('errors/html/custom_404');
	}

    function _form_dropdown($table, $id, $text)
    {
        $CI =& get_instance();
   
        $CI->db->order_by($text, 'asc');
        $query = $CI->db->get($table)->result_array();

        foreach ($query as $key => $value) {
            foreach ($value as $keys => $hasil) {
                if ($keys == $id) {
                    $data[$key] = array($value[$id] => $value[$text]);   
                }
            }
		}
		
        return array_flatten($data);
	}   
	
    function array_flatten($array) 
    { 
      if (!is_array($array)) { 
        return false; 
      } 

      $result = array(); 
      foreach ($array as $key => $value) { 
        if (is_array($value)) { 
          $result = $result + array_flatten($value); 
        } else { 
          $result[$key] = $value; 
        } 
      } 

      return $result; 
    } 	

	function get_rnd_iv($iv_len)
	{
		$iv = '';
		while ($iv_len-- > 0) {
			$iv .= chr(mt_rand() & 0xff);
		}
		return $iv;
	}	

	function base64_encrypt($plain_text, $password = '', $iv_len = 16)
	{
		$plain_text .= "\x13";
		$n = strlen($plain_text);
		if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
		$i = 0;
		$enc_text = get_rnd_iv($iv_len);
		$iv = substr($password ^ $enc_text, 0, 512);
		while ($i < $n) {
			$block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
			$enc_text .= $block;
			$iv = substr($block . $iv, 0, 512) ^ $password;
			$i += 16;
		}
		$hasil=base64_encode($enc_text);
		return str_replace('+', '@', $hasil);
	}

	function base64_decrypt($enc_text, $password = '', $iv_len = 16)
	{
		$enc_text = str_replace('@', '+', $enc_text);
		$enc_text = base64_decode($enc_text);
		$n = strlen($enc_text);
		$i = $iv_len;
		$plain_text = '';
		$iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
		while ($i < $n) {
			$block = substr($enc_text, $i, 16);
			$plain_text .= $block ^ pack('H*', md5($iv));
			$iv = substr($block . $iv, 0, 512) ^ $password;
			$i += 16;
		}
		return preg_replace('/\\x13\\x00*$/', '', $plain_text);
	}

	function create_file($name, $value)
	{
		$create = fopen($name, 'w');
		fwrite($create, $value);
		fclose($create);
		chmod($name, 0777); 
		return $name;
	}

	function create_controller($name)
	{
		$file_name = ucfirst($name).'.php';
		$value = "
		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class ". $name ." extends MY_Controller {

			public function __construct()
			{
				parent::__construct();
			}
		}
		";
		$path = APPPATH.'controllers/'.$file_name;

		return create_file($path, $value);
	}

	function flatten_array($arrayToFlatten) {
		$flatArray = array();
		foreach($arrayToFlatten as $element) {
			if (is_array($element)) {
				$flatArray = array_merge($flatArray, $element);
			} else {
				$flatArray[] = $element;
			}
		}
		return $flatArray;
	}

	function mysql_date($date='00/00/0000')
	{
			$dates = array_reverse(explode("/", $date));
			$result = implode('-', $dates);
			return $result;
	}	

	function convert_rp($param)
	{
			$jadi = "Rp. " . number_format($param,2,',','.');
			return $jadi;        
	}	
	
}

?>