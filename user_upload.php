<?php

use Hazem\CSVDataUploader\App;
use Hazem\CSVDataUploader\ArrayConfig;
use Hazem\CSVDataUploader\Database\Database;
use Hazem\CSVDataUploader\Reader\CsvReader;
use Hazem\CSVDataUploader\Transformer\StringLowerTransformer;
use Hazem\CSVDataUploader\Transformer\StringUcfirstTransformer;
use Hazem\CSVDataUploader\Transformer\TransformerManager;
use Hazem\CSVDataUploader\UserUploadService;
use Hazem\CSVDataUploader\Validator\EmailValidator;
use Hazem\CSVDataUploader\Validator\StringValidator;
use Hazem\CSVDataUploader\Validator\ValidatorManager;

require "vendor/autoload.php";

// Can be read from the external config file
// Keep it in a script for simplicity
$configData = include 'config.php';
$config = new ArrayConfig($configData);

// Validator manager
$validatorManager = (new ValidatorManager())
    ->addValidator(new EmailValidator())
    ->addValidator(new StringValidator());

// Transformer manager
$transformerManager = (new TransformerManager())
    ->addTransformer(new StringLowerTransformer())
    ->addTransformer(new StringUcfirstTransformer());

$userUploadService = new UserUploadService(
    $config,
    new Database(),
    new CsvReader($config->getCsvSeparator()),
    $validatorManager,
    $transformerManager
);

(new App($userUploadService, $config))->run($argv);
