<?php
namespace AppBundle\Entity\Listener;

use AppBundle\Transformer\ItemDeliveryTimeTypeTransformer;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Item;

class ItemListener
{
    /**
     * @var ItemDeliveryTimeTypeTransformer
     */
    private $transformer;

    public function __construct(ItemDeliveryTimeTypeTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @ORM\PostLoad()
     * @param Item $item
     * @param LifecycleEventArgs $event
     */
    public function postLoad(Item $item, LifecycleEventArgs $event)
    {
        $deliveryTimeType = $this->transformer->toModel($item->getDeliveryTimeType());
        $item->setDeliveryTimeType($deliveryTimeType);
    }

    /**
     * @ORM\PrePersist()
     * @param Item $item
     * @param LifecycleEventArgs $event
     */
    public function prePersistHandler(Item $item, LifecycleEventArgs $event)
    {
        $deliveryTimeType = $this->transformer->toDB($item->getDeliveryTimeType());
        $item->setDeliveryTimeType($deliveryTimeType);
    }

    /**
     * @ORM\PreUpdate()
     * @param Item $item
     * @param LifecycleEventArgs $event
     */
    public function preUpdateHandler(Item $item, LifecycleEventArgs $event)
    {
        $deliveryTimeType = $this->transformer->toDB($item->getDeliveryTimeType());
        $item->setDeliveryTimeType($deliveryTimeType);
    }
}
