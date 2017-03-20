<?php $data = json_decode($data, True)?>
<h2 class="lead">
   Rukku <span class="prev-address">ಮಂಡಲ <?=$data['mandala']?>, ಸೂಕ್ತ <?=$data['sukta']?></span>
</h2>
<ol>
<?php
foreach ($data['list'] as $row) {

    echo '<li>' . $row['text1'] . '</li>' . "\n";
}
?>
</ol>
