<?php
declare(strict_types = 1);

namespace Baethon\JsonApi\Configuration;

class Attribute
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var bool
     */
    protected $encode = true;

    /**
     * @var bool
     */
    protected $decode = true;

    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function encodeOnly()
    {
        $this->decode = false;
    }

    public function canBeEncoded(): bool
    {
        return $this->encode;
    }

    public function decodeOnly()
    {
        $this->encode = false;
    }

    public function canBeDecoded(): bool
    {
        return $this->decode;
    }
}
