<p align="center">
    <a href="https://github.com/jungle-bay/telegram-bot-platform">
        <img width="128" height="128" src="logo.png" alt="Telegram Bot Platform Logo">
    </a>
</p>

# Telegram Bot CLI

[![Travis CI](https://img.shields.io/travis/jungle-bay/telegram-bot-cli.svg?style=flat)](https://travis-ci.org/jungle-bay/telegram-bot-cli)
[![Scrutinizer CI](https://img.shields.io/scrutinizer/g/jungle-bay/telegram-bot-cli.svg?style=flat)](https://scrutinizer-ci.com/g/jungle-bay/telegram-bot-cli)
[![Codecov](https://img.shields.io/codecov/c/github/jungle-bay/telegram-bot-cli.svg?style=flat)](https://codecov.io/gh/jungle-bay/telegram-bot-cli)

This is PHP CLI Utility for Telegram Bot. <br />
I decided not to include this package in the main [Telegram Bot API](https://github.com/jungle-bay/telegram-bot-api) library, as it is only needed for development!

### Install

The recommended way to install is through [Composer](https://getcomposer.org/doc/00-intro.md#introduction):

```bash
composer require --dev jungle-bay/telegram-bot-cli
```

### The simplest example of use

```bash
php ./vendor/bin/telegram-bot-cli getWebhookInfo --token 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
```

Out

```
Get webhook info for %bot_name%

URL                                    %webhool_url%
Has custom certificate                 %bool%
Pending update count                   %integer%
```

### Docs

See the complete docs in [here](https://github.com/jungle-bay/telegram-bot-cli/blob/master/docs/readme.md).

### License

This bundle is under the [MIT license](http://opensource.org/licenses/MIT). See the complete license in the file: [here](https://github.com/jungle-bay/telegram-bot-cli/blob/master/license.txt).
