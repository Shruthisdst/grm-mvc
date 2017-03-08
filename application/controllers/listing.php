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
}

?>
