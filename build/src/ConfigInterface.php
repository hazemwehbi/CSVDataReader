<?php

namespace Hazem\CSVDataUploader;

interface ConfigInterface
{
    public function getColumnMapping(): array;
    public function getTableName(): string;
    public function getCsvSeparator(): string;
    public function getLogDir(): string;
    public function getLogFilename(): string;
}
