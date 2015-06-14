<?php

use Lukaserat\WebmozartJson\JsonWrapper;
use Lukaserat\WebmozartJson\JasonFacade;

class WrapperTest extends PHPUnit_Framework_TestCase {

    /** @test **/
    public function callable_from_wrapper_using_instantiation()
    {
        $sampleJsonObject = ["attribute"=>"value"];
        $instance = new JsonWrapper;
        $jsonString = $instance->encode($sampleJsonObject);

        $this->assertJsonStringEqualsJsonString('{"attribute":"value"}', $jsonString);

        $jsonObject = (array) $instance->decode($jsonString);
        $this->assertEquals($sampleJsonObject, $jsonObject);
    }

    /** @test */
    public function callable_from_wrapper_using_static_calls()
    {
        $sampleJsonObject = ["attribute"=>"value"];
        $jsonString = JsonWrapper::encode($sampleJsonObject);

        $this->assertJsonStringEqualsJsonString('{"attribute":"value"}', $jsonString);

        $jsonObject = (array) JsonWrapper::decode($jsonString);
        $this->assertEquals($sampleJsonObject, $jsonObject);
    }

}