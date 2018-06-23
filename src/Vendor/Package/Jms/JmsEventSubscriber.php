<?php
/**
 * Created by PhpStorm.
 * User: guigui
 * Date: 23/06/18
 * Time: 23:19
 */

namespace Vendor\Package\Jms;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use Vendor\Package\Jms\Denormalizer\SubjectDenormalizer;

class JmsEventSubscriber implements EventSubscriberInterface
{
    protected $denormalizers = [];

    public function __construct()
    {
        $this->denormalizers[] = new SubjectDenormalizer();
    }

    public static function getSubscribedEvents()
    {
        return [
            ['event' => 'serializer.pre_deserialize', 'method' => 'preDeserialize'],
        ];
    }

    /**
     * @param PreDeserializeEvent $event
     */
    public function preDeserialize(PreDeserializeEvent $event)
    {
        $data = $event->getData();
        $type = $event->getType()['name'];
        $format = $event->getContext()->getFormat();
        $context = $event->getContext()->attributes->all();

        foreach ($this->denormalizers as $denormalizer) {
            if ($denormalizer->supportsDenormalization($data, $type)) {
                $data = $denormalizer->denormalize($data, $type, $format, $context);
                break;
            }
        }

        $event->setData($data);
    }

}