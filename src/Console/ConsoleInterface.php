<?php

namespace Hazem\CSVDataUploader\Console;

interface ConsoleInterface
{
    public function addDefinition(OptionDefinition $definition): self;
    public function getOutput(): OutputInterface;
    public function run(array $argv): void;
}
