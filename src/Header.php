<?php
declare(strict_types=1);

namespace Fyre\Http;

use function
    array_keys,
    array_map,
    array_unshift,
    implode,
    in_array,
    is_array,
    is_numeric;

/**
 * Header
 */
class Header
{

    protected string $name;

    protected array $value = [];

    /**
     * New Header constructor.
     * @param string $name The header name.
     */
    public function __construct(string $name, string|array $value = '')
    {
        $this->name = $name;

        $this->setValue($value);
    }

    /**
     * Get the header string.
     * @return string The header string.
     */
    public function __toString(): string
    {
        return $this->getHeaderString();
    }

    /**
     * Append a value to the header.
     * @param string $value The value to append.
     * @return Header The Header.
     */
    public function appendValue(string $value): static
    {
        if ($value && !in_array($value, $this->value)) {
            $this->value[] = $value;
        }

        return $this;
    }

    /**
     * Get the header string.
     * @return string The header string.
     */
    public function getHeaderString(): string
    {
        return $this->name.': '.$this->getValueString();
    }

    /**
     * Get the header name.
     * @return string The header name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the header value.
     * @return array The header value.
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * Get the header value as a string.
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
     * @param string $value The value to prepend.
     * @return Header The Header.
     */
    public function prependValue(string $value): static
    {
        if ($value && !in_array($value, $this->value)) {
            array_unshift($this->value, $value);
        }

        return $this;
    }

    /**
     * Set the header value.
     * @param string|array The header value.
     * @return Header The Header.
     */
    public function setValue(string|array $value): static
    {
        if (!is_array($value)) {
            $value = [$value];
        }

        $this->value = array_filter($value);

        return $this;
    }

}
