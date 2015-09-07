# Format
A PHP library for formatting text.

To use Format, include it in your project and call the constructor,

```php
<?php
include_once "Format.php";
$Format = new Format;
```

This exposes one function, ``format($text, $options);``


``$options`` is an array with how you want to format ``$text``

# Valid options

| Option | Formats | Into |
|--------|---------|------|
| link   | urls    |Links |
| bold   | \*example\* | **example** |
| italic | /example/ | *example*|
| sup    | ^example^ | <sup>example</sup> |
| sub    | :example: | <sub>example</sub> |
| under  | \_example\_ | <u>example</u> |
