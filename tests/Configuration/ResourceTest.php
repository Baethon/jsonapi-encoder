<?php

namespace tests\Configuration;

use stubs\EntityStub;
use Baethon\JsonApi\Configuration\{
    Attribute,
    Resource
};

class ResourceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Resource
     */
    protected $resource;

    public function setUp()
    {
        $this->resource = new Resource(EntityStub::class, 'entity');
    }

    /** @test **/
    public function it_has_type_and_target_entity_class()
    {
        $this->assertEquals('entity', $this->resource->getName());
        $this->assertEquals(EntityStub::class, $this->resource->getClassName());
    }

    /** @test **/
    public function it_can_have_multiple_attributes()
    {
        $mockBuilder = $this->getMockBuilder(Attribute::class)
            ->disableOriginalConstructor();

        $attributes = [
            $mockBuilder->getMock(),
            $mockBuilder->getMock(),
        ];

        array_walk($attributes, [$this->resource, 'addAttribute']);

        $this->assertEquals($attributes, $this->resource->getAttributes());
    }
}
