<?php $data = json_decode($data, True); ?>

<h1>ಶ್ರೀ ಜಯಚಾಮರಾಜೇಂದ್ರ ಗ್ರಂಥರತ್ನಮಾಲಾ ಸಂಗ್ರಹ</h1>
<div class="container-fluid">
    <div class="list-unstyled list-inline attr-list">
        <a id="puranagalu" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/puranagalu">ಪುರಾಣಗಳು</a>
        <a id="rigveda" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/rigveda">ಋಗ್ವೇದ ಸಂಹಿತಾ</a>
        <a id="other" class="btn btn-primary btn-lg" href="<?=BASE_URL?>ಸಂಗ್ರಹ/other">ಇತರೆ</a>
    </div>
   <div class="row">
		<h2 class="purana-title">Search results</h2>
		<div class="col-sm-1"></div>
		<div class="col-sm-11 columnar-list">
		
<?php 
echo '<ol>';
$fl=1;
$searchWord = $data[0]['text'];
foreach($data as $row)
{
	if(isset($row['btitle']))
	{
		if($fl==1)
		{
			echo '<h2>ಗ್ರಂಥಗಳ ಶೀರ್ಷಿಕೆ</h2>';
			$fl = 0;
		}
		echo '<li class="gap-below">' . $viewHelper->displayBookTitle($row['book_id'], $row['btitle'], $searchWord) . '</a></li>';
	}
	
}
echo '</ol>';

echo '<ol>';
$fl=1;

foreach($data as $row)
{
	if(isset($row['title']))
	{
		if($fl==1)
		{
			echo '<h2>ಗ್ರಂಥಗಳ ವಿಷಯಾನುಕ್ರಮಣಿಕೆ</h2>';
			$fl = 0;
		}
		echo '<li class="gap-below">' . $viewHelper->displaySearchTitle($row['book_id'], $row['title'], $row['start_pages'], $searchWord) . '</li>';
	}
}
echo '</ol>';


?>
	 </div>

    </div>
</div>
