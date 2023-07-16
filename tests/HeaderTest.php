<?php
declare(strict_types=1);

namespace Tests;

use Fyre\Http\Header;
use PHPUnit\Framework\TestCase;

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
        $header1 = new Header('test', 'value');
        $header2 = $header1->appendValue('last');

        $this->assertSame(
            [
                'value'
            ],
            $header1->getValue()
        );

        $this->assertSame(
            [
                'value',
                'last'
            ],
            $header2->getValue()
        );
    }

    public function testAppendValueDuplicate(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->appendValue('value');

        $this->assertSame(
            $header1,
            $header2
        );

        $this->assertSame(
            [
                'value'
            ],
            $header2->getValue()
        );
    }

    public function testAppendValueEmpty(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->appendValue('');

        $this->assertSame(
            $header1,
            $header2
        );

        $this->assertSame(
            [
                'value'
            ],
            $header2->getValue()
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
        $header1 = new Header('test', 'value');
        $header2 = $header1->prependValue('first');

        $this->assertSame(
            [
                'value'
            ],
            $header1->getValue()
        );

        $this->assertSame(
            [
                'first',
                'value'
            ],
            $header2->getValue()
        );
    }

    public function testPrependValueDuplicate(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->prependValue('value');

        $this->assertSame(
            $header1,
            $header2
        );

        $this->assertSame(
            [
                'value'
            ],
            $header2->getValue()
        );
    }

    public function testPrependValueEmpty(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->prependValue('');

        $this->assertSame(
            $header1,
            $header2
        );

        $this->assertSame(
            [
                'value'
            ],
            $header2->getValue()
        );
    }

    public function testSetValue(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->setValue('new');

        $this->assertSame(
            [
                'value'
            ],
            $header1->getValue()
        );

        $this->assertSame(
            [
                'new'
            ],
            $header2->getValue()
        );
    }

    public function testSetValueArray(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->setValue(['first', 'last']);

        $this->assertSame(
            [
                'value'
            ],
            $header1->getValue()
        );

        $this->assertSame(
            [
                'first',
                'last'
            ],
            $header2->getValue()
        );
    }

    public function testSetValueEmpty(): void
    {
        $header1 = new Header('test', 'value');
        $header2 = $header1->setValue('');

        $this->assertSame(
            [
                'value'
            ],
            $header1->getValue()
        );

        $this->assertSame(
            [],
            $header2->getValue()
        );
    }

}
