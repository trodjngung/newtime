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

	public function xmlToArray($input, $controller , $cust_info ,$parent = null ,$callback = null, $recurse = false) {
		$data = ((!$recurse) && is_string($input)) ?
			simplexml_load_string($input, 'SimpleXMLElement', LIBXML_NOCDATA): $input;
		if ($data instanceof SimpleXMLElement) {
			$data = (array) $data;
		}
		
		if (is_array($data)) {
			foreach ($data as &$item){
				$item = $this->xmlToArray($item, $controller, $cust_info,&$data, $callback, true);
			}
		}

		return (!is_array($data) && is_callable($callback))? call_user_func($callback, $data): $data;
	}
}
?>