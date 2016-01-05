<?php

namespace tests\Configuration;

use Baethon\JsonApi\Configuration\ResourceCollection;
use Baethon\JsonApi\Configuration\Resource;
use stubs\EntityStub;

class ResourceCollectionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_has_resources_definition()
    {
        $resource = new Resource(EntityStub::class, 'name');
        $collection = new ResourceCollection;

        $collection->addResource($resource);
        $this->assertEquals($resource, $collection->getByClass(EntityStub::class));
    }

    /** @test */
    public function it_throws_exception_when_adding_resource_for_the_same_class()
    {
        $resource = new Resource(EntityStub::class, 'name');
        $collection = new ResourceCollection;
        $collection->addResource($resource);

        $this->setExpectedException('InvalidArgumentException');
        $collection->addResource($resource);
    }

    /** @test */
    public function it_throws_exception_when_getting_non_existing_resource()
    {
        $collection = new ResourceCollection;

        $this->setExpectedException('OutOfBoundsException');
        $collection->getByClass(EntityStub::class);
    }
}
