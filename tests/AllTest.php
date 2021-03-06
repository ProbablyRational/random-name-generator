<?php
namespace ProbablyRational\RandomNameGenerator;

use PHPUnit_Framework_TestCase;
use Cinam\Randomizer\Randomizer;

/**
 * @coversDefaultClass \ProbablyRational\RandomNameGenerator\All
 * @covers ::<protected>
 */
class AllTest extends PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of getName().
     *
     * @test
     * @covers ::__construct
     * @covers ::create
     * @covers ::getName
     * @uses \ProbablyRational\RandomNameGenerator\Alliteration
     * @uses \ProbablyRational\RandomNameGenerator\Vgng
     *
     * @return void
     */
    public function getNameBasic()
    {
        $generator = All::create();
        $name = $generator->getName();
        $this->assertRegexp('/.+/', $name);
    }

    /**
     * Verify basic behavior of getName() with a forced random generator.
     *
     * @test
     * @covers ::__construct
     * @covers ::create
     * @covers ::getName
     * @uses \ProbablyRational\RandomNameGenerator\Alliteration
     *
     * @return void
     */
    public function getNameForced()
    {
        $numberGenerator = $this->createMock('\Cinam\Randomizer\NumberGenerator');
        $numberGenerator->expects($this->exactly(2))->method('getInt')->will($this->onConsecutiveCalls(20, 5));
        $randomizer = new Randomizer($numberGenerator);

        $generator = new All([new Alliteration($randomizer)]);
        $this->assertSame('Black Bear', $generator->getName());
    }

    /**
     * Verify basic behavior of __toString().
     *
     * @test
     * @covers ::__construct
     * @covers ::create
     * @covers ::__toString
     * @covers ::getName
     * @uses \ProbablyRational\RandomNameGenerator\Alliteration
     * @uses \ProbablyRational\RandomNameGenerator\Vgng
     *
     * @return void
     */
    public function toStringBasic()
    {
        $generator = All::create();
        $name = (string)$generator;
        $this->assertRegexp('/.+/', $name);
    }
}
