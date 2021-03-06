<?php
/**
 * Created by PhpStorm.
 * User: guigui
 * Date: 15/06/18
 * Time: 22:48
 */

require_once 'vendor/autoload.php';

//it seems jms does not declare symfony/yaml as a dependency. There may be a PR to create on JMS repo for that.

$json = file_get_contents('./example.json');

$builder =
    JMS\Serializer\SerializerBuilder::create()
        ->setDebug(true);

if (isset($_SERVER['argv'][1]) &&  $_SERVER['argv'][1] === '--public-accessor') {
    $builder->addMetadataDir('./src/Vendor/Package/Jms/public-accessor', 'Vendor\Package');
} else {
    $builder->addMetadataDir('./src/Vendor/Package/Jms/reflection', 'Vendor\Package');
}

$builder
    ->configureListeners(function(JMS\Serializer\EventDispatcher\EventDispatcher $dispatcher) {
        $dispatcher->addSubscriber(new \Vendor\Package\Jms\JmsEventSubscriber());
    })
;

$serializer = $builder->build();

$start = microtime(true);
for ($i = 0; $i<= 10000; $i++)
{
    $t = $serializer->deserialize($json, \Vendor\Package\Subject::class, 'json');
}
$end = microtime(true);

var_dump($t);

echo "done : " . ($end - $start) . "\n";

