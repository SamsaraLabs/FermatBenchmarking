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

$stdio->outln('<<whitebg black bold>>==bench_arctan starting==<<reset>>');

/*
 * BENCH ONE
 */

$stdio->outln('============================================================');
$stdio->outln('<<greenbg black bold>>##Starting Bench One | arctan(5)##<<reset>>');
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

$stdio->outln('============================================================');
$stdio->outln('<<greenbg black bold>>##Starting Bench Two | arctan(1.01)##<<reset>>');
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

$stdio->outln('============================================================');
$stdio->outln('<<whitebg black bold>>==bench_arctan finished==<<reset>>');