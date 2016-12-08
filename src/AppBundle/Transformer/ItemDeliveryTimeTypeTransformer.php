<?php
namespace AppBundle\Transformer;

use AppBundle\DeliveryTime\DeliveryTimeTypeInterface;
use AppBundle\DeliveryTime\Type\Estimation;
use AppBundle\DeliveryTime\Type\Instant;
use AppBundle\DeliveryTime\Type\Invalid;

class ItemDeliveryTimeTypeTransformer
{
    /**
     * @var array
     */
    private $map;

    public function __construct()
    {
        $this->map = [
            'instant' =>    new Instant(),
            'estimation' => new Estimation(),
        ];
    }

    /**
     * @param DeliveryTimeTypeInterface $deliveryTimeType
     * @return string
     */
    public function toDB(DeliveryTimeTypeInterface $deliveryTimeType)
    {
        return $deliveryTimeType->getType();
    }

    /**
     * @param string $type
     * @return DeliveryTimeTypeInterface
     */
    public function toModel($type)
    {
        if (!array_key_exists($type, $this->map)) {
            return new Invalid();
        }

        return $this->map[$type];
    }
}
