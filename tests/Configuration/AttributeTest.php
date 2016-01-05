<?php

namespace tests\Configuration;

use Baethon\JsonApi\Configuration\Attribute;

class AttributeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Attribute
     */
    protected $attribute;

    public function setUp()
    {
        $this->attribute = new Attribute('login', 'string');
    }

    /** @test **/
    public function it_has_name_and_type()
    {
        $this->assertEquals('login', $this->attribute->getName());
        $this->assertEquals('string', $this->attribute->getType());
    }

    /** @test **/
    public function it_can_be_encoded_and_decoded()
    {
        $this->assertTrue($this->attribute->canBeEncoded());
        $this->assertTrue($this->attribute->canBeDecoded());
    }

    /** @test **/
    public function it_can_be_encoded_only()
    {
        $this->attribute->encodeOnly();

        $this->assertTrue($this->attribute->canBeEncoded());
        $this->assertFalse($this->attribute->canBeDecoded());
    }

    /** @test **/
    public function it_can_be_decoded_only()
    {
        $this->attribute->decodeOnly();

        $this->assertFalse($this->attribute->canBeEncoded());
        $this->assertTrue($this->attribute->canBeDecoded());
    }

    /** @test */
    public function it_has_options()
    {
        $attribute = new Attribute('name', 'string', $options = [
            'foo' => 'bar',
        ]);

        $this->assertEquals($options, $attribute->getOptions());
    }
}
