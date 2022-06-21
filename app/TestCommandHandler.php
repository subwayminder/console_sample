<?php


namespace Subwayminder\ConsoleSample;


use Subwayminder\Console\Commands\Command;
use Subwayminder\Console\Commands\ICommandHandler;
use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;
use Subwayminder\Console\Args\Argument;

class TestCommandHandler implements ICommandHandler
{
    /**
     * Простой обработчик для консольной команды. Выводит в консоль все переданные в консоль аргументы и опции
     * @param Input $input
     * @param Output $output
     * @param Command $command
     */
    public static function handle(Input $input, Output $output, Command $command): void
    {
        /**
         * @var Argument $argument
         */
        $output->writeLn(0, 'Command name: ' . $input->getCommand());

        $output->writeLn(0, 'Arguments:');
        foreach ($input->getArguments() as $argument){
            $output->writeLn(3, '- '.$argument);
        }

        $output->writeLn(0, 'Options:');
        foreach ($input->getParams() as $k=>$param)
        {
            $output->writeLn(3, '- '.$k);
            foreach ($param as $value){
                $output->writeLn(9, '- '.$value);
            }
        }
    }
}