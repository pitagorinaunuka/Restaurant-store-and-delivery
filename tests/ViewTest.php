<?php declare (strict_types = 1);

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    /**
     * @var \flight\template\View
     */
    private $view;

    public function setUp()
    {
        $this->view = new \flight\template\View();
        $this->view->path = 'views';
    }

    public function testTemplateExists()
    {
        $this->assertTrue($this->view->exists('menu.php'));
        $this->assertTrue($this->view->exists('homepage.php'));
        $this->assertTrue($this->view->exists('addCategory.php'));
        $this->assertTrue($this->view->exists('addFood.php'));
        $this->assertTrue($this->view->exists('editFood.php'));
        $this->assertTrue($this->view->exists('messageView.php'));
        $this->assertTrue($this->view->exists('panel.php'));
        $this->assertTrue($this->view->exists('showFood.php'));
        $this->assertFalse($this->view->exists('homepage5463.php'));
        $this->assertFalse($this->view->exists('services.html'));
        $this->assertFalse($this->view->exists('menu.html'));
        $this->assertFalse($this->view->exists('contact.html'));
        $this->assertFalse($this->view->exists('blog.html'));
        $this->assertFalse($this->view->exists('blog-single.html'));
        $this->assertFalse($this->view->exists('about.html'));

        $this->assertFalse($this->view->exists('user.php'));

    }

}
