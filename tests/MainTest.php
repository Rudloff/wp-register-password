<?php

namespace RegisterPassword\Test;

use RegisterPassword\Main;
use Mockery;
use WP_Mock;

class MainTest extends \PHPUnit_Framework_TestCase
{
    private $submissionMock;

    protected function setUp()
    {
        WP_Mock::setUp();
        WP_Mock::wpFunction('__');
        WP_Mock::wpFunction('wp_set_password');
        WP_Mock::wpFunction('update_user_option');
        Mockery::mock('overload:WP_Error')
            ->shouldReceive('add');
    }

    public function tearDown()
    {
        WP_Mock::tearDown();
        Mockery::close();
    }

    public function testAddFormField()
    {
        $this->assertEmpty(Main::addFormField());
        $this->expectOutputRegex('/<p>(.*)<\/p>/s');
    }

    public function testCheckPassword()
    {
        $this->assertInstanceOf('WP_Error', Main::checkPassword(new \WP_Error()));
    }

    public function testSetPassword()
    {
        $this->assertEmpty(Main::setPassword(1));
    }

    public function testSetPasswordWithPost()
    {
        $_POST['user_password'] = 'foo';
        $this->assertEmpty(Main::setPassword(1));
    }
}
