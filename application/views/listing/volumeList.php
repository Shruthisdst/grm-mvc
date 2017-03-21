<h1>ಶ್ರೀ ಜಯಚಾಮರಾಜೇಂದ್ರ ಗ್ರಂಥರತ್ನಮಾಲಾ ಸಂಗ್ರಹ</h1>
<div class="container-fluid">
    <div class="list-unstyled list-inline attr-list">
        <a id="puranagalu" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/puranagalu">ಪುರಾಣಗಳು</a>
        <a id="rigveda" class="btn btn-primary btn-lg active" href="<?=BASE_URL?>ಸಂಗ್ರಹ/rigveda">ಋಗ್ವೇದ ಸಂಹಿತಾ</a>
        <a id="other" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/other">ಇತರೆ</a>
    </div>
    <div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-11 column-6 columnar-list">
<?php 
$data = json_decode($data, True);
echo '<ol class="unstyle">';
foreach ($data as $row) {
	echo '<li>' . $viewHelper->displayRigToc($row['book_id']) . '</li>';
}
echo '</ol>';
 ?>


	 </div>

    </div>
</div>
