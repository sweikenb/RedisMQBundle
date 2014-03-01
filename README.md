RedisMQBundle
=============
Simple REDIS based message queue
License: MIT

Installation
============
Add the following dependency to your `composer.json` file:
```javascript
  "require": {
    // ...
    "sweikenb/redis-mq-bundle": "~1.0"
  }
```

Active the bundle in your `app/AppKernel.php` file:
```php
    new Sweikenb\Bundle\RedisMQBundle\SweikenbRedisMQBundle(),
```

Configuration
=============


Example usage
You will finde two example commands in this bundle:

* sweikenb:redismq:example:write
* sweikenb:redismq:example:read

They will use the default redis client provided by the redis bundle (`snc_redis.default_client`) and read/wirte some messages into the queue as long as you don't kill the commands (`ctrl` + `c`).

