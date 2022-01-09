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

        $this->assertSame(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testValueArray(): void
    {
        $header = new Header('test', ['first', 'last']);

        $this->assertSame(
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

        $this->assertSame(
            [],
            $header->getValue()
        );
    }

    public function testAppendValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertSame(
            $header,
            $header->appendValue('last')
        );

        $this->assertSame(
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

        $header->appendValue('');

        $this->assertSame(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testGetHeaderString(): void
    {
        $header = new Header('test', 'value');

        $this->assertSame(
            'test: value',
            $header->getHeaderString()
        );
    }

    public function testGetHeaderStringAssociative(): void
    {
        $header = new Header('test', ['a' => 1, 'b' => 2]);

        $this->assertSame(
            'test: a=1, b=2',
            $header->getHeaderString()
        );
    }

    public function testGetName(): void
    {
        $header = new Header('test', 'value');

        $this->assertSame(
            'test',
            $header->getName()
        );
    }

    public function testGetValueString(): void
    {
        $header = new Header('test', 'value');

        $this->assertSame(
            'value',
            $header->getValueString()
        );
    }

    public function testGetValueStringAssociative(): void
    {
        $header = new Header('test', ['a' => 1, 'b' => 2]);

        $this->assertSame(
            'a=1, b=2',
            $header->getValueString()
        );
    }

    public function testPrependValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertSame(
            $header,
            $header->prependValue('first')
        );

        $this->assertSame(
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

        $header->prependValue('');

        $this->assertSame(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testSetValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertSame(
            $header,
            $header->setValue('new')
        );

        $this->assertSame(
            [
                'new'
            ],
            $header->getValue()
        );
    }

    public function testSetValueArray(): void
    {
        $header = new Header('test', 'value');

        $header->setValue(['first', 'last']);

        $this->assertSame(
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

        $header->setValue('');

        $this->assertSame(
            [],
            $header->getValue()
        );
    }

}
