<?php

class viewHelper extends View {

    public function __construct() {


    }

    public function displayBookTitle($bcode, $btitle, $searchWord)
    {
		if(($bcode == '285') || ($bcode == '324') || ($bcode == '325'))
		{
			$btitle = preg_replace("/$searchWord/", "<span class='searchWord'>$searchWord</span>", $btitle);
			$path = '<a href="' . GRM_URL . $bcode . '/index.djvu" target="_blank">' . $btitle . '</a>';
		}
		else
		{
			$btitle = preg_replace("/$searchWord/", "<span class='searchWord'>$searchWord</span>", $btitle);
			$path = '<a href="' . BASE_URL . 'listing/treeview/' . $bcode . '">' . $btitle . '</a>';
		}
		return $path;
	}

	public function displaySearchTitle($bcode, $title, $page, $searchWord)
	{
		$title = preg_replace('/ — /',"—", $title);
		$words = preg_split('/ /', $title);
		$searchWords = preg_split('/ /', $searchWord);
		foreach($searchWords as $sWord)
		{
			$searchList = preg_grep('/' . $sWord . '/', $words);
		}
		$title = preg_replace('/' . $searchWord . '/', '<span class="searchWord">' . $searchWord . '</span>', $title);
		$key = key($searchList);
		$left = $key-10;
		$right = $key+10;
		$left = ($left < 0) ? 0 : $left;
		$right = ($right > count($words)) ? count($words) : $right;
		$right = $right-$left;
		$output = array_slice($words, $left, $right);
		$output = implode(" ", $output);
		$output = preg_replace('/' . $searchWord . '/', '<span class="searchWord">' . $searchWord . '</span>', $output);
		$djvuLink = GRM_URL . $bcode . '/index.djvu?djvuopts&amp;page='.$page.'.djvu&amp;zoom=page';
		$titlePath = '<a href="'.$djvuLink.'" target="_blank">.............. '.$output.' ...............</a>';
		return $titlePath;
	}

	public function displayTitle($bcode, $title, $page)
	{
		$title = preg_replace('/ — /',"—", $title);
		$djvuLink = GRM_URL . $bcode . '/index.djvu?djvuopts&amp;page='.$page.'.djvu&amp;zoom=page';
		$titlePath = '<a href="'.$djvuLink.'" target="_blank">'.$title.'</a>';
		return $titlePath;
	}
	
	public function displayRigToc($bookid)
	{
		$actualID = $bookid;
		$actualID = preg_replace('/001/', '288', $actualID);
		$actualID = preg_replace('/002/', '289', $actualID);
		$actualID = preg_replace('/003/', '290', $actualID);
		$actualID = preg_replace('/004/', '291', $actualID);
		$actualID = preg_replace('/005/', '292', $actualID);
		$actualID = preg_replace('/006/', '293', $actualID);
		$actualID = preg_replace('/007/', '294', $actualID);
		$actualID = preg_replace('/008/', '295', $actualID);
		$actualID = preg_replace('/009/', '296', $actualID);
		$actualID = preg_replace('/010/', '297', $actualID);
		$actualID = preg_replace('/011/', '298', $actualID);
		$actualID = preg_replace('/012/', '299', $actualID);
		$actualID = preg_replace('/013/', '300', $actualID);
		$actualID = preg_replace('/014/', '301', $actualID);
		$actualID = preg_replace('/015/', '302', $actualID);
		$actualID = preg_replace('/016/', '303', $actualID);
		$actualID = preg_replace('/017/', '304', $actualID);
		$actualID = preg_replace('/018/', '305', $actualID);
		$actualID = preg_replace('/019/', '306', $actualID);
		$actualID = preg_replace('/020/', '307', $actualID);
		$actualID = preg_replace('/021/', '308', $actualID);
		$actualID = preg_replace('/022/', '309', $actualID);
		$actualID = preg_replace('/023/', '310', $actualID);
		$actualID = preg_replace('/024/', '311', $actualID);
		$actualID = preg_replace('/025/', '312', $actualID);
		$actualID = preg_replace('/026/', '313', $actualID);
		$actualID = preg_replace('/027/', '314', $actualID);
		$actualID = preg_replace('/028/', '315', $actualID);
		$actualID = preg_replace('/029/', '316', $actualID);
		$actualID = preg_replace('/030/', '317', $actualID);
		$actualID = preg_replace('/031/', '318', $actualID);
		$actualID = preg_replace('/032/', '319', $actualID);
		$actualID = preg_replace('/033/', '320', $actualID);
		$actualID = preg_replace('/034/', '321', $actualID);
		$actualID = preg_replace('/035/', '322', $actualID);
		$actualID = preg_replace('/036/', '323', $actualID);
		
		if($bookid == '036')
		{
			$tocList = '<a href="' . GRM_URL . $actualID . '/index.djvu" target="_blank">ಸಂಪುಟ ' . intval($bookid) . '</a>';
		}
		else
		{
			$tocList = '<a href="' . BASE_URL . 'listing/treeview/' . $actualID . '">ಸಂಪುಟ ' . intval($bookid) . '</a>';
		}
		return $tocList;
	}
	
	function display_stack($stack)
	{
		for($j=0;$j<sizeof($stack);$j++)
		{
			$disp_array = $disp_array . $stack[$j] . ",";
		}
		return $disp_array;
	}

	function display_tabs($num)
	{
		$str_tabs = "";
		
		if($num != 0)
		{
			for($tab=1;$tab<=$num;$tab++)
			{
				$str_tabs = $str_tabs . "\t";
			}
		}
		
		return $str_tabs;
	}
	

}

?>
