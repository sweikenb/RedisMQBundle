RedisMQBundle
=============
Simple REDIS based message queue.
***
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/10f1377f-4eeb-4a61-a84e-4dfe23e16885/mini.png)](https://insight.sensiolabs.com/projects/10f1377f-4eeb-4a61-a84e-4dfe23e16885)


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
  $bundles = array(
    // ...
    new Sweikenb\Bundle\RedisMQBundle\SweikenbRedisMQBundle(),
  );
```

Configuration
=============
As described in the example section, this bundle comes with an default service which uses the default_client connection of the snc redis bundle. If you wish to modify this, you simply can add you own service with an custom client:
```xml
  <services>
    <service id="acme.custom.mq.client" class="%sweikenb_redis_mq.RedisMQService.class%">
      <argument type="service" id="my.custom.snc.redisClient.here"/>
    </service>
  </services>
```

Example usage
=============
You will finde two example commands in this bundle:

* sweikenb:redismq:example:write
* sweikenb:redismq:example:read

They will use the default redis client provided by the redis bundle (`snc_redis.default_client`) and read/wirte some messages into the queue as long as you don't kill the commands (`ctrl` + `c`).

