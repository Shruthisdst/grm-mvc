<?php

class View {

	public $bhashyaCode = array("BS"=>"BS","Kathaka"=>"Ka","Mundaka"=>"MD","Taitiriya"=>"T","Aitareya"=>"AI","Brha"=>"BR","Chandogya"=>"Ch","Kena_pada"=>"KP","Kena_vakya"=>"KV","Prashna"=>"PR","Mandukya"=>"MK","Gita"=>"BG","svt"=>"SV","kst"=>"KT","Isha"=>"IS","jbl"=>"JB");
	public $bhashyaName = array("BS"=>"ब्रह्मसूत्रभाष्यम्","Ka"=>"काठकोपनिषद्भाष्यम्","MD"=>"मुण्डकोपनिषद्भाष्यम्","T"=>"तैत्तिरीयोपनिषद्भाष्यम्","AI"=>"ऐतरेयोपनिषद्भाष्यम्","BR"=>"बृहदारण्यकोपनिषद्भाष्यम्","Ch"=>"छान्दोग्योपनिषद्भाष्यम्","KP"=>"केनोपनिषत् पदभाष्य​म्","KV"=>"केनोपनिषत् वाक्य​भाष्य​म्","PR"=>"प्रश्नोपनिषद्भाष्यम्","MK"=>"माण्डूक्योपनिषद्भाष्यम्","BG"=>"श्रीमद्भगवद्गीताभाष्यम्","SV"=>"श्वेताश्वतरोपनिषत्","KT"=>"कौषीतकिब्राह्मणोपनिषत्","IS"=>"ईशावास्योपनिषद्भाष्यम्","JB"=>"जाबालोपनिषत्");
	public $verseType = array("BS"=>"सूत्र","Ka"=>"मन्त्र","MD"=>"मन्त्र","T"=>"मन्त्र","AI"=>"मन्त्र","BR"=>"मन्त्र","Ch"=>"मन्त्र","KP"=>"मन्त्र","KV"=>"मन्त्र","PR"=>"मन्त्र","MK"=>"मन्त्र","BG"=>"श्लोक","SV"=>"मन्त्र","KT"=>"मन्त्र","IS"=>"मन्त्र","JB"=>"मन्त्र");
	public $vyakhyaName = array("RP" => "रत्नप्रभाव्याख्या","PP" => "पञ्चपादिका", "AG" => "आनन्दगिरिटीका", "TV" => "वार्तिकम्", "VK" => "वक्तव्यकाशिका");

    public $monthNames = array("00" => "","01" => "January","02" => "February","03" => "March","04" => "April","05" => "May","06" => "June","07" => "July","08" => "August","09" => "September","10" => "October","11" => "November","12" => "December");
    public $monthNamesShort = array("00" => "","01" => "Jan","02" => "Feb","03" => "Mar","04" => "Apr","05" => "May","06" => "Jun","07" => "Jul","08" => "Aug","09" => "Sep","10" => "Oct","11" => "Nov","12" => "Dec");
 
	public function __construct() {

	}
	
	public function getActualPath($path = '', $folderList = array()) {

		$pathRegex = str_replace('/', '\/[0-9]+\-*', $path) . '$';
		$pathMatched = array_values(preg_grep("/$pathRegex/", $folderList));
		
		if(isset($pathMatched[0])) {

			return str_replace(PHY_FLAT_URL, 'flat/', $pathMatched[0]);
		}
		else{

			// Second pass to check whether the path is pointing to a file other than index in a given folder
			$pathArray = preg_match('/(.*)\/(.*)/', $path, $matches);
			$secondTry = $matches[1];
			$suffix = $matches[2];

			$pathRegex = str_replace('/', '\/[0-9]+\-*', $secondTry) . '$';
			$pathMatched = array_values(preg_grep("/$pathRegex/", $folderList));

			return (isset($pathMatched[0])) ? str_replace(PHY_FLAT_URL, 'flat/', $pathMatched[0]) . '/' . $suffix : '';
		}
	}

	public function getNavigation($path = '') {

		// Include only folders beginning with a number
		$dirs = glob($path . '[0-9]*', GLOB_ONLYDIR);
		natsort($dirs);
		
		if(!(empty($dirs))) {
			
			foreach ($dirs as $key => $value) {

				$subNav = $this->getNavigation($value . '/');
				if($subNav) {

					$dirs{$key} = array($value);
					array_push($dirs{$key}, $subNav);
				}
			}
			return $dirs;
		}
	}

