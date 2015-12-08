# jsonapi-encoder
Encode (or decode) your entites using json-api annotated schema

# Dictionary

* *encode* - serialize resource and return it by the api
* *decode* - create resource based on the request data

# Entity example

```php
<?php

use Baethon\JsonApi\Encoder\Annotation as JsonApi;

/**
 * @JsonApi\Resource(name="user")
 */
class User
{

    /**
     * By default any attribute with @Field annotation can be encoded or decoded
     *
     * @JsonApi\Id
     * @JsonApi\Field if none type is set value from @var will be used
     * @var string
     */
    private $id;
    
    /**
     * This field can be only decoded
     *
     * @JsonApi\Field(type="password") custom types should be registered
     * @JsonApi\Decode
     * @var string
     */
    private $password;
    
    /**
     * This field will be returned by the API, but cannot be set based on request data
     *
     * @JsonApi\Field(type="date", format=DATE_ATOM) any further arguments from @Field annotation will be passed to
     *                                               the encode()/decode() method of type declaration class
     * @JsonApi\Encode
     * @var \DateTime
     */
    private $createdAt;
    
    /**
     * @JsonApi\Collection(type="comment")
     * @var Comment[]
     */
    private $comments;
    
    /**
     * @JsonApi\Item(type="address")
     * @var Address
     */
     private $address;
}
```

# Usage example

```php
<?php
$user = new User;

$manager = new Baethon\JsonApi\Manager([
    'cacheDir' => 'cache/',
    'autogenerateTransformers' => true,
]);
$encoder = new Baethon\JsonApi\Encoder($manager);
$encodedArray = $encoder->encodeItem($user);

/*
$encodedArray = [
    'data' => [
        'type' => 'user',
        'id' => '',
        'attributes' => [
            'createdAt' => ''
        ],
    ]
]
*/

$user->setAddress(new Address);

$includes = \Baethon\JsonApi\Request\Includes::createFromString('address');
$encodedArray = $encoder->encodeItem($user, $includes);

/*
$encodedArray = [
    'data' => [
        'type' => 'user',
        'id' => '',
        'attributes' => [
            'createdAt' => ''
        ],
        'relationships' => [
            'address' => [
                'data' => [
                    'id' => '',
                    'type' => 'address',
                ]
            ]
        ]
    ],
    'included' => [
        [
            'id' => '',
            'type' => 'address',
            'attributes' => [
            ]
        ]
    ]
]
*/
```
