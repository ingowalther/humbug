<?php
/**
 * Humbug
 *
 * @category   Humbug
 * @package    Humbug
 * @copyright  Copyright (c) 2015 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    https://github.com/padraic/humbug/blob/master/LICENSE New BSD License
 *
 * @author     rafal.wartalski@gmail.com
 */

namespace Humbug\Test\Adapter\Phpunit;

use Humbug\Adapter\Phpunit\ConfigurationLocator;
use Humbug\Adapter\Phpunit\XmlConfiguration;

class ConfigurationLocatorTest extends \PHPUnit\Framework\TestCase
{
    public function testShouldLocateConfiguration()
    {
        $directory = __DIR__ . '/../_files/phpunit-conf';

        $configurationFile = (new ConfigurationLocator())->locate($directory);

        $expectedXmlPath = realpath($directory . '/phpunit.xml');

        $this->assertEquals($expectedXmlPath, $configurationFile);
    }

    public function testShouldLocateDistConfiguration()
    {
        $directory = __DIR__ . '/../_files/phpunit';

        $configurationFile = (new ConfigurationLocator())->locate($directory);

        $expectedXmlPath = realpath($directory . '/phpunit.xml.dist');

        $this->assertEquals($expectedXmlPath, $configurationFile);
    }

    /**
     * @expectedException \Humbug\Exception\RuntimeException
     */
    public function testShouldRiseExceptionWhileLocatingConfiguration()
    {
        $directory = __DIR__;

        (new ConfigurationLocator())->locate($directory);
    }
}
