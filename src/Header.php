<?php
declare(strict_types=1);

namespace Fyre\Http;

use function array_keys;
use function array_map;
use function array_unshift;
use function implode;
use function in_array;
use function is_array;
use function is_numeric;

/**
 * Header
 */
class Header
{
    protected array $value = [];

    /**
     * New Header constructor.
     *
     * @param string $name The header name.
     */
    public function __construct(
        protected string $name,
        array|string $value = ''
    ) {
        $this->value = static::filterValue($value);
    }

    /**
     * Get the header string.
     *
     * @return string The header string.
     */
    public function __toString(): string
    {
        return $this->getHeaderString();
    }

    /**
     * Append a value to the header.
     *
     * @param string $value The value to append.
     * @return Header A new Header.
     */
    public function appendValue(string $value): static
    {
        if (!$value || in_array($value, $this->value)) {
            return $this;
        }

        $temp = clone $this;

        $temp->value[] = $value;

        return $temp;
    }

    /**
     * Get the header string.
     *
     * @return string The header string.
     */
    public function getHeaderString(): string
    {
        return $this->name.': '.$this->getValueString();
    }

    /**
     * Get the header name.
     *
     * @return string The header name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the header value.
     *
     * @return array The header value.
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * Get the header value as a string.
     *
     * @return string The header value string.
     */
    public function getValueString(): string
    {
        $options = array_map(
            function(mixed $key, string $value): string {
                if (is_numeric($key)) {
                    return $value;
                }

                return $key.'='.$value;
            },
            array_keys($this->value),
            $this->value
        );

        return implode(', ', $options);
    }

    /**
     * Prepend a value to the header.
     *
     * @param string $value The value to prepend.
     * @return Header A new Header.
     */
    public function prependValue(string $value): static
    {
        if (!$value || in_array($value, $this->value)) {
            return $this;
        }

        $temp = clone $this;

        array_unshift($temp->value, $value);

        return $temp;
    }

    /**
     * Set the header value.
     *
     * @param array|string The header value.
     * @return Header A new Header.
     */
    public function setValue(array|string $value): static
    {
        $temp = clone $this;

        $temp->value = static::filterValue($value);

        return $temp;
    }

    /**
     * Filter the value.
     *
     * @param array|string $value The value.
     * @return array The filtered value.
     */
    protected static function filterValue(array|string $value): array
    {
        if (!is_array($value)) {
            $value = [$value];
        }

        return array_filter(
            $value,
            fn(string $value): bool => $value !== ''
        );
    }
}
