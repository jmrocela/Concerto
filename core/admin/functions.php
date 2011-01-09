<?php

function exportConcertoOptions($stage = 'default', $context = null){
	// Should add a hook somewhere to support custom option exports
	if (!is_array($context) && $context != null) {
		if ($exploded = @explode(',', $context)) {
			$context = array_map('trim', $exploded);
		} else {
			$val = $context;
			$context = array();
			$context[] = $val;
		}
	}

	$alloptions = wp_load_alloptions();
	$general = $design = array();

	foreach ($alloptions as $key => $value) {
		$pos = strpos($key, 'concerto_' . $stage . '_general_');
		if ($pos !== false ) {
			$general[$key] = $value;
		}
		$pos = strpos($key, 'concerto_' . $stage . '_design_');
		if ($pos !== false ) {
			$design[$key] = $value;
		}
	}
	
	$content = array();
	if ($context == null) {
		$content['general'] = $general;
		$content['design'] = $design;
		$context = array('general','design');
		$filename = '';
	} else {
		if (in_array('general', $context)) {
			$content['general'] = $general;
			$filename = '.general';
		}
		if (in_array('design', $context)) {
			$content['design'] = $design;
			$filename = '.design';
		}
		if (in_array('design', $context) && in_array('general', $context)) {
			$filename = '';
		}
	}

	$jsondcontent = json_encode($content);
	
	// We prepare the file for download
	$filename = 'concerto' . $filename . date('mdY') . '.cfwconf';
	header('Content-Type: application/force-download'); 
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header("Content-Transfer-Encoding: binary");
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
// This is an exported option file for Concerto generated on <?php echo date('r') ."\n"; ?>
// Stage: <?php echo $stage . "\n"; ?>
// Context: <?php echo implode(', ', $context) ."\n"; ?>
<?php echo $jsondcontent; ?>
<?php
	die();
}

function importConcertoOptions($file = null, $stage = 'default', $context = null) {
	if (is_readable($file)) {
		if (!is_array($context)) {
			if ($context != null) {
				if ($exploded = @explode(',', $context)) {
					$context = array_map('trim', $exploded);
				} 
			}
		}
		$content = explode("\n", file_get_contents($file), 4);
		$options = json_decode($content[3]);
		foreach ($options as $what => $hash) {
			if ($context == null || in_array($what, (array) $context)) {
				foreach ($hash as $key => $value) {
					$key = preg_replace('/concerto_(.*)_' . $what . '/', 'concerto_' . $stage . '_' . $what, $key );
					echo $key . "-" . $value . "<br/>";
					update_option($key, $value);
				}
			}
		}
	}
	die();
}

function restoreConcertoOptions($stage = 'default', $context = null) {
	include CONCERTO_LIBS . 'defaults.php';
	defaultOptions($stage, $context);
}

function createStage($name, $file = null) {
	$name = ucfirst($name);
	if (is_writable(CONCERTO_STAGES)) {
		$dir = CONCERTO_STAGES . $name;
		if (!is_dir($dir) && !is_readable($dir)) {
			@mkdir($dir, 0755);
		}
		if (is_dir($dir) && is_readable($dir)) {
			$file = ($file != null) ? $file: CONCERTO_LIBS . 'stage' . _DS . 'default.zip';
			if (file_exists($file)) {
				if (class_exists('ZipArchive')) {
					$zip = new ZipArchive;
					if ($zip->open($file) === TRUE) {
						$zip->extractTo($dir);
						$zip->close();
						return true;
					}
				}
				return 16; // ZipArchive class is not available
			}
			return 8; // File does not exist
		}
		return 4; // Couldn't make the stage folder
	}
	return 2; // Stage folder not writable
}

function repairStageFolder() {
	createStage('default');
}

?>