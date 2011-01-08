<?php

function createOptionsFile($context = 'default', $what = -1){
	// Should add a hook somewhere to support custom option exports
	if (!is_array($what) && $what != -1) {
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
		$pos = strpos($key, 'concerto_' . $context . '_general_');
		if ($pos !== false ) {
			$general[$key] = $value;
		}
		$pos = strpos($key, 'concerto_' . $context . '_design_');
		if ($pos !== false ) {
			$design[$key] = $value;
		}
	}
	
	$content = array();
	if ($what == -1) {
		$content['general'] = $general;
		$content['design'] = $design;
	} else {
		if (in_array('general', $what)) $content['general'] = $general;
		if (in_array('design', $what)) $content['design'] = $design;
	}

	$jsondcontent = json_encode($content);
	
	// We prepare the file for download
	$filename = 'concerto' . date('mdY') . '.json';
	header('Content-Type: application/force-download'); 
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="' . $filename . '"');
	header("Content-Transfer-Encoding: binary");
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>
// This is an exported option file for Concerto generated on <?php echo date('r') ."\n"; ?>
// Stage: <?php echo $context . "\n"; ?>
// Context: <?php echo implode(', ', $what) ."\n"; ?>
<?php echo $jsondcontent; ?>
<?php
	die();
}

?>