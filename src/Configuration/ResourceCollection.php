<?php
declare(strict_types = 1);

namespace Baethon\JsonApi\Configuration;

class ResourceCollection
{
    private $resources = [];

    public function addResource(Resource $resource)
    {
        $className = $resource->getClassName();

        if (true === isset($this->resources[$className])) {
            throw new \InvalidArgumentException(sprintf('Resource for class %s has been added', $className));
        }

        $this->resources[$className] = $resource;
    }

    public function getByClass(string $className): Resource
    {
        if (false === isset($this->resources[$className])) {
            throw new \OutOfBoundsException(sprintf('Resource for class %s is not defined', $className));
        }

        return $this->resources[$className];
    }
}
