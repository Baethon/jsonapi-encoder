<?php
declare(strict_types = 1);

namespace Baethon\JsonApi\Configuration;

class Resource
{

    /**
     * @var string
     */
    protected $className;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Attribute[]
     */
    protected $attributes = [];

    public function __construct(string $className, string $name)
    {
        $this->className = $className;
        $this->name = $name;
    }

    public function getClassName(): string
    {
        return $this->className;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addAttribute(Attribute $attribute)
    {
        $this->attributes[] = $attribute;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
