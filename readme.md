# Telegram Bot CLI

[![Travis CI](https://img.shields.io/travis/jungle-bay/telegram-bot-cli.svg?style=flat)](https://travis-ci.org/jungle-bay/telegram-bot-cli)
[![Scrutinizer CI](https://img.shields.io/scrutinizer/g/jungle-bay/telegram-bot-cli.svg?style=flat)](https://scrutinizer-ci.com/g/jungle-bay/telegram-bot-cli)
[![Codecov](https://img.shields.io/codecov/c/github/jungle-bay/telegram-bot-cli.svg?style=flat)](https://codecov.io/gh/jungle-bay/telegram-bot-cli)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/cd33ddb0-5bd7-4025-a584-7e4dc36242b7.svg?style=flat)](https://insight.sensiolabs.com/projects/cd33ddb0-5bd7-4025-a584-7e4dc36242b7)

This is CLI Utility for Telegram Bot. <br />
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

### Docs
See the complete docs in [here](https://github.com/jungle-bay/telegram-bot-cli/blob/master/docs/readme.md).

### License

This bundle is under the [MIT license](http://opensource.org/licenses/MIT). See the complete license in the file: [here](https://github.com/jungle-bay/telegram-bot-cli/blob/master/license.txt).
