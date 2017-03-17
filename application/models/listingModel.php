<?php

class listingModel extends Model {

	public function __construct() {

		parent::__construct();
	}

	
	public function listPurana($ctitle){

		$dbh = $this->db->connect(DB_NAME);
		
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT DISTINCT book_id, btitle, cname FROM ' . PURANA_TABLE . ' WHERE ctitle = :ctitle');
		$sth->bindParam(':ctitle', $ctitle);
		$sth->execute();

		$data = array();
		while($result = $sth->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $result);
		}

		$dbh = null;
		return json_encode($data, JSON_UNESCAPED_UNICODE);
	}
	
	public function listToc($bookID){

		$dbh = $this->db->connect(DB_NAME);
		
		if(is_null($dbh))return null;
		
		$sth = $dbh->prepare('SELECT * FROM ' . PURANA_TABLE . ' WHERE book_id = :bookID');
		$sth->bindParam(':bookID', $bookID);
		$sth->execute();

		$data = array();
		while($result = $sth->fetch(PDO::FETCH_ASSOC)) {
			array_push($data, $result);
		}

		$dbh = null;
		return json_encode($data, JSON_UNESCAPED_UNICODE);
	}
	
}

?>
