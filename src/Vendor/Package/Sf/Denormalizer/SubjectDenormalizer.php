<?php
/**
 * Created by PhpStorm.
 * User: guigui
 * Date: 23/06/18
 * Time: 14:51
 */

namespace Vendor\Package\Sf\Denormalizer;

use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Vendor\Package\Subject;

class SubjectDenormalizer extends GetSetMethodNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === Subject::class;
    }

    protected function prepareForDenormalization($data)
    {
        $isAvailable = $data['is_available'] ?? false;
        $isStopped = $data['is_stopped'] ?? false;
        $data['is_purchasable'] = $isAvailable && !$isStopped;
        return parent::prepareForDenormalization($data);
    }
}
