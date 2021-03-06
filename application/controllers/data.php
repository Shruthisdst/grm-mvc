<?php

class data extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {

		$this->insert();
	}

	public function insert(){

		$this->model->db->createDB(DB_NAME, DB_SCHEMA);
		$dbh = $this->model->db->connect(DB_NAME);

		$this->model->db->dropTable(BASEDATA_TABLE, $dbh);
		$this->model->db->createTable(BASEDATA_TABLE, $dbh, BASEDATA_TABLE_SCHEMA);

		$this->model->db->dropTable(CONCORDANCE_TABLE, $dbh);
		$this->model->db->createTable(CONCORDANCE_TABLE, $dbh, CONCORDANCE_TABLE_SCHEMA);

		$jsonFiles = $this->model->getJsonFiles(rtrim(PHY_SRC_URL, "/"), []);

		foreach ($jsonFiles as $jsonFile) {
	
			$data = $this->model->getJsonData($jsonFile);
			$this->model->db->insertData(BASEDATA_TABLE, $dbh, $data);
		}

		$this->buildWordConcordance($dbh);
		
		$dbh = null;
	}

	public function buildWordConcordance($dbh) {

		$concordance = $this->model->getWordConcordance($dbh, CONCORDANCE_TABLE);
		foreach ($concordance as $row) {
		
			$this->model->db->insertData(CONCORDANCE_TABLE, $dbh, $row);
		}
	}

	// Use this method for global changes in json files
	// public function modify() {

	// 	$jsonFiles = $this->model->getJsonFiles(rtrim(PHY_SRC_URL, "/"), []);

	// 	foreach ($jsonFiles as $jsonFile) {

	// 		$contents = file_get_contents($jsonFile);
	// 		$contents = preg_replace('/("rik" : "\d+"),/', "$1", $contents);

	// 		file_put_contents($jsonFile, $contents);
	// 	}
	// }
}

?>
