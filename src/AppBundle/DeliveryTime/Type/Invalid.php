<?php
namespace AppBundle\DeliveryTime\Type;

use AppBundle\DeliveryTime\DeliveryTimeTypeInterface;

class Invalid implements DeliveryTimeTypeInterface
{
    /**
     * @inheritdoc
     */
    public function getType()
    {
        return 'invalid';
    }
}
