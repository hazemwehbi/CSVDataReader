<?php

namespace Hazem\CSVDataUploader\Database;

interface DatabaseInterface
{
    public function open(array $options): bool;
    public function createTable(string $name, array $columns): bool;
    public function tableExists(string $name): bool;
    public function getLastError(): ?string;
    public function insertBatch(string $tableName, array $batch): void;
}
