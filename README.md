# Aegisora Is Array Rule

![Code Coverage Badge](./badge.svg)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
![PHPStan Badge](https://img.shields.io/badge/PHPStan-level%209-brightgreen.svg?style=flat)

Is Array Rule provides a simple and strict **array type validation** for the Aegisora ecosystem.

The package is built on top of `aegisora/rule-contract` and follows its validation architecture, ensuring predictable and safe behavior.

---

## ✨ Features

- 🔹 Minimalistic implementation with no extra dependencies
- 🔹 Strict array validation using `is_array`
- 🔹 Fully compatible with Aegisora validation pipeline
- 🔹 Clear `Context → Result` flow
- 🔹 No raw booleans — only structured `Result`
- 🔹 Safe execution via base `Rule` abstraction
- 🔹 Convenient static factory method (`create`)
- 🔹 Lightweight and predictable behavior

---

## 📦 Installation

```shell
composer require aegisora/is-array-rule
```

---

## 🚀 Core Concept

This package performs array validation:

- accepts a value via `Context`
- checks whether the value is an array
- returns a standardized `Result`

Supported values:

```php
[]
['foo', 'bar']
['key' => 'value']
```

Unsupported values:

```php
null
true
123
'string'
new stdClass()
```

---

## 🏗️ Basic Usage

### ✅ Validate array value

```php
use Aegisora\Rules\IsArrayRule;
use Aegisora\RuleContract\Models\Context;

$result = IsArrayRule::create()->validate(
    Context::create(['name' => 'John'])
);

if ($result->isValid()) {
    // value is array
} else {
    // value is not array
}
```

---

### ❌ Invalid value example

```php
use Aegisora\Rules\IsArrayRule;
use Aegisora\RuleContract\Models\Context;

$result = IsArrayRule::create()->validate(
    Context::create('not-array')
);

if ($result->isValid()) {
    // will not happen
} else {
    // validation failed
}
```

---

## 🧩 Factory Method

```php
IsArrayRule::create();
```

Creates a new instance of `IsArrayRule`.

---

## ⚠️ Validation Rules

Validation internally uses PHP native function:

```php
is_array($value)
```

The rule returns:

- valid `Result` → if value is array
- invalid `Result` → if value is not array

No exceptions are thrown for unsupported types.

---

## 🏛️ Architecture

This package relies on `aegisora/rule-contract`.

Validation flow:

1. `validate()` is called
2. `Context` is passed
3. `executeValidate()` is executed
4. `is_array()` check is performed
5. A `Result` is returned

All logic is encapsulated within the base `Rule` abstraction.

---

## ⚖️ License

This package is open-source and licensed under the MIT License. See the LICENSE for details.

---

## 🌱 Contributing

Contributions are welcome and greatly appreciated!. See the CONTRIBUTING for details.

---

## 🌟 Support

If you find this project useful, please consider giving it a star on GitHub!

It helps the project grow and motivates further development.
