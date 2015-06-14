<?php

namespace Lukaserat\WebmozartJson;

use Webmozart\Json\JsonEncoder;
use Webmozart\Json\JsonDecoder;
use BadMethodCallException;
use ReflectionClass;

class JsonWrapper {

    protected $decoder;
    protected $encoder;

    public function __construct()
    {
        $this->decoder = new JsonDecoder;
        $this->encoder = new JsonEncoder;
    }

    public function __call($method, $parameters)
    {
        $encoder = new ReflectionClass(JsonEncoder::class);
        if ($encoder->hasMethod($method))
        {
            return call_user_func_array(array($this->encoder, $method), $parameters);
        }

        $decoder = new ReflectionClass(JsonDecoder::class);
        if ($decoder->hasMethod($method))
        {
            return call_user_func_array(array($this->decoder, $method), $parameters);
        }

        throw new BadMethodCallException;
    }

    public static function __callStatic($method, $parameters)
    {
        $self = new static;
        return $self->__call($method, $parameters);
    }

}