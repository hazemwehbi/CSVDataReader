<?php

namespace Hazem\CSVDataUploader\Console;

interface OutputInterface
{
    public function writeln(string $text, array $options = []): void;
}
