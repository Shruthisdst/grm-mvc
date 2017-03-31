<?php $data = json_decode($data, True); ?>

<script type="text/javascript">
    var attr = '<?=$data[0]['cname']?>';
    $(document).ready(function() {

        $('#' + attr).addClass('active');
    });
</script>
<h1>ಶ್ರೀ ಜಯಚಾಮರಾಜೇಂದ್ರ ಗ್ರಂಥರತ್ನಮಾಲಾ ಸಂಗ್ರಹ</h1>
<div class="container-fluid">
     <div class="list-unstyled list-inline attr-list">
        <a id="puranagalu" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/puranagalu">ಪುರಾಣಗಳು</a>
        <a id="rigveda" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/rigveda">ಋಗ್ವೇದ ಸಂಹಿತಾ</a>
        <a id="other" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/other">ಇತರೆ</a>
    </div>
    <div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-10 column-2 columnar-list">

		<?php

		echo '<ol>';

foreach ($data as $row) {
	echo '<li><a href="' . BASE_URL . 'listing/treeview/' . $row['book_id'] . '">' . $row['btitle'] . '</a></li>';
}
echo '</ol>';
?>
	</div>
    </div>
</div>
