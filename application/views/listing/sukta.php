<?php $data = json_decode($data, True);?>
<h2 class="lead">
    ಸೂಕ್ತ <span class="prev-address">ಮಂಡಲ <?=$data['mandala']?></span>
</h2>
<ul class="list-inline">
<?php
foreach ($data['list'] as $row) {

    echo '<li class="sukta"><a data-mandala="' . $data['mandala'] . '" data-sukta="' . $row['sukta'] . '" href="' . $row['sukta'] . '">' . $row['sukta'] . '</a></li>' . "\n";
}
?>
</ul>
