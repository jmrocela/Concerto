<?php

function exportConcertoOptions($what = null, $stage = 'default'){
	// Should add a hook somewhere to support custom option exports
	if (!is_array($what) && $what != null) {
		if ($exploded = @explode(',', $what)) {
			$what = array_map('trim', $exploded);
		} else {
			$val = $what;
			$what = array();
			$what[] = $val;
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
	if ($what == null) {
		$content['general'] = $general;
		$content['design'] = $design;
		$what = array('general','design');
		$filename = '';
	} else {
		if (in_array('general', $what)) {
			$content['general'] = $general;
			$filename = '.general';
		}
		if (in_array('design', $what)) {
			$content['design'] = $design;
			$filename = '.design';
		}
		if (in_array('design', $what) && in_array('general', $what)) {
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
// Context: <?php echo implode(', ', $what) ."\n"; ?>
<?php echo $jsondcontent; ?>
<?php
	die();
}

function importConcertoOptions($file = null, $context = null, $stage = 'default') {
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

?>