<script type="text/javascript">$(document).ready(function() { embedAudio(); });</script>
<h1>अष्टकवर्गीकरण</h1>
<div class="container-fluid">
    <div class="row">
        <h2 class="lead-head blue">अष्टक <?=$viewHelper->roman2dev($data->ashtaka)?>, अध्याय <?=$viewHelper->roman2dev($data->adhyaya)?>, वर्ग <?=$viewHelper->roman2dev($data->varga)?>, ऋक् <?=$viewHelper->roman2dev($data->rik)?></h2>
        <div class="col-md-9 clear-paddings">
            <div class="describe">
                <h3 class="red">संहिता</h3>
                <p class="rik samhita">
                    <?=$viewHelper->displaySamhita($data->samhita)?>
                </p>
                <h3 class="red">पदपाठ</h3>
                <p class="rik pada-paatha">
                    <?=$viewHelper->displayPadapaatha($data->padapaatha)?>
                </p>
            </div>
        </div>
        <div class="col-md-3 clear-paddings">
            <div class="aux-information">
                <ul class="list-unstyled">
                    <li>
                        <i class="fa fa-play-circle playPause" data-id="rikAudio" id="control-rikAudio" title="Play audio"></i>
                        <audio id="rikAudio"><source src="<?=$viewHelper->getAudioSource($data->id)?>" type='audio/mp4'> Your user agent does not support the HTML5 Audio element.</audio>
                    </li>
                    <li><span class="dt">ऋग्वेद्</span>&nbsp;  <span class="dd"><?=$viewHelper->displayRikID($data->id)?></span></li>
                    <li><span class="dt">देवता</span>&nbsp; <span class="dd"><a target="_blank" href="<?=BASE_URL?>describe/attr/devata/<?=$data->devata?>"><?=$data->devata?></a></span></li>
                    <li><span class="dt">छन्दः</span>&nbsp; <span class="dd"><a target="_blank" href="<?=BASE_URL?>describe/attr/chandas/<?=$data->chandas?>"><?=$data->chandas?></a></span></li>
                    <li><span class="dt">ऋषिः</span>&nbsp; <span class="dd"><a target="_blank" href="<?=BASE_URL?>describe/attr/rishi/<?=$data->rishi?>"><?=$data->rishi?></a></span></li>
                </ul>
                <ul class="list-unstyled">
                    <li><span class="dt">मण्डल</span>&nbsp;  <span class="dd"><?=$viewHelper->roman2dev($data->mandala)?></span></li>
                    <li><span class="dt">सूक्त</span>&nbsp;  <span class="dd"><?=$viewHelper->roman2dev($data->sukta)?></span></li>
                    <li><span class="dt">अनुवाक</span>&nbsp;  <span class="dd"><?=$viewHelper->roman2dev($data->anuvaka)?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>