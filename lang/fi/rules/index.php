<?php
$files = glob(dirname(__FILE__) . '/*.md');
$md    = new ParsedownExtra();
foreach ($files as $file) {
    $output = $md->text(file_get_contents($file)) . "\n";
    if (strpos($output, '{{ print_roles_with_info }}') !== false) {
        $output = str_replace(
            '{{ print_roles_with_info }}',
            print_roles_with_info($lang, $roles),
            $output);
    }
    echo $output;
}
