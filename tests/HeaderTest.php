<?php
declare(strict_types=1);

namespace Tests;

use
    Fyre\Header\Header,
    PHPUnit\Framework\TestCase;

final class HeaderTest extends TestCase
{

    public function testHeaderValue(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            [
                'value'
            ],
            $header->getValue()
        );
    }

    public function testHeaderValueArray(): void
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

    public function testHeaderEmptyValue(): void
    {
        $header = new Header('test');

        $this->assertEquals(
            [],
            $header->getValue()
        );
    }

    public function testHeaderAppendValue(): void
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

    public function testHeaderAppendValueEmpty(): void
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

    public function testHeaderGetHeaderString(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            'test: value',
            $header->getHeaderString()
        );
    }

    public function testHeaderGetHeaderStringAssociative(): void
    {
        $header = new Header('test', ['a' => 1, 'b' => 2]);

        $this->assertEquals(
            'test: a=1, b=2',
            $header->getHeaderString()
        );
    }

    public function testHeaderGetName(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            'test',
            $header->getName()
        );
    }

    public function testHeaderGetValueString(): void
    {
        $header = new Header('test', 'value');

        $this->assertEquals(
            'value',
            $header->getValueString()
        );
    }

    public function testHeaderGetValueStringAssociative(): void
    {
        $header = new Header('test', ['a' => 1, 'b' => 2]);

        $this->assertEquals(
            'a=1, b=2',
            $header->getValueString()
        );
    }

    public function testHeaderPrependValue(): void
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

    public function testHeaderPrependValueEmpty(): void
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

    public function testHeaderSetValue(): void
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

    public function testHeaderSetValueArray(): void
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

    public function testHeaderSetValueEmpty(): void
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
