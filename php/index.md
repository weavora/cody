# PHP code conventions

## Basics

Our team 100% follows [PSR-0](psr/0.md), [PSR-1](psr/1.md) and [PSR-2](psr/2.md).
These define actions for most formatting cases. This convention is an addition to those standards, but not a replacement.

You can easily set up our formatting rules in PHPStorm by copying
`cody/php/.idea/config/codestyles/Weavora.xml` to `<php storm home>/config/codestyles/Weavora.xml`.
After that you will have `Weavora` code style available under project code style settings.

## Namespaces

There are **MUST** be empty line **before** and **after** namespace declaration.

```php
<?php

namespace Weavora\SomePackage;

use SomeOtherClass;

class SomeClass
{

}
```

## Method naming

Here are few patterns we use for method names:

1. We __DO NOT__ use underscores (_) in method names (yes! even if a method is private or protected)
2. Every method name should follow camelStyle
3. A method name should start with a verb (get,transform,apply,save,add etc.)
4. `is` and `has` are used as verbs as well

Examples:

```php
public function getName() {}

protected function applyRestrictions() {}

private function isTransformed() {}

public function hasChildren() {}

public function save() {}

protected static function applyTo(Target $target) {}
``` 

## Properties access

We prefer to use getter/setter instead of public properties.

Examples:

```php

public $name; // WRONG


// CORRECT:
private $name;

public function setName($name) 
{
	$this->name = $name;
}

public function getName() 
{
	return $this->name;
}
```

**Note**: You can use `alt + insert` in PhpStorm IDO to generate getter/setter for a property.

## Methods and properties visibility (private vs protected)

The key question here is whether to make your methods protected or private by default.
Here are some related references:

[Fabien Potencier. Pragmatism over Theory: Protected vs Private](http://fabien.potencier.org/article/47/pragmatism-over-theory-protected-vs-private) 

[PRIVATE VS PROTECTED: LET’S COMBINE THEM!](http://phpandme.tumblr.com/post/4391869601/private-vs-protected-lets-combine-them)

We've decided to follow Symfony-guys and support [open/closed principle](http://en.wikipedia.org/wiki/Open/closed_principle).
The main idea here is that our classes should be open for extension, but closed for modification. 
This means that hook classes are a wrong approach. 
Your classes should allow to extend their logic. If they do not, you're using wrong classes :)

A few rules:

1. Use private visibility by default
2. Use protected visibility in cases where it's required (maybe, your class is not extensible enough :)) or you're 100% sure that it will be required (an abstract class)
3. If you don't know what visibility to use, use a private one

## Type hinting

We prefer to use type hinting where it is possible, but without fanaticism.

Rules:

1. Hint class name if you expect the instance of this class in argument
1. Hint parent class if you expect the child of this class in argument
1. Hint interface if you need a class that implements this interface
1. Hint array if you expect an array
1. Hint integer only if you 100% expect an integer and realize that there would be no way to pass any integer-like strings e.g. "123"

Examples:

```php
public function appendTo(Container $container) {}

public function setUser(Security/IUserContext $user = null) {}

public function setOptions(array $options) {}

public function setPage(int $page = 1) {}
```

## Comments and annotations

You should provide every method (!!!) and property (!!!) with proper comments as well as annotations with proper types 

Examples:

```php

/**
 * Sort collection with user specified closure
 *
 * @param $closure \Closure
 *
 * @return Collection
 */
public function sortBy(\Closure $closure)
{
	return $this;
}

/**
 * @var Container
 */
private $container = null;

```

## Inline type hinting comments

Use single line comments to hint type into code blocks.

Examples:

```php

// right way

/** @var $item NS/Item **/
foreach($items as $item) {
    // do something
}

// wrong way

/**
 * @var $item NS/Item
 */
foreach($items as $item) {
    // do something
}
```

## Boolean naming

Use adjective in code, and is_+adjective in DB
Examples:

```php
//variables

/**
* @var boolean
**/
protected $published;
protected $activated;

//seters

public function setPublished($published) {...};
public function setActivated($activated) {...};

//geters

public function isPublished($published) {...};
public function isActivated($activated) {...};

//DB

is_activated
is_published

```
