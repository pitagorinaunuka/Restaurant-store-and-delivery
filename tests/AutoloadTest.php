<?php declare (strict_types = 1);

use PHPUnit\Framework\TestCase;

class AutoloadTest extends TestCase
{
    /**
     * @var \flight\Engine
     */
    private $app;

    public function setUp()
    {
        $this->app = new \flight\Engine();
        $this->app->path('classes');
    }

    public function testMissingClass()
    {
        $test = null;
        $this->app->register('fake', 'FakeClass');

        if (class_exists('FakeClass')) {
            $test = $this->app->test();
        }

        $this->assertEquals(null, $test);
    }
}
