<?php
/**
 * Html2Pdf Library - Tests
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */

namespace Spipu\Html2Pdf\Tests\Parsing;

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\ImageException;

/**
 * Class BackgroundErrorTest
 */
class BackgroundErrorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test: The image src is unknown
     *
     * @return void
     * @expectedException \Spipu\Html2Pdf\Exception\ImageException
     */
    public function testCase()
    {
        $image = '/res/wrong.png';

        try {
            $object = new Html2Pdf();
            $object->pdf->SetTitle('PhpUnit Test');
            $object->writeHTML('<div style="background-image: url('.$image.')">Hello World</div>');
            $object->output('test.pdf', 'S');
        } catch (ImageException $e) {
            $this->assertSame($image, $e->getImage());
            throw $e;
        }
    }
}
