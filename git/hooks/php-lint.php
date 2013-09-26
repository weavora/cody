<?php

/**
 * collect all files which have been added, copied or
 * modified and store them in an array called output
 */
exec('git diff --cached --name-status --diff-filter=ACM', $output);

$errors = array();

foreach ($output as $file) {

    $fileName = trim(substr($file, 1));

    // only php files
    if (!pathinfo($fileName, PATHINFO_EXTENSION) == "php") {
        continue;
    }

    // validate with lint
    $lintOutput = array();
    exec("php -l " . escapeshellarg($fileName) . " 2> /dev/null", $lintOutput, $return);

    if ($return != 0) {
        $errors[$fileName] = array();
        foreach($lintOutput as $line) {
            if (!empty($line) && strpos($line, 'Errors parsing') !== 0) {
                $errors[$fileName][] = $line;
            }
        }
    }
}


if (empty($errors)) {
    echo "PHP Lint: OK" . PHP_EOL;
    exit(0);
}

foreach ($errors as $fileName => $output) {
    echo "ERROR: " . $fileName . PHP_EOL;
    echo implode(PHP_EOL, $output) . PHP_EOL . PHP_EOL;
}

exit(1);