	public function getFolderList($navigation = array()) {

		$folderList = array();
		$iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($navigation));
		foreach($iterator as $value) {
  			array_push($folderList, $value);
		}
		return $folderList;
	}

	public function showDynamicPage($data = array(), $path = '', $actualPath = '', $navigation = array()) {

		require_once 'application/views/viewHelper.php';
		$viewHelper = new viewHelper();
		$pageTitle = $this->getPageTitle($viewHelper, $path);

		require_once 'application/views/header.php';
		require_once 'application/views/dynamicPageContainer.php';
		require_once 'application/views/footer.php';
	}

	public function showFlatPage($data = array(), $path = '', $actualPath = '', $navigation = array(), $current = array()) {

		require_once 'application/views/viewHelper.php';
		$viewHelper = new viewHelper();
		$pageTitle = $this->getPageTitle($viewHelper, $path);

		require_once 'application/views/header.php';
		require_once 'application/views/flatPageContainer.php';
		require_once 'application/views/footer.php';
    }

    public function printComponent($data = array(), $path = '') {

		require_once 'application/views/viewHelper.php';
		$viewHelper = new viewHelper();

		if(file_exists('application/views/' . $path . '.php')) {
		    require_once 'application/views/' . $path . '.php';
		}
		return Null;
    }

    public function printNavigation($navigation = array(), $ulClass = ' class="nav navbar-nav"', $liClass = ' class="dropdown"') {

        echo '<ul' . $ulClass . '>' . "\n";
        foreach ($navigation as $mainNav) {
 			
 			// Trailing '/' is appended to href links, as GLOB_MARK is not added in getNavigation method
                

            if(is_array($mainNav)){

                echo "\t" . '<li' . $liClass . '>' . "\n";
                echo "\t\t" . '<a href="' . $this->getNavLink($mainNav[0]) . '/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">' . $this->processNavPath($mainNav[0]) . ' <span class="caret"></span></a>' . "\n";
                $this->printNavigation($mainNav[1], ' class="dropdown-menu" role="menu"', ' class="dropdown"');
                echo "\t" . '</li>' . "\n";
            }
            else{
            	
            	$anchorText = $this->processNavPath($mainNav);
                if($anchorText) {
                	
                	$isExternal = $this->checkIfExternal($mainNav);
                	$targetBlank = ($isExternal['type'] == 'OutsideDomain') ? 'target="_blank" ' : '';
                	$navLink = $this->getNavLink($mainNav) . '/';

                	if($isExternal){
                		
                		$navLink = $isExternal['URL'];
                		if($isExternal['type'] == 'InsideDomain') $navLink = BASE_URL . $navLink;
                	}
                	echo "\t" . '<li><a ' . $targetBlank . 'href="' . $navLink . '">' . $anchorText . '</a></li>' . "\n";
                }
                else{

                	echo "\t" . '<li role="separator" class="divider"></li>' . "\n";
                }
            }
        }
        echo '</ul>' . "\n";
    }

    private function checkIfExternal($path) {

    	$linkPath = $path . '/link.php';
    	if(file_exists($linkPath)) {

    		$handle = fopen($linkPath, 'r');
 	    	$externalURL['URL'] = fgets($handle);
 	    	$externalURL['type'] = (preg_match('/^http|www/', $externalURL['URL'])) ? 'OutsideDomain' : 'InsideDomain';
 	    	return $externalURL;
    	}
    	return False;
    }

	private function printBreadcrumb($path) {

    	$path = preg_replace('/flat/', 'Home', $path);
    	$path = preg_replace('/\_/', ' ', $path);
    	$pathItems = explode('/', $path);

    	echo '<ol class="breadcrumb">';
        foreach ($pathItems as $item) {

        	echo '<li>' . $item . '</li>';
        }
        echo '</ol>';

    }

    private function processNavPath($path) {

        $path = preg_replace('/\/[0-9]+\-/', '/', $path);
        $path = explode('/', $path);
        $path = htmlentities(str_replace('_', ' ', $path[count($path) - 1]), ENT_COMPAT, "UTF-8");
    	// Letters which are to be forced to lower-case need to handled below
    	return preg_replace('/IASc/', 'IAS<span class="lower-case">c</span>', $path);
    }

    private function getNavLink($path) {

        $path = preg_replace('/\/[0-9]+\-/', '/', $path);
        return htmlentities(str_replace(PHY_FLAT_URL, BASE_URL, $path), ENT_COMPAT, "UTF-8");
    }
	
	private function getPageTitle($viewHelper, $path) {

		if(preg_match('/flat/', $path)){

			// Remove trailing slashes
			$path = preg_replace('/\/$/', '', $path);
			$paths = explode('/', $path);
			// Remove 'flat' from the URL
			unset($paths[0]);
			$paths = array_reverse($paths);
			$paths = array_unique($paths);
			$pageTitle = implode(' | ', $paths);
			return preg_replace('/_/', ' ', $pageTitle);
		}
		else{

			return '';
		}
    }
}

?>