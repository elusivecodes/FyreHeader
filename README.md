# FyreHeader

**FyreHeader** is a free, header library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Header Creation](#header-creation)
- [Methods](#methods)



## Installation

**Using Composer**

```
composer require fyre/header
```

In PHP:

```php
use Fyre\Header\Header;
```


## Header Creation

- `$name` is a string representing the header name.
- `$value` is a string or array representing the header value.

```php
$header = new Header($name, $value);
```


## Methods

**Append Value**

Append a value to the header.

- `$value` is a string representing the value to append.

```php
$header->appendValue($value);
```

**Get Header String**

Get the header string.

```php
$headerString = $header->getHeaderString();
```

**Get Name**

Get the header name.

```php
$name = $header->getName();
```

**Get Value**

Get the header value.

```php
$value = $header->getValue();
```

**Get Value String**

Get the header value as a string.

```php
$value = $header->getValueString();
```

**Prepend Value**

Prepend a value to the header.

- `$value` is a string representing the value to prepend.

```php
$header->prependValue($value);
```

**Set Value**

Set the header value.

- `$value` is a string representing the header value.

```php
$header->setValue($value);
```