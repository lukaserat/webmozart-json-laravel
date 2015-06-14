Webmozart JSON Laravel
======================

A [webmozart/json](https://github.com/webmozart/json) wrapper for [Laravel Framework](https://github.com/laravel/laravel).

Installation
------------

Use [Composer] to install the package:

```
$ composer require lukaserat/webmozart-json-laravel
```

Laravel Users
-------------

I just combined the two major classes ``webmozart/json`` has to offer, the **Encoder** and **Decoder**, for easy usage.

Just include the service provider and that's it.

```
// app/config/app.php
'providers' => [
    '...',
    'Lukaserat\WebmozartJson\JsonServiceProvider'
];
```

*Note: Facade will be automatically registered as 'JsonHelper'*

When this provider is booted, you'll gain access on helpful functions from ``webmozart/json``. See the example below:

Encoding
--------

**Instead of this...**

```
// somewhere in your application..
use Webmozart\Json\JsonEncoder;
$encoder = new JsonEncoder();

// Store JSON in string
$string = $encoder->encode($data);

// Store JSON in file
$encoder->encodeFile($data, '/path/to/file.json');
```

**You can do it this way..**

```
// Store JSON in string
$string = JsonHelper::encode($data);

// Store JSON in file
JsonHelper::encodeFile($data, '/path/to/file.json');
```

Webmozart/Json Usage
--------------------
This is just a wrapper for Laravel. For more details about the ``webmozart/json`` go to its [github page](https://github.com/webmozart/json).
