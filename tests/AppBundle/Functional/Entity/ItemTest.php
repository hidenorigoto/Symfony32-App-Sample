<?php
namespace AppBundle\Functional\Entity;

use Liip\FunctionalTestBundle\Test\WebTestCase;
use AppBundle\Entity\Item;

class ItemTest extends WebTestCase
{
    public function test()
    {
        $this->loadFixtureFiles([
            __DIR__.'/../../Resources/fixtures/items.yml',
        ]);

        $em = static::getContainer()->get('doctrine')->getManager();

        $items = $em->getRepository(Item::class)->findAll();
        foreach ($items as $item) {
            echo get_class($item) . PHP_EOL;
            echo sprintf('%s %s %s',
                $item->getName(),
                $item->getPrice(),
                $item->getDeliveryTimeType()) . PHP_EOL;
        }
    }
}
