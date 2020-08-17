<?php declare (strict_types = 1);

use PHPUnit\Framework\TestCase;

class VariableTest extends TestCase
{
    /**
     * @var \flight\Engine
     */
    private $app;

    public function setUp()
    {
        $this->app = new \flight\Engine();
    }

    public function testSetAndGet()
    {
        $this->app->set('test', 1);
        $var = $this->app->get('test');
        $this->assertEquals(1, $var);
    }

}
