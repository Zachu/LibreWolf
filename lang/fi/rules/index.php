<?php
$files = glob(dirname(__FILE__).'/*.md');
$md = new Parsedown();
foreach ($files as $file) {
	echo $md->text(file_get_contents($file));
}
