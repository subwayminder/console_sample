<?php
#!/usr/bin/env php
if (file_exists($autoload = __DIR__.'/../../../autoload.php')) {
    require_once $autoload;
} else {
    require_once __DIR__.'/../vendor/autoload.php';
}

use Subwayminder\Console\Input\ArgsInput;
use Subwayminder\Console\Application\DefaultApplication;
use Subwayminder\Console\Commands\Command;
use Subwayminder\Console\Output\Output;
use Subwayminder\ConsoleSample\TestCommandHandler;

$input = new ArgsInput();
//var_dump($argv);
//var_dump($input->getArguments());
//var_dump($input->getParams());

$app = new DefaultApplication('sample_application', new ArgsInput(), new Output());
$app
    ->addCommand(
        (new Command('test_command', 'A command for testing'))
            ->addArgument('test', 'Some test argument')
            ->addParam('value', 'Some value')
    )
    ->addCommand(
        (new Command('test', 'A command for testing'))
            ->addArgument('test', 'Some test argument')
            ->addParam('value', 'Some value')
            ->addHandler(new TestCommandHandler())
    )
;
$app->run();