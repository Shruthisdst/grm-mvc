<?php

class listing extends Controller {

	public function __construct() {
		
		parent::__construct();
	}


	public function purana($ctitle) {
		
		$data = $this->model->listPurana($ctitle);
		($data) ? $this->view('listing/puranaList', $data) : $this->view('error/index');
	}

	public function treeview($bookID) {
		
		$data = $this->model->listToc($bookID);
		($data) ? $this->view('listing/listToc', $data) : $this->view('error/index');
	}

	public function mandala($query = array()) {

		$data = $this->model->listDistinctAttribute('mandala');
		($data) ? $this->view('listing/mandala', $data) : $this->view('error/index');
	}
	
	public function sukta($query = array()) {

		$mandala = (isset($query['mandala'])) ? $query['mandala'] : DEFAULT_MANDALA;

		$filterJSON = '{"mandala" : "' . $mandala . '"}';
		$data = $this->model->listDistinctAttribute('sukta', $filterJSON);
		($data) ? $this->getComponent('listing/sukta', $data) : $this->view('error/index');
	}
	
	public function rikMandala($query = array()) {

		$mandala = (isset($query['mandala'])) ? $query['mandala'] : DEFAULT_MANDALA;
		$sukta = (isset($query['sukta'])) ? $query['sukta'] : DEFAULT_SUKTA;

		$filterJSON = '{"mandala" : "' . $mandala . '", "sukta" : "' . $sukta . '"}';
		$data = $this->model->listRukku('text1', $filterJSON);
		($data) ? $this->getComponent('listing/rikMandala', $data) : $this->view('error/index');
	}
}

?>
