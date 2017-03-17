<?php

class searchModel extends Model {

	public function __construct() {

		parent::__construct();
	}
	

	public function formGeneralQuery($data, $table) {

		$dbh = $this->db->connect(DB_NAME);
		
		if(is_null($dbh))return null;
		$text = $data['text'];
		$sth = $dbh->prepare('SELECT distinct btitle, cname, book_id FROM ' . PURANA_TABLE . ' WHERE btitle REGEXP :text ORDER BY book_id');
		$sth->bindParam(':text', $text);
		$sth->execute();
		$list1 = array();
		while($result = $sth->fetch(PDO::FETCH_ASSOC)) {

			array_push($list1, $data);
			array_push($list1, $result);
			
		}
		$sth1 = $dbh->prepare('SELECT book_id, title, start_pages, cname FROM ' . PURANA_TABLE . ' WHERE title REGEXP :text ORDER BY book_id');
		$sth1->bindParam(':text', $text);
		$sth1->execute();
		while($result1 = $sth1->fetch(PDO::FETCH_ASSOC)) {
			
			array_push($list1, $data);

			array_push($list1, $result1);
		}
		$dbh = null;
		return json_encode($list1, JSON_UNESCAPED_UNICODE);
	}
}

?>
