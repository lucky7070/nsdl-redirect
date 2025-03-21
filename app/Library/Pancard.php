<?php

namespace App\Library;

use Illuminate\Support\Facades\Process;

class Pancard
{
    public static function create(): array
    {
        // Java Path
        $javaPath = "C:\\Lucky\\Eclipse Adoptium\\jdk-21.0.6.7-hotspot\\bin\\java.exe";
        // $javaPath = "java";

        // Jar File Path
        $jarFile = config('ayt.pan-card-service.jar-file');

        // Build Command
        $command = sprintf('"%s" -jar "%s"', $javaPath, $jarFile);

        $result = Process::path(base_path('secret'))->run($command);

        // String to Array Conversion
        $outputArray = preg_split("/\r\n|\n|\r/", trim($result->output()));

        // Array Split into key value
        $arraySplit = array_map(fn($row) => explode(':', $row, 2), $outputArray);

        // Build Associative Array
        return array_combine(
            array_map(fn($a) => str($a[0])->trim()->camel()->toString(), $arraySplit),
            array_map(fn($a) => trim($a[1]), $arraySplit)
        );
    }
}