<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Glofy\Challenges\TextShortener;

$arrayTests = [
    [
        'value' => 'Design patterns were introduced to the software community in Design Patterns, by Erich Gamma, Richard Heleo. Design patterns were introduced to the software community in month.',
        'expected' => 'Design patterns were introduced to the software community in Design Patterns, by Erich Gamma,...',
    ],
    [
        'value' => 'Design patterns were introduced to the software community in Design Patterns by Erich Gamma Richard heleo Design patterns were introduced to the software community in Design Patterns by Erich Gamma Richard Heleo',
        'expected' => 'Design patterns were introduced to the software community in Design Patterns by Erich Gamma...',
    ],
    [
        'value' => 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdk.jfklñsdfñklsdjhfajñksdhfñkjad.shfñjkawehruiññjshdfjkash.dfkñjhasdfjkñdhsafjkñasdhf',
        'expected' => 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdk...',
    ],
    [
        'value' => 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdkjfklñsdfñklsdjhfajñksdhfñkjadshfñjkawehruiññjshdfjkashdfkñjhasdfjkñdhsafjkñasdhf',
        'expected' => 'kjdshfjkdlshfljksdhfjiweryhwjkelnrkmsdnfsdkjfklñsdfñklsdjhfajñksdhfñkjadshfñjkawehruiññjshdfjkash...',
    ],
    [
        'value' => 'This is a sentence',
        'expected' => 'This is a sentence',
    ],
    [
        'value' => 'This is a sentence.',
        'expected' => 'This is a sentence...',
    ],
];

foreach ($arrayTests as $test) {
    $result = limitString($test['value'], 100);
    $output = "Expected: {$test['expected']}".PHP_EOL."Actual: {$result}";
    if ($result === $test['expected']) {
        $output = 'OK.';
    }
    echo $output.PHP_EOL;
}

function limitString(string $string, int $limit): string
{
    $textShortener = new TextShortener;
    return $textShortener->shortenText($string, $limit);
}