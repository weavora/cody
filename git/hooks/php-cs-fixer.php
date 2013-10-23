<?php

/**
 * collect all files which have been added, copied or
 * modified and store them in an array called output
 */
exec('git diff --cached --name-status --diff-filter=ACM', $output);

foreach ($output as $file) {

    $fileName = trim(substr($file, 1));

    /**
     * Only PHP file
     */
    if (pathinfo($fileName, PATHINFO_EXTENSION) != "php") {
        continue;
    }

    /**
     * PHP-CS-Fixer && add it back
     */
    $out = array();
    exec("php-cs-fixer fix {$fileName} --level=all --config=sf21", $out);
    exec("git add {$fileName}", $out);
}

echo "PHP CS fixer: OK" . PHP_EOL;
exit(0);
