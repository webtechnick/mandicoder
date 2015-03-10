<?php
/**
* Mandi Decoder will encode and decode messages from my Mandi.
* This is a silly class to help me write her love letters back.
* @version 1.0
* @author Nick Baker
*/
class Mandicoder extends Object {
	/**
	* Encoded string default
	* @type string
	*/
	public $encoded = "TMZI

NWGY BHS NMWKB YGYSTB OS YSB.
M HJAS ITGOT BHJB FGQ JWS BHS GTS NGW YS.
M NMTJEEF NGQTC YF KGQEYJBS!
M HJAS OMKHSC NGW FGQ YF STBMWS EMNS.
BHJTI FGQ NGW YJIMTU YF EMNS ZGYDESBS!

FGQWK SBSWTJEEF,
YJTCM";

	/**
	* Decoded string
	* @type string
	*/
	public $decoded = '';

	/**
	* Key converting code to actual letters
	* @type array
	*/
	public $key = array(
		'A' => 'V',
		'B' => 'T',
		'C' => 'D',
		'D' => 'P',
		'E' => 'L',
		'F' => 'Y',
		'G' => 'O',
		'H' => 'H',
		'I' => 'K',
		'J' => 'A',
		'K' => 'S',
		'L' => 'Q', //Q not used, assumed
		'M' => 'I',
		'N' => 'F',
		'O' => 'W',
		'P' => 'J', //J not used, assumed
		'Q' => 'U',
		'R' => 'B', //B not used, assumed
		'S' => 'E',
		'T' => 'N',
		'U' => 'G',
		'V' => 'X', //X not used, assumed
		'W' => 'R',
		'X' => 'Z', //Z not used, assumed
		'Y' => 'M',
		'Z' => 'C',
	);

	/**
	* Take in custom string to decode
	* Defaults to string in class
	* @param string encoded (optional)
	* @return void
	*/
	public function __construct($string = null) {
		if ($string) {
			$this->setEncodedString($string);
		}
	}

	/**
	* Decode the string, given or passed into constructor
	* @param string encoded (optional)
	* @return string decoded
	*/
	public function decode($string = null) {
		if ($string !== null) {
			$this->setEncodedString($string);
		}
		for ($i = 0; $i < strlen($this->encoded); $i++) {
			$code_char = $this->encoded[$i];
			if (!empty($this->key[$code_char])) {
				$this->decoded .= $this->key[$code_char];
			} else {
				$this->decoded .= $code_char;
			}
		}

		return $this->decoded;
	}

	/**
	* Set the encoded string.
	* @param string code (required)
	* @return boolean success
	*/
	protected function setEncodedString($string = null) {
		if ($string !== null) {
			$this->encoded = strtoupper($string);
		}
		return !!$this->encoded;
	}

	/**
	* Set the decoded string.
	* @param string plain text (required)
	* @return boolean success
	*/
	protected function setDecodedString($string = null) {
		if ($string !== null) {
			$this->decoded = strtoupper($string);
		}
		return !!$this->decoded;
	}

	/**
	* Reset the class to default.
	* @return void;
	*/
	public function reset() {
		$this->decoded = '';
		$this->encoded = '';
	}

	/**
	* Encodes a string using the key defined in class
	* @param string plain (required)
	* @return string encoded
	*/
	public function encode($string = null) {
		if ($string === null) {
			return null;
		}

		$this->reset();
		$this->setDecodedString($string);
		for ($i = 0; $i < strlen($this->decoded); $i++) {
			$actual_char = $this->decoded[$i];
			$code_char = array_search($actual_char, $this->key);
			if ($code_char !== false) {
				$this->encoded .= $code_char;
			} else {
				$this->encoded .= $actual_char;
			}
		}

		return $this->encoded;
	}
}