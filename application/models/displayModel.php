<?php

class displayModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	public function getSamhitaDiff() {

		$dbh = $this->db->connect(DB_NAME);
		if(is_null($dbh))return null;

		$sth = $dbh->prepare('SELECT * FROM ' . BASEDATA_TABLE);
		$sth->execute();
		
		$data = array();

		while($result = $sth->fetch(PDO::FETCH_OBJ)) {

			array_push($data, $result);
		}

		$dbh = null;
		return $data;
	}
}

?>