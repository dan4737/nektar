
<?php
use \PHPUnit\Framework\TestCase as TestCase;

class SampleTest extends TestCase
{
    public function testTrueAssertsToTrue()
    {
        $this->assertTrue(true);
    }
    public function testDirectory()
    {
        define('ROOT_PATH', dirname(__DIR__) . '/./');
        $this->assertDirectoryExists(ROOT_PATH, 'login');
        $this->assertDirectoryExists(ROOT_PATH, 'admin');
    }
}