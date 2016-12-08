<?php
namespace AppBundle\Entity;

use AppBundle\DeliveryTime\DeliveryTimeTypeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ItemRepository")
 * @ORM\DiscriminatorColumn(name="item_type", type="string")
 * @ORM\DiscriminatorMap({
 *   "item_abstract": "AppBundle\Entity\Item",
 *   "normal":        "AppBundle\Entity\Item\NormalItem",
 *   "custom_order":  "AppBundle\Entity\Item\CustomOrderItem",
 * })
 * @ORM\InheritanceType(value="SINGLE_TABLE")
 * @ORM\EntityListeners({"AppBundle\Entity\Listener\ItemListener"})
 */
abstract class Item
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @var ItemPrice
     *
     * @ORM\Embedded(class="AppBundle\Entity\ItemPrice", columnPrefix="price_")
     * @Assert\Valid
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="delivery_time_type", type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Choice(choices={"instant", "estimation"})
     */
    private $deliveryTimeType;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return DeliveryTimeTypeInterface|string
     */
    public function getDeliveryTimeType()
    {
        return $this->deliveryTimeType;
    }

    /**
     * @param DeliveryTimeTypeInterface|string $deliveryTimeType
     * @return $this
     */
    public function setDeliveryTimeType($deliveryTimeType)
    {
        $this->deliveryTimeType = $deliveryTimeType;

        return $this;
    }

    /**
     * @return ItemPrice
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param ItemPrice $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

