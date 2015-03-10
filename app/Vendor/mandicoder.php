<?php
class Mandicoder extends Object {
	public $encoded = "TMZI

NWGY BHS NMWKB YGYSTB OS YSB.
M HJAS ITGOT BHJB FGQ JWS BHS GTS NGW YS.
M NMTJEEF NGQTC YF KGQEYJBS!
M HJAS OMKHSC NGW FGQ YF STBMWS EMNS.
BHJTI FGQ NGW YJIMTU YF EMNS ZGYDESBS!

FGQWK SBSWTJEEF,
YJTCM";

	/**
	* Decoded array
	* @type array
	*/
	public $decoded = '';

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
			$this->encoded = $string;
		}
	}

	/**
	* Decode the string, given or passed into constructor
	* @param string encoded (optional)
	* @return string decoded
	*/
	public function decode($string = null) {
		if ($string !== null) {
			$this->encoded = $string;
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
	* Reset the decoded string.
	* @return void;
	*/
	public function reset() {
		$this->decoded = '';
	}

	/**
	* Encodes a string using the key provided
	* @param string plain
	* @return string encoded
	*/
	public function encode($string = null) {
		if ($string === null) {
			return null;
		}

		$this->decoded = $string;
		$this->encoded = '';
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
?>

<?php
$MandiLove = new Mandicoder();
echo $MandiLove->decode();
?>




<?php
$string = 'MANDI,

YOU ARE, WITHOUT A DOUBT, THE LOVE OF MY LIFE!
I FEEL IT IN MY BONES.
THE MORE I LEARN ABOUT YOU THE DEEPER IN LOVE I FALL.
EVERYTHING ABOUT YOU I CONNECT WITH.
I CRAVE YOU WHEN YOU ARE NOT AROUND.
YOU BRIGHTEN MY LIFE!
THANK YOU FOR LOVING ME THE WAY YOU DO.
THERE IS NO ONE ELSE ON EARTH I WANT TO SPEND THE REST OF MY LIFE WITH!

YOURS FOREVER,
NICK';

echo $MandiLove->encode($string);
?>