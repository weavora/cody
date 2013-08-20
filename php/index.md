# PHP code conventions

## Basics

Our team 100% follow [PSR-0](psr/0.md), [PSR-1](psr/1.md) and [PSR-2](psr/2.md). They define most formatting cases. Please read this references first and only after keep reading other sections.

## Method naming

Here are few patterns for method names we use:

1. We __DO NOT__ use underscores (_) in method names (yes! even if method is private or protected)
2. Every method name should follow camelStyle
3. Method name should start with verb (get,transform,apply,save,add etc.)
4. `is` and `has` are verbs for us as well

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

We prefer getter/setter instead of public properties.

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

**Note**: You can use `alt + insert` in phpStore for getter/setter generation.

## Methods/properties visibility (private vs protected)

Key question here is whether to make your methods protected or private by default.
Here are some related references:

[Fabien Potencier. Pragmatism over Theory: Protected vs Private](http://fabien.potencier.org/article/47/pragmatism-over-theory-protected-vs-private) 

[PRIVATE VS PROTECTED: LET’S COMBINE THEM!](http://phpandme.tumblr.com/post/4391869601/private-vs-protected-lets-combine-them)

What we decided is to follow Symfony-guys and support [open/closed principle](http://en.wikipedia.org/wiki/Open/closed_principle).
Main idea here is that our classes should be open for extension, but closed for modification. 
What this means is that hooking classes is a wrong approach. 
Your classes should allow to extend their logic. If they do not - you're using wrong classes :)

Few rules:

1. Use private by default
2. Use protected in cases that require this (maybe your class is not extensible enough :)) or you're 100% sure that it would be required (abstract class)
3. If you don't know what visibility to use - use private

## Type hinting

We prefer to use type hinting where it is possible but without fanaticism.

Rules:

1. Hint class name if you expect instance of this class in argument
1. Hint parent class if you expect child of this class in argument
1. Hint interface if you need class that implement this interface
1. Hint array if you expect array
1. Hint integer only if you 100% expect integer and realize that there would be no way to pass any integer-like strings e.g. "123"

Examples:

```php
public function appendTo(Container $container) {}

public function setUser(Security/IUserContext $user = null) {}

public function setOptions(array $options) {}

public function setPage(int $page = 1) {}
```

## Comments and annotations

We should provide every method (!!!) and property (!!!) with proper comments as well as annotations with proper types 

Examples:

```php

/**
 * Sort collection with user specified closure
 *
 * @param $closure \Closure
 *
 * @return Collection
 */
public function sortBy(\Closure $closure) {
	return $this;
}

/**
 * @var Container
 */
private $container = null;

```

## Inline type hinting comments

You're using single line comments to hint type into code blocks.

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
