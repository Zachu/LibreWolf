<?php
$files = glob(dirname(__FILE__) . '/*.md');
$md    = new Parsedown();
foreach ($files as $file) {
    echo "<article class=\"rule " . basename($file, '.md') . "\">\n";
    echo $md->text(file_get_contents($file)) . "\n";
    echo "</article>\n\n";
}
