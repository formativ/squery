<?php

namespace League\Squery\Test;

use League\Squery\AbstractProxy;

class ConcreteProxy extends AbstractProxy
{
    /**
     * @param string $method
     *
     * @return bool
     */
    protected function handlesMethod($method)
    {
        return $method === "foo";
    }

    /**
     * @param string $method
     * @param array  $parameters
     *
     * @return string
     */
    protected function handleMethod($method, array $parameters)
    {
        return "mocked handleMethod";
    }
}

class AbstractProxyTest extends Test
{
    /**
     * @test
     *
     * @return void
     */
    public function itHandlesStaticMethodCalls()
    {
        $this->assertEquals("mocked handleMethod", ConcreteProxy::foo());
    }
}
