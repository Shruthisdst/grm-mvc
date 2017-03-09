<h1>ಶ್ರೀ ಜಯಚಾಮರಾಜೇಂದ್ರ ಗ್ರಂಥರತ್ನಮಾಲಾ ಸಂಗ್ರಹ</h1>
<div class="container-fluid">
    <div class="list-unstyled list-inline attr-list">
        <a id="puranagalu" href="<?=BASE_URL?>ಸಂಗ್ರಹ/puranagalu">ಪುರಾಣಗಳು</a>
        <a id="rigveda" href="<?=BASE_URL?>ಸಂಗ್ರಹ/rigveda">ಋಗ್ವೇದ ಸಂಹಿತಾ</a>
        <a id="other" href="<?=BASE_URL?>ಸಂಗ್ರಹ/other">ಇತರೆ</a>
    </div>
    <div class="row columnar-list">
<?php
$stack = array();
$p_stack = array();
$first = 1;
$li_id = 0;
$ul_id = 0;
$plus_src = PUBLIC_URL . "images/plus.gif";
$link = PUBLIC_URL . "images/";
$minus_src = PUBLIC_URL . "images/bullet_1.gif";
$plus_link = "<img src=\"$plus_src\" alt=\"\" onclick=\"display_block(this)\" />";
$bullet = "<img src=\"$minus_src\" alt=\"\" />";
?>
<div class = "treeview">

<?php
	$data = json_decode($data, True);
	echo '<h2>' . $data[0]['btitle'] . '</h2>';
	foreach($data as $row) { 
	if($first)
        {
            array_push($stack,$row['level']);
            $ul_id++;
            echo "<ul id=\"ul_id$ul_id\">\n";
            array_push($p_stack,$ul_id);
            $li_id++;
            $deffer = $viewHelper->display_tabs($row['level']) . "<li id=\"li_id$li_id\">:rep:<span class=\"s1\">". $viewHelper->displayTitle($row['book_id'], $row['title'], $row['start_pages']) ."</span>";
            $first = 0;
        }
        elseif($row['level'] > $stack[sizeof($stack)-1])
        {
            $deffer = preg_replace('/:rep:/',"$plus_link",$deffer);
            echo $deffer;
            $ul_id++;
            $li_id++;
            array_push($stack,$row['level']);
            array_push($p_stack,$ul_id);
            $deffer = "\n" . $viewHelper->display_tabs(($row['level']-1)) . "<ul class=\"dnone\" id=\"ul_id$ul_id\">\n";
            $deffer = $deffer . $viewHelper->display_tabs($row['level']) ."<li id=\"li_id$li_id\">:rep:<span class=\"s2\">". $viewHelper->displayTitle($row['book_id'], $row['title'], $row['start_pages']) . "</span>";
        }
        elseif($row['level'] < $stack[sizeof($stack)-1])
        {
            $deffer = preg_replace('/:rep:/',"$bullet",$deffer);
            echo $deffer;
            for($k=sizeof($stack)-1;(($k>=0) && ($row['level'] != $stack[$k]));$k--)
            {
                echo "</li>\n". $viewHelper->display_tabs($row['level']) ."</ul>\n";
                $top = array_pop($stack);
                $top1 = array_pop($p_stack);
            }
            $li_id++;
            $deffer = $viewHelper->display_tabs($row['level']) . "</li>\n";
            $deffer = $deffer . $viewHelper->display_tabs($row['level']) ."<li id=\"li_id$li_id\">:rep:<span class=\"s1\">". $viewHelper->displayTitle($row['book_id'], $row['title'], $row['start_pages']) . "</span>";
        }
        elseif($row['level'] == $stack[sizeof($stack)-1])
        {
            $deffer = preg_replace('/:rep:/',"$bullet",$deffer);
            echo $deffer;
            $li_id++;
            $deffer = "</li>\n";
            $deffer = $deffer . $viewHelper->display_tabs($row['level']) ."<li id=\"li_id$li_id\">:rep:<span class=\"s1\">". $viewHelper->displayTitle($row['book_id'], $row['title'], $row['start_pages']) . "</span>";
        }
	}
	$deffer = preg_replace('/:rep:/',"$bullet",$deffer);
    echo $deffer;

    for($i=0;$i<sizeof($stack);$i++)
    {
        echo "</li>\n". $viewHelper->display_tabs($row['level']) ."</ul>\n";
    }
	?>
	 </div>

    </div>
</div>
