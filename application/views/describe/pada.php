<h1><?=$data['pada']?></h1>
<div class="container-fluid">
    <div class="attr-list">मण्डल <strong>.</strong> सूक्त <strong>.</strong> ऋक्</div>
    <div class="row column-10 columnar-list">
<?php

$occurrences = explode(';', $data['occurrence']);
foreach ($occurrences as $id) {

    echo '<div><a target="_blank" href="' . BASE_URL . 'describe/rikMandala/' . $id . '">' . $viewHelper->displayRikID($id) . '</a></div>' . "\n";
}

?>
    </div>
</div>
