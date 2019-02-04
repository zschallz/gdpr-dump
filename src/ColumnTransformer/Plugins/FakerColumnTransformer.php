<?php

namespace machbarmacher\GdprDump\ColumnTransformer\Plugins;

use Faker\Factory;
use Faker\Provider\Base;
use machbarmacher\GdprDump\ColumnTransformer\ColumnTransformer;

class FakerColumnTransformer extends ColumnTransformer
{

    private static $factory;

    public static $formatterTansformerMap = [
        'firstName' => 'firstName',
        'lastName' => 'lastName',
        'company' => 'company',
        'countryCode' => 'countryCode',
        'languageCode' => 'languageCode',
        'currencyCode' => 'currencyCode',
        'country' => 'country',
        'streetAddress' => 'streetAddress',
        'ipv4' => 'ipv4',
        'domainName' => 'domainName',
        'name' => 'name',
        'phoneNumber' => 'phoneNumber',
        'username' => 'username',
        'password' => 'password',
        'email' => 'email',
        'date' => 'date',
        'longText' => 'paragraph',
        'number' => 'number',
        'randomText' => 'sentence',
        'text' => 'sentence',
        'uri' => 'url',
    ];


    protected function getSupportedFormatters()
    {
        return array_keys(self::$formatterTansformerMap);
    }

    public function __construct()
    {
        if (!isset(self::$factory)) {
            self::$factory = Factory::create();
        }
    }

    public function getValue($expression)
    {
        return self::$factory->format(self::$formatterTansformerMap[$expression['formatter']]);
    }
}