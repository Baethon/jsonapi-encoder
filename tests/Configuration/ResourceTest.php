<?php

namespace tests\Configuration;

use stubs\EntityStub;
use Baethon\JsonApi\Configuration\Resource;

class ResourceTest extends \PHPUnit_Framework_TestCase
{

    /** @test **/
    public function it_has_type_and_target_entity_class()
    {
        $resource = new Resource(EntityStub::class, 'entity');

        $this->assertEquals('entity', $resource->getName());
        $this->assertEquals(EntityStub::class, $resource->getClassName());
    }
}
