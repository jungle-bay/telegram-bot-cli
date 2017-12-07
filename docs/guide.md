# Guide for Telegram Bot CLI

**If two methods of use:**
* **[local installation](https://github.com/jungle-bay/telegram-bot-cli/blob/master/docs/guide.md#local-installation)**;
* **[global installation](https://github.com/jungle-bay/telegram-bot-cli/blob/master/docs/guide.md#global-installation)**.

### Install

The recommended way to install is through [Composer](https://getcomposer.org/doc/00-intro.md).

## Local installation

```bash
composer require --dev jungle-bay/telegram-bot-cli
```

Use

```bash
php ./vendor/bin/telegram-bot-cli command [arguments]
```

## Global installation

```bash
composer global require jungle-bay/telegram-bot-cli
```

> This will install TelegramBotCLI and all its dependencies into the ~/.composer/vendor/ directory and,  <br />
> most importantly, the telegram-bot-cli CLI tools are installed into ~/.composer/vendor/bin/.

Simply add this directory to your PATH in your like this:

```bash
export PATH=~/.composer/vendor/bin:$PATH
```

And telegram-bot-cli is now available on your command line:

```bash
telegram-bot-cli command [arguments]
```

To keep your tools up to date, you simply do this:
 
```bash
composer global update
```

**Happy coding and cool bots!**
