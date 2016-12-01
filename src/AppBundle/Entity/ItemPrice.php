<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class ItemPrice
{
    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     * @Assert\NotBlank
     * @Assert\Type("number")
     * @Assert\GreaterThanOrEqual(0)
     */
    private $price;

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function __toString()
    {
        return (string)$this->price;
    }
}
