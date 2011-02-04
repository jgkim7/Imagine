<?php

namespace Imagine\Filter\Basic;

class ResizeTest extends BasicFilterTestCase
{
    /**
     * @dataProvider getDataSet
     */
    public function testShouldResizeImageAndReturnResult($width, $height)
    {
        $image = $this->getImage();

        $image->expects($this->once())
            ->method('resize')
            ->with($width, $height)
            ->will($this->returnValue($image));

        $command = new Resize($width, $height);

        $this->assertSame($image, $command->apply($image));
    }

    public function getDataSet()
    {
        return array(
            array(50, 15),
            array(300, 25),
            array(123, 23),
            array(45, 23)
        );
    }
}
