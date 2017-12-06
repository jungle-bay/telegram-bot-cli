# Telegram Bot CLI

[![Travis CI](https://img.shields.io/travis/jungle-bay/telegram-bot-api.svg?style=flat)](https://travis-ci.org/jungle-bay/telegram-bot-api)
[![Scrutinizer CI](https://img.shields.io/scrutinizer/g/jungle-bay/telegram-bot-api.svg?style=flat)](https://scrutinizer-ci.com/g/jungle-bay/telegram-bot-api)
[![Codecov](https://img.shields.io/codecov/c/github/jungle-bay/telegram-bot-api.svg?style=flat)](https://codecov.io/gh/jungle-bay/telegram-bot-api)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/629ccaba-0a4e-4ea3-b0a4-63d053b5bf30.svg?style=flat)](https://insight.sensiolabs.com/projects/629ccaba-0a4e-4ea3-b0a4-63d053b5bf30)

This is CLI Utility for Telegram Bot.
I decided not to include this package in the [main](https://github.com/jungle-bay/telegram-bot-api) library, as it is only needed for development!

### Prerequisites

   - Add a tag to the composer.json file in telegram-bot-cli scripts.

Example:
```json
   {
        "scripts": {
            "telegram-bot-cli": "telegram-bot-cli"
        }
   }
```
   
### Install

The recommended way to install is through [Composer](https://getcomposer.org):

```bash
composer require --dev jungle-bay/telegram-bot-cli
```

### The simplest example of use

```bash
composer telegram-bot-cli getWebhookInfo -t 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
```

### License

This bundle is under the [MIT license](http://opensource.org/licenses/MIT). See the complete license in the file: [here](https://github.com/jungle-bay/telegram-bot-cli/blob/master/license.txt).
