<?php $data = json_decode($data, True); ?>

<script type="text/javascript">
    var attr = '<?=$data['attr']?>';
    $(document).ready(function() {

        $('#' + attr).addClass('active');
    });
</script>

<h1>विशेषणम्</h1>
<div class="container-fluid">
    <div class="list-unstyled list-inline attr-list">
        <a id="devata" href="devata">देवता</a>
        <a id="chandas" href="chandas">छन्दः</a>
        <a id="rishi" href="rishi">ऋषिः</a>
    </div>
    <div class="row column-5 columnar-list">
<?php

foreach ($data['list'] as $row) {

    echo '<div><a target="_blank" href="' . BASE_URL . 'describe/attr/' . $data['attr'] . '/' . $row{$data['attr']} . '">' . $row{$data['attr']} . '</a></div>' . "\n";
}

?>
    </div>
</div>