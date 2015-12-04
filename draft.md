# Entity example

```php
<?php

use Baethon\JsonApi\Encoder\Annotation as JsonApi;

/**
 * @JsonApi\Encode
 */
class User
{

    /**
     * @JsonApi\Encode
     * @var string
     */
    private $id;
    
    /**
     * @JsonApi\Decode(mapper="Hash::make")
     * @var string
     */
    private $password;
    
    /**
     * @JsonApi\Encode()
     * @JsonApi\Var(type="date", format=DATE_ATOM)
     * @var \DateTime
     */
    private $createdAt;
}
```
