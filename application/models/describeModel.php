<?php

class describeModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getRikDetailsByID($id) {

		if(!($id)) return null;

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . BASEDATA_TABLE . ' WHERE id = :id');
		$sth->bindParam(':id', $this->processRikID($id));
		
		$sth->execute();

		$result = $sth->fetch(PDO::FETCH_OBJ);
		$dbh = null;
		return $result;
	}

	public function getRikDetailsByQuadruplet($quadruplet) {

		if(!($quadruplet)) return null;

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$pieces = explode('.', $quadruplet);

		$sth = $dbh->prepare('SELECT * FROM ' . BASEDATA_TABLE . ' WHERE ashtaka = :ashtaka and adhyaya = :adhyaya and varga = :varga and rik = :rik');
		$sth->bindParam(':ashtaka', $pieces[0]);
		$sth->bindParam(':adhyaya', $pieces[1]);
		$sth->bindParam(':varga', $pieces[2]);
		$sth->bindParam(':rik', $pieces[3]);
		
		$sth->execute();

		$result = $sth->fetch(PDO::FETCH_OBJ);
		$dbh = null;
		return $result;
	}

	public function getWordFromConcordance($word = '') {

		if (!($word)) return null;

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . CONCORDANCE_TABLE . ' WHERE pada = :pada');
		$sth->bindParam(':pada', $word);
		$sth->execute();

		$data = $sth->fetch(PDO::FETCH_ASSOC);

		$dbh = null;

		return $data;
	}
	
	public function listAudio() {

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;

		$sth = $dbh->prepare('SELECT DISTINCT mandala,sukta FROM ' . BASEDATA_TABLE);
		$sth->execute();
		
		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			$rikData = array();
		
			$sth1 = $dbh->prepare('SELECT samhita FROM ' . BASEDATA_TABLE . ' WHERE mandala = :mandala and sukta = :sukta');
			$sth1->bindParam(':mandala', $result->mandala);
			$sth1->bindParam(':sukta', $result->sukta);
			$sth1->execute();
	
			while($result1 = $sth1->fetch(PDO::FETCH_OBJ)) {

				if(!(isset($data{$result->mandala}{$result->sukta}))) $data{$result->mandala}{$result->sukta} = 0;
	
				$samhita = explode(';', $result1->samhita);
				$data{$result->mandala}{$result->sukta} += sizeof($samhita);
				$rikData[] = sizeof($samhita);
			}

			$sth2 = $dbh->prepare('SELECT COUNT(rik) FROM ' . BASEDATA_TABLE . ' WHERE mandala = :mandala and sukta = :sukta');
			$sth2->bindParam(':mandala', $result->mandala);
			$sth2->bindParam(':sukta', $result->sukta);
			$sth2->execute();

			$result2 = $sth2->fetch(PDO::FETCH_ASSOC);

			$cueCount = $this->getCueCount($result->mandala, $result->sukta);

			if($cueCount != $data{$result->mandala}{$result->sukta}) {

				$fileName = '/var/www/html/rigveda/src/cue/' . sprintf("%03d", $result->mandala) . '/' . sprintf("%03d", $result->sukta) . '/split_new.cue';

				if(!(file_exists($fileName)))
				echo $result->mandala . ", " . $result->sukta . " --> " . $result2['COUNT(rik)'] . " --> " . $data{$result->mandala}{$result->sukta} . " --> " . $cueCount . " --> " . ($cueCount - $data{$result->mandala}{$result->sukta}) . "<br />\n";
			}
			else {
				
				$this->processCueFile($result->mandala, $result->sukta, $rikData);
			}
		}

		$dbh = null;
		return $data;
	}

	public function getCueCount($mandala, $sukta) {

		$fileName = '/var/www/html/rigveda/src/cue/' . sprintf("%03d", $mandala) . '/' . sprintf("%03d", $sukta) . '/split.cue';
		$data = file_get_contents($fileName);
		
		$data = str_replace("\n", ' ', $data);
		$data = substr_count($data, ' TRACK ');
		// $data = preg_replace("/.* TRACK (\d+) .*/", "$1", $data);		

		return intval($data);
	}
	
	public function processCueFile($mandala, $sukta, $rikData) {

		$fileName = '/var/www/html/rigveda/src/cue/' . sprintf("%03d", $mandala) . '/' . sprintf("%03d", $sukta) . '/split.cue';
		$outFileName = str_replace('.cue', '_new.cue', $fileName);

		$data = file_get_contents($fileName);

		$data = str_replace("\n", ' ', $data);
		$data = preg_split("/\s/", $data);

		$data = array_values(array_filter($data, create_function('$a','return preg_match("/\d\d:\d\d:\d\d/", $a);')));

		$putString = '';
		$putString .= "FILE \"index.mp3\" MP3\n";
		for($i=0;$i<sizeof($rikData);$i++) {

			$index = array_sum(array_slice($rikData, 0, $i));
			$putString .= "  TRACK " . sprintf("%02d", ($i + 1)) . " AUDIO\n";
			$putString .= "    INDEX 01 " . $data[$index] . "\n";
		}

		file_put_contents($outFileName, $putString);
	}
}

?>
