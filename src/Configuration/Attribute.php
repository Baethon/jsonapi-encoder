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

    /**
     * @var array
     */
    private $options;

    public function __construct(string $name, string $type, array $options = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->options = $options;
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

    public function getOptions(): array
    {
        return $this->options;
    }
}
