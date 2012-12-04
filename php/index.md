# PHP code conversion

## Basics

We're 100% follow [PSR-0](psr/0.md), [PSR-1](psr/1.md) and [PSR-2](psr/2.md). 
They define most of formatting cases.
Please, read them before going to other sections.

## Method naming

Here is few patterns for method names we use:

1. We __DO NOT__ use underscores (_) in method names (yes! even if method is private or protected)
2. Every method name should follow camelStyle
3. Method name should start with verb (get,transform,apply,save,add and etc)
4. `is` and `has` are verbs too for us.

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

We're prefer getter/setter instead of public properties.

Examples:

```php

public $name; // WRONG


// CORRECT:
private $name;

public function setName($name) {
	$this->name = $name;
}

public function getName() {
	return $this->name;
}
```

You can use alt + insert in phpStore for getter/setter generation.

## Methods/properties visibility (private vs protected)

Key question here is whether to make you methods protected or private by default.
Here are some references to related discussions:

[Fabien Potencier. Pragmatism over Theory: Protected vs Private](http://fabien.potencier.org/article/47/pragmatism-over-theory-protected-vs-private) 
[PRIVATE VS PROTECTED: LET’S COMBINE THEM!](http://phpandme.tumblr.com/post/4391869601/private-vs-protected-lets-combine-them)

What we decide is follow symfony-guys and support [open/closed principle](http://en.wikipedia.org/wiki/Open/closed_principle).
Main idea is that our classes should be open for extension, but close for modification. 
What this mean that hooking classes is wrong way. 
Your classes should allow to extend their logic. If they not - you're using wrong classes :)

Few rules:

1. Use private by default
2. Use protected when you particular case when it required (maybe your class is not extensible enough :)) or you're 100% sure it would be required (abstract class)
3. If you don't know what visibility to use - use private

## Type hinting

We're prefer to use type hinting where it possible and without fanatism.

Rules:

1. Hint class name if you expect this instance of this class in argument
2. Hint parent class or interface name if you expect child of this class or specified interface implementation
3. Hint array if you expect array
4. Hint int if you're 100% expecting only int and you release that you won't be allowed to specify string there ('123', it could come from request)

Examples:

```php
public function appendTo(Container $container) {}

public function setUser(Security/IUserContext $user = null) {}

public function setOptions(array $options) {}

public function setPage(int $page = 1) {}
```

## Comments and annotations

We should specify correct comments and annotations with proper types for every method (!!!) and property (!!!).

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




