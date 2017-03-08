<h1><?=$viewHelper->getSanskritName($data['filterKey'])['singular'] . ' &ndash; ' . $data['filterName']?></h1>
<div class="container-fluid">
    <div class="attr-list">मण्डल <strong>.</strong> सूक्त <strong>.</strong> ऋक्</div>
    <div class="row column-10 columnar-list">
<?php

$data = json_decode($data['json'], True);

foreach ($data['list'] as $row) {

    echo '<div><a target="_blank" href="' . BASE_URL . 'describe/rikMandala/' . $row{$data['attr']} . '">' . $viewHelper->displayRikID($row{$data['attr']}) . '</a></div>' . "\n";
}

?>
    </div>
</div>
