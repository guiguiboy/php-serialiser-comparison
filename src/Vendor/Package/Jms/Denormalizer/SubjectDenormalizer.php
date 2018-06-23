<?php
/**
 * Created by PhpStorm.
 * User: guigui
 * Date: 23/06/18
 * Time: 23:13
 */

namespace Vendor\Package\Jms\Denormalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Vendor\Package\Subject;

class SubjectDenormalizer implements DenormalizerInterface
{
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $isAvailable = $data['is_available'] ?? false;
        $isStopped = $data['is_stopped'] ?? false;
        $data['is_purchasable'] = $isAvailable && !$isStopped;
        return $data;
    }

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Subject::class;
    }

}
