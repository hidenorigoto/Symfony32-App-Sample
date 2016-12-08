<?php
namespace AppBundle\DeliveryTime\Type;

use AppBundle\DeliveryTime\DeliveryTimeTypeInterface;

class Estimation implements DeliveryTimeTypeInterface
{
    /**
     * @inheritdoc
     */
    public function getType()
    {
        return 'estimation';
    }

    public function __toString()
    {
        return $this->getType();
    }
}
