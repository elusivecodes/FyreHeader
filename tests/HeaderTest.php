<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Http\Header,
    PHPUnit\Framework\TestCase;

final class HeaderTest extends TestCase
{

    public function testValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testValueArray(): void
    {
        $header = new Header('test', ['first', 'last']);

        $this->assertEquals(
            [
                'first',
                'last'
            ],
            $header->getValue()
        );
    }

    public function testEmptyValue(): void
    {
        $header = new Header('test');

        $this->assertEquals(
            [],
            $header->getValue()
        );
    }

    public function testAppendValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->appendValue('last')
        );

        $this->assertEquals(
            [
                'value',
                'last'
            ],
            $header->getValue()
        );
    }

    public function testAppendValueEmpty(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->appendValue('')
        );

        $this->assertEquals(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testGetHeaderString(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            'test: value',
            $header->getHeaderString()
        );
    }

    public function testGetHeaderStringAssociative(): void
    {
        $header = new Header('test', ['a' => 1, 'b' => 2]);

        $this->assertEquals(
            'test: a=1, b=2',
            $header->getHeaderString()
        );
    }

    public function testGetName(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            'test',
            $header->getName()
        );
    }

    public function testGetValueString(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            'value',
            $header->getValueString()
        );
    }

    public function testGetValueStringAssociative(): void
    {
        $header = new Header('test', ['a' => 1, 'b' => 2]);

        $this->assertEquals(
            'a=1, b=2',
            $header->getValueString()
        );
    }

    public function testPrependValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->prependValue('first')
        );

        $this->assertEquals(
            [
                'first',
                'value'
            ],
            $header->getValue()
        );
    }

    public function testPrependValueEmpty(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->prependValue('')
        );

        $this->assertEquals(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testSetValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->setValue('new')
        );

        $this->assertEquals(
            [
                'new'
            ],
            $header->getValue()
        );
    }

    public function testSetValueArray(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->setValue(['first', 'last'])
        );

        $this->assertEquals(
            [
                'first',
                'last'
            ],
            $header->getValue()
        );
    }

    public function testSetValueEmpty(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            $header,
            $header->setValue('')
        );

        $this->assertEquals(
            [],
            $header->getValue()
        );
    }

}
