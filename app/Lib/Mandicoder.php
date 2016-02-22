<?php
/**
* Mandi Decoder will encode and decode messages from my Mandi.
* This is a silly class to help me write her love letters back.
* @version 2.0
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
	* Different engines
	* type string
	*/
	public $currentEngine = 'original';

	/**
	* Key converting code to actual letters
	* @type array
	*/
	public $key = array(
		'original' => array(
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
		),
		'valentines_code' => array(
			'A' => 'W',
			'B' => 'M',
			'C' => 'S',
			'D' => 'E',
			'E' => 'A',
			'F' => 'Y',
			'G' => 'G',
			'H' => 'K',
			'I' => 'U',
			'J' => 'G',
			'K' => 'T',
			'L' => 'B', //Q not used, assumed
			'M' => 'M',
			'N' => 'X',
			'O' => 'I',
			'P' => 'V', //J not used, assumed
			'Q' => 'O',
			'R' => 'R', //B not used, assumed
			'S' => 'L',
			'T' => 'D',
			'U' => 'P',
			'V' => 'C', //X not used, assumed
			'W' => 'R',
			'X' => 'N', //Z not used, assumed
			'Y' => 'H',
			'Z' => 'F',
		),
		'double_code' => array(
			'A' => 'R',
			'B' => 'Q', //Q not used, assumed
			'C' => 'W',
			'D' => 'B',
			'E' => 'H',
			'F' => 'S',
			'G' => 'T',
			'H' => 'M',
			'I' => 'I',
			'J' => 'N',
			'K' => 'K',
			'L' => 'C',
			'M' => 'O',
			'N' => 'G',
			'O' => 'Y',
			'P' => 'E',
			'Q' => 'L',
			'R' => 'U',
			'S' => 'F',
			'T' => 'Z',
			'U' => 'V',
			'V' => 'A',
			'W' => 'P',
			'X' => 'J', //J not used, assumed
			'Y' => 'D',
			'Z' => 'X',
		),
		'date_shift' => array(
			'key' => '021415'
		),
		'nick_cipher' => array(
			'key' => '31415926535897932384626433832795028841971693993751058209749445923078164062862089986280348253421170679'
		),
		'algorithms_eyeglass_push' => array(
			'key' => 'ALGORITHMSANDMATHSTUFF'
		),
	);

	public $alphabet = array(
		'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
	);

	/**
	* Take in custom string to decode
	* Defaults to string in class
	* @param string encoded (optional)
	* @return void
	*/
	public function __construct($string = null, $engine = null) {
		if ($string) {
			$this->setEncodedString($string);
		}
		if ($engine) {
			$this->setEngine($engine);
		}
	}

	/**
	* Decode the string, given or passed into constructor
	* @param string encoded (optional)
	* @param array options
	*  - reverse (default false)
	*  - engine (default original)
	* @return string decoded
	*/
	public function decode($string = null, $options = array()) {
		$options = array_merge(array(
			'reverse' => false,
			'engine' => 'original'
		), (array) $options);

		if ($string !== null) {
			$this->setEncodedString($string);
		}
		if (!$this->setEngine($options['engine'])) {
			return false;
		}

		//Decode using the engine
		call_user_func(array($this, 'engine_' . $this->currentEngine));
		//$this->{$this->currentEngine}();

		return $this->parseResults($options['reverse']);
	}

	/**
	* Encodes a string using the key defined in class
	* @param string plain (required)
	* @param array options
	*  - reverse (default false)
	*  - engine (default original)
	* @return string encoded
	*/
	public function encode($string = null, $options = array()) {
		$options = array_merge(array(
			'reverse' => false,
			'engine' => 'original'
		), (array) $options);

		if ($string === null) {
			return null;
		}

		$this->reset();
		$this->setDecodedString($string);
		$this->setEngine($options['engine']);

		//Enode using the engine
		call_user_func(array($this, 'engine_' . $this->currentEngine), false);
		//$this->engine_{$this->currentEngine}(false);

		return $this->parseResults($options['reverse'], true);
	}

	/**
	* Sets the current engine
	* @param string engine key
	* @return boolean success
	*/
	public function setEngine($engine = 'original') {
		if (empty($this->key[$engine]))	{
			return false;
		}
		$this->currentEngine = $engine;
		return true;
	}

	/**
	* Return associative array of engines for options
	* @return array of engines.
	*/
	public function getEngines() {
		App::uses('Inflector','Utility');
		$retval = array();
		foreach ($this->key as $engine => $ignore) {
			$retval[$engine] = Inflector::humanize($engine);
		}
		return $retval;
	}

	/**
	* Reset the class to default.
	* @return void;
	*/
	public function reset() {
		$this->decoded = '';
		$this->encoded = '';
		$this->currentEngine = 'original';
	}

	/**
	* Parse the results of encoding or decoding.
	* @param boolean reverse
	* @param boolean encoded
	* @return string results
	*/
	protected function parseResults($reverse = false, $encoded = false) {
		//Encoded
		if ($encoded) {
			if ($reverse) {
				$this->encoded = strrev($this->encoded);
			}
			return $this->encoded;
		}
		//Decoded
		if ($reverse) {
			$this->decoded = strrev($this->decoded);
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
	* Return the actual character from coded character
	* @param string of coded character
	* @return string of actual character or coded character if no match.
	*/
	private function getActual($code_char = null) {
		if (!empty($this->key[$this->currentEngine][$code_char])) {
			return $this->key[$this->currentEngine][$code_char];
		}
		return $code_char;
	}

	/**
	* Return the code character from current engine
	* @param string of actual character
	* @param string of coded character or the actual character if no match.
	*/
	private function getCode($actual_char) {
		$code_char = array_search($actual_char, $this->key[$this->currentEngine]);
		if ($code_char !== false) {
			return $code_char;
		}
		return $actual_char;
	}



	private function engine_algorithms_eyeglass_push($decode = true) {
		$key = $this->key[$this->currentEngine]['key'];

		//Decode
		if ($decode) {
			$key_index = 0;
			for ($i = 0; $i < strlen($this->encoded); $i++) {
				$code_char = $this->encoded[$i];
				if (in_array($code_char, $this->alphabet)) {
					if ($key_index == strlen($key)) {
						$key_index = 0;
					}
					$key_char = $key[$key_index];
					$shift = array_search($key_char, $this->alphabet);
					//Get the shift from the alphabet

					//get the key of the code
					$code_key = array_search($code_char, $this->alphabet);
					$actual_key = $code_key - $shift;
					if ($actual_key < 0) {
						$actual_key = 25 - abs($actual_key); //wrap around
					}
					$this->decoded .= $this->alphabet[$actual_key];
					$key_index++;
				} else {
					$this->decoded .= $code_char;
				}
			}
			return;
		}

		//Encode
		$key_index = 0;
		for ($i = 0; $i < strlen($this->decoded); $i++) {
			$actual_char = $this->decoded[$i];
			if (in_array($actual_char, $this->alphabet)) {
				if ($key_index == strlen($key)) {
					$key_index = 0;
				}
				$key_char = $key[$key_index];
				$shift = array_search($key_char, $this->alphabet);
				//get the key of the code
				$actual_key = array_search($actual_char, $this->alphabet);
				$code_key = $actual_key + $shift;
				if ($code_key > 25) {
					$code_key = $code_key - 25; //wrap around
				}
				$this->encoded .= $this->alphabet[$code_key];
				$key_index++;
			} else {
				$this->encoded .= $actual_char;
			}
		}

	}

	/**
	* Encode each word using shifting with pi
	* Use the length of the word coresponding to pi and shift each letter according to it
	* @param boolena decode (default true)
	* @return void
	*/
	private function engine_nick_cipher($decode = true) {
		if ($decode) {
			$this->encoded = str_replace("\n", "\n ", $this->encoded);
			$encoded_words = explode(' ', $this->encoded);
			foreach ($encoded_words as $encoded_word) {
				$length = strlen($encoded_word);
				$key = $this->key[$this->currentEngine]['key'];
				$word = ""; //empty string to start
				for ($i = 0; $i < strlen($encoded_word); $i++) {
					$code_char = $encoded_word[$i];
					$shift = $key[$i];
					if (in_array($code_char, $this->alphabet)) {
						$code_key = array_search($code_char, $this->alphabet);
						$actual_key = $code_key - $shift;
						if ($actual_key < 0) {
							$actual_key = 25 - abs($actual_key); //wrap around
						}
						$word .= $this->alphabet[$actual_key];
					} else {
						$word .= $code_char;
					}
				}
				$words[] = $word;
			}
			$this->decoded = implode(' ', $words);
			return;
		}

		//Encode
		$this->decoded = str_replace("\n", "\n ", $this->decoded);
		$words = explode(' ', $this->decoded);
		$encoded_words = array();
		foreach ($words as $word) {
			$length = strlen($word);
			$key = $this->key[$this->currentEngine]['key'];
			$encoded_word = ""; //empty string to start
			for ($i = 0; $i < strlen($word); $i++) {
				$actual_char = $word[$i];
				$shift = $key[$i];
				if (in_array($actual_char, $this->alphabet)) {
					//Get the code of the actual code
					$actual_key = array_search($actual_char, $this->alphabet);
					$code_key = $actual_key + $shift;
					if ($code_key > 25) {
						$code_key = $code_key - 25; //wrap around
					}
					$encoded_word .= $this->alphabet[$code_key];
				} else {
					$encoded_word .= $actual_char;
				}
			}
			$encoded_words[] = $encoded_word;
		}
		$this->encoded = implode(' ', $encoded_words);
	}

	/**
	* Dateshift Engine
	* Takes the entire encoded, maps it to
	* a date of 021415 repeating across.
	* @param boolean decode true
	*/
	private function engine_date_shift($decode = true) {
		$key = $this->key[$this->currentEngine]['key'];

		//Decode
		if ($decode) {
			$key_index = 0;
			for ($i = 0; $i < strlen($this->encoded); $i++) {
				$code_char = $this->encoded[$i];
				if (in_array($code_char, $this->alphabet)) {
					if ($key_index == strlen($key)) {
						$key_index = 0;
					}
					$shift = $key[$key_index];
					//get the key of the code
					$code_key = array_search($code_char, $this->alphabet);
					$actual_key = $code_key - $shift;
					if ($actual_key < 0) {
						$actual_key = 25 - abs($actual_key); //wrap around
					}
					$this->decoded .= $this->alphabet[$actual_key];
					$key_index++;
				} else {
					$this->decoded .= $code_char;
				}
			}
			return;
		}

		//Encode
		$key_index = 0;
		for ($i = 0; $i < strlen($this->decoded); $i++) {
			$actual_char = $this->decoded[$i];
			if (in_array($actual_char, $this->alphabet)) {
				if ($key_index == strlen($key)) {
					$key_index = 0;
				}
				$shift = $key[$key_index];
				//get the key of the code
				$actual_key = array_search($actual_char, $this->alphabet);
				$code_key = $actual_key + $shift;
				if ($code_key > 25) {
					$code_key = $code_key - 25; //wrap around
				}
				$this->encoded .= $this->alphabet[$code_key];
				$key_index++;
			} else {
				$this->encoded .= $actual_char;
			}
		}
	}

	private function engine_valentines_code($decode = true) {
		//Decode
		if ($decode) {
			for ($i = 0; $i < strlen($this->encoded); $i++) {
				$code_char = $this->encoded[$i];
				$this->decoded .= $this->getActual($code_char);
			}
			return;
		}

		//Encode
		for ($i = 0; $i < strlen($this->decoded); $i++) {
			$actual_char = $this->decoded[$i];
			$this->encoded .= $this->getCode($actual_char);
		}
		return;
	}

	/**
	* Original Engine
	* @param boolean decode true
	*/
	private function engine_original($decode = true) {
		//Decode
		if ($decode) {
			for ($i = 0; $i < strlen($this->encoded); $i++) {
				$code_char = $this->encoded[$i];
				$this->decoded .= $this->getActual($code_char);
			}
			return;
		}

		//Encode
		for ($i = 0; $i < strlen($this->decoded); $i++) {
			$actual_char = $this->decoded[$i];
			$this->encoded .= $this->getCode($actual_char);
		}
		return;
	}

	/**
	* Doublecode Engine
	* @param boolean decode true
	*/
	private function engine_double_code($decode = true) {
		//Decode
		if ($decode) {
			for ($i = 0; $i < strlen($this->encoded); $i++) {
				$code_char = $this->encoded[$i];
				$this->decoded .= $this->getActual($code_char);
			}
			return;
		}

		//Encode
		for ($i = 0; $i < strlen($this->decoded); $i++) {
			$actual_char = $this->decoded[$i];
			$this->encoded .= $this->getCode($actual_char);
		}
		return;
	}
}