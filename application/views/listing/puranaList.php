<h1>ಶ್ರೀ ಜಯಚಾಮರಾಜೇಂದ್ರ ಗ್ರಂಥರತ್ನಮಾಲಾ ಸಂಗ್ರಹ</h1>
<div class="container-fluid">
    <div class="list-unstyled list-inline attr-list">
        <a id="puranagalu" href="<?=BASE_URL?>ಸಂಗ್ರಹ/puranagalu">ಪುರಾಣಗಳು</a>
        <a id="rigveda" href="<?=BASE_URL?>ಸಂಗ್ರಹ/rigveda">ಋಗ್ವೇದ ಸಂಹಿತಾ</a>
        <a id="other" href="<?=BASE_URL?>ಸಂಗ್ರಹ/other">ಇತರೆ</a>
    </div>
    <div class="row column-2 columnar-list">
		
		<?php
		$data = json_decode($data, True);
		echo '<ol>';

foreach ($data as $row) {
	echo '<li class="gap-below"><a href="' . BASE_URL . 'listing/treeview/' . $row['book_id'] . '">' . $row['btitle'] . '</a></li>';
	
}
echo '</ol>';
?>
    </div>
</div>
