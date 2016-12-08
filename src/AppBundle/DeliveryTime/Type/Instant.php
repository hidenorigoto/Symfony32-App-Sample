<?php
namespace AppBundle\DeliveryTime\Type;

use AppBundle\DeliveryTime\DeliveryTimeTypeInterface;

class Instant implements DeliveryTimeTypeInterface
{
    /**
     * @inheritdoc
     */
    public function getType()
    {
        return 'instant';
    }

    public function __toString()
    {
        return $this->getType();
    }
}
