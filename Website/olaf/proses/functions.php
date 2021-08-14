<?php
	function get_title($_title){
		return('<title>' . $_title. '</title>');
	}

	function open_page($_title){
		echo('<html><head>' . get_title($_title) . '</head><body>');
	}

	function close_page(){
		echo('</body></html>');
	}

	function get_session($_key){
		$value = (isset($_SESSION[$_key]))? $_SESSION[$_key]: null;
		return($value);
	}

	function set_session($_key, $_value){
		$_SESSION[$_key] = $_value;
	}

	function destroy_session($_key){
		unset($_SESSION[$_key]);
	}

	function redirect($_location){
		header("Refresh:0; url=" . $_location);
	}

	function connect_database(){
		$conn = new mysqli ('127.0.0.1' , 'root' , '', 'e_ktp_scanner');
		return $conn;
	}
	
	function limit_words($string, $word_limit){
	    $words = explode(" ",$string);
	    return implode(" ",array_splice($words,0,$word_limit));
	}

	

?>