<?php
class XmlMgrComponent extends CApplicationComponent {
	var $DB = 'test';
	public function xmlFileToString($filePath) {
		$checkUrl = @get_headers($filePath);
		if ($checkUrl[0] != 'HTTP/1.1 404 Not Found') {
			$file_handle = fopen($filePath, "r");

			$xmlString = "";

			while (!feof($file_handle)) {
				$xmlString .= fgets($file_handle);
			}
			fclose($file_handle);
			return $xmlString;
		}else {
			return false;
		}
	}

	public function xmlToArray($name, $input, $controller , $cust_info ,$parent = null ,$callback = null, $recurse = false) {
		$data = ((!$recurse) && is_string($input)) ?
			simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA): $input;
		if ($data instanceof SimpleXMLElement) {
			$data = (array) $data;
		}
		
		if (is_array($data)) {
			$temp = $data['channel']->item;
			$temp1 = '</br>';
			$temp2 = '"';
			$temp3 = "'";
			$temp4 = '</a>';
			$temp5 = '<span>';
			$temp6 = '<br />';
			switch ($name) {
				case 'vnexpress':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $this->content($temp[$i]->description, $temp1);
						$temp[$i]->image = $this->image($temp[$i]->description, $temp2);
						
					}
					break;
				case 'dantri':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $this->content($temp[$i]->description, $temp4);
						$temp[$i]->image = $this->image($temp[$i]->description, $temp2);
						
					}
					break;
				case 'kenh14':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $this->content($temp[$i]->description, $temp5);
						$temp[$i]->image = $this->image($temp[$i]->description, $temp3);
						
					}
					break;
				case 'tinhte':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $this->content($temp[$i]->description, $temp6);
						$temp[$i]->image = $this->image($temp[$i]->description, $temp1);
						
					}
					break;
				case '24h':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $temp[$i]->description;
						$temp[$i]->image = 'http://www.24h.com.vn'.$temp[$i]->summaryImg;
						
					}
					break;
				case 'bongda':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $temp[$i]->description;
						$temp[$i]->image = 'images/logo/bongda.png';
						
					}
					break;
				case 'bongdaplus':
					for ($i=0; $i < count($temp); $i++) { 
						$temp[$i]->content = $temp[$i]->description;
						$temp[$i]->image = 'images/logo/bongdaplus.png';
						
					}
					break;
				default:
					// for ($i=0; $i < count($temp); $i++) { 
					// 	$temp[$i]->content = $this->content($temp[$i]->description, $temp1);
					// 	$temp[$i]->image = $this->image($temp[$i]->description, $temp2);
						
					// }
					break;
			}
			// for ($i=0; $i < count($temp); $i++) { 
			// 	$temp[$i]->content = $this->content($temp[$i]->description, $temp1);
			// 	$temp[$i]->image = $this->image($temp[$i]->description, $temp2);
				
			// }
			foreach ($data as &$item){
				$item = $this->xmlToArray($name, $item, $controller, $cust_info,&$data, $callback, true);
			}
		}
		return (!is_array($data) && is_callable($callback))? call_user_func($callback, $data): $data;
	}

	public function content($input, $temp){
		$input = (string)$input;
		$content = explode($temp, $input);
		
		return $content[1];
	}

	public function image($input, $temp){
		$input = (string)$input;
		$image_array = explode($temp, $input);
		foreach ($image_array as $value) {
			if(preg_match("/.jpg*/i", $value))
				$image = $value;
		}
		return $image;
	}
}
?>