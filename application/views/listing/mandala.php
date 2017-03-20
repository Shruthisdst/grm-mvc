<script type="text/javascript">
    var BASE_URL = '<?=BASE_URL?>';
    $(document).ready(function() {

        bindMandalaStructure();
    });
</script>

<h1>ಮಂಡಲವರ್ಗೀಕರಣ</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 clear-paddings">
            <div class="structure-1">
                <h2 class="lead">ಮಂಡಲ</h2>
                <ul class="list-inline">
<?php
$data = json_decode($data, True);

foreach ($data['list'] as $row) {

    echo '<li class="mandala"><a data-mandala="' . $row['mandala'] . '" href="' . $row['mandala'] . '">' . $row['mandala'] . '</a></li>' . "\n";
}
?>
                </ul>
            </div>
            <div class="structure-2">

            </div>
        </div>
        <div class="col-md-6 clear-paddings">
            <div class="structure-3">
                
            </div>
        </div>
    </div>
</div>
