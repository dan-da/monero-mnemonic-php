# monero-mnemonic-php
monero mnemonic seed library for php with support for multiple languages (wordsets).

# installation

## for use in your own project/code

In your project's composer.json file:

```
    "require": {
        "dan-da/monero-mnemonic-php": "1.0.0",
    },
```

Then run 'composer update'.


## standalone

In case you just want to run unit tests, or contribute to development of the library.

```
$ git clone https://github.com/dan-da/monero-mnemonic-php
$ cd monero-mnemonic-php
$ composer install
```


# Using the library

## For software development

See the example code/usage at the bottom of src/mnemonic.php.

## As a CLI utility

Although this code is intended as a library for other apps, mnemonic.php
can also be called directly from the command-line to encode and decode mnemonics.

See the example usage at the bottom of src/mnemonic.php.


# Supported languages, aka wordsets

See src/wordsets