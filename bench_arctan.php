<?php

require_once "./vendor/autoload.php";

use Samsara\Fermat\Numbers;
use Samsara\Fermat\Values\ImmutableNumber;
use Aura\Cli\CliFactory;

$cliFactory = new CliFactory();
$context = $cliFactory->newContext($GLOBALS);
$stdio = $cliFactory->newStdio();

$options = [

];

$getopt = $context->getopt($options);

/*
 * BENCH ONE
 */

$stdio->outln('<<greenbg black>>##Starting Bench One##<<reset>>');
$stdio->outln('<<greenbg black>>Easy Number; High Precision; 500 Iterations<<reset>>');

$startTime = new ImmutableNumber(microtime(true));
for ($i = 0;$i < 500;$i++) {
    $number = Numbers::make(Numbers::IMMUTABLE, '5', 60);
    $arctan = $number->arctan();
}
$endTime = new ImmutableNumber(microtime(true));

$timeElapsed = $endTime->subtract($startTime);

$stdio->outln('Bench One Completed');
$stdio->outln('Answer Given:    '.$arctan);
$stdio->outln('Answer Expected: 1.373400766945015860861271926444961148650999595899700808969783');
$stdio->outln('Time Elapsed:    '.$timeElapsed.'s');

/*
 * BENCH TWO
 */

$stdio->outln('<<greenbg black>>##Starting Bench Two##<<reset>>');
$stdio->outln('<<greenbg black>>Hard Number; Low Precision; 1 Iteration<<reset>>');

$startTime = new ImmutableNumber(microtime(true));
for ($i = 0;$i < 1;$i++) {
    $number = Numbers::make(Numbers::IMMUTABLE, '1.01', 10);
    $arctan = $number->arctan();
}
$endTime = new ImmutableNumber(microtime(true));

$timeElapsed = $endTime->subtract($startTime);

$stdio->outln('Bench One Completed');
$stdio->outln('Answer Given:    '.$arctan);
$stdio->outln('Answer Expected: 0.7903732467');
$stdio->outln('Time Elapsed:    '.$timeElapsed.'s');
