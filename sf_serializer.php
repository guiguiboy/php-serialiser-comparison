<?php
/**
 * Created by PhpStorm.
 * User: guigui
 * Date: 15/06/18
 * Time: 22:48
 */

require_once 'vendor/autoload.php';

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


//it seems jms does not declare symfony/yaml as a dependency. There may be a PR to create on JMS repo for that.

$json = file_get_contents('./example.json');

$encoders = array(new JsonEncoder());
//$normalizers = array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer());
$normalizers = array(
    new \Vendor\Package\Sf\Denormalizer\SubjectDenormalizer(
        null,
        new \Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter(),
        new \Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor()
    ),
    new \Symfony\Component\Serializer\Normalizer\DateTimeNormalizer(),
);

$serializer = new Serializer($normalizers, $encoders);

$start = microtime(true);
for ($i = 0; $i<= 10000; $i++)
{
    $t = $serializer->deserialize($json, \Vendor\Package\Subject::class, 'json');
}
$end = microtime(true);

var_dump($t);

echo "done : " . ($end - $start) . "\n";
