<?php

class search extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {
		$this->field();
	}
	
	public function field() {
		
		$data = $this->model->getGetData();
		unset($data['url']);
		if($data['collection'] == '001')
		{
			if($data)
			{
				$data = $this->model->preProcessPOST($data);
				$result = $this->model->searchResultQuery($data, PURANA_TABLE);
				//~ var_dump($result);
				($result) ? $this->view('search/result', $result) : $this->view('error/noResults', 'search/index/');
			}
		}
		else
		{
			$this->view('error/noResults', 'search/index/');
		}
	}
}

?>
