# Commands for Telegram Bot CLI

**Command Line Interface very simple, it consists of four command!**

### Usage

```bash
php ./vendor/bin/telegram-bot-cli command [arguments]
```

### 1. getUpdates

> Get array updates and send one update to local server. Simulate webhook for localhost. <br/>

```
Required Arguments:
    -u  [--url]                 Your url for bot.
    -t  [--token]               Your token for bot.
    
Optional Arguments:
    -h  [--host]                Your host.                  (default: 127.0.0.1)
    -p  [--port]                Your port.                  (default: 8080)
    -o  [--offset]              Offset update.
    -l  [--limit]               Limit update message 1-100. (default: 100)
    -to [--timeout]             Timeout updates.
    -au [--allowed-updates]     Allowed Updates, this string array separator ','.
```

Example use:
```bash
telegram-bot-cli getUpdates \
    --token 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11 \
    --host localhost \
    --port 8989 \
    --url /bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/ \
    --timeout 5
```

### 2. setWebhook

> Use this method to specify a url and receive incoming updates via an outgoing webhook. <br/>

```
Required Arguments:
    -u  [--url]                 Your url for bot.
    -t  [--token]               Your token for bot.
    
Optional Arguments:
    -c  [--certificate]         Path to file certificate.
    -mc [--max-connections]     Max connections 1-100.     (default: 40)
    -au [--allowed-updates]     Allowed Updates, this string array separator ','.
```

Example use:
```bash
telegram-bot-cli setWebhook \
    --token 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11 \
    --url https://example.com/bot123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11/
```

### 3. deleteWebhook

> Use this method to remove webhook integration if you decide to switch back to getUpdates. <br/>

```
Required Arguments:
    -t  [--token]               Your token for bot.
```

Example use:
```bash
telegram-bot-cli deleteWebhook --token 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
```

### 4. getWebhookInfo

> Use this method to get current webhook status. <br />

```
Required Arguments:
    -t  [--token]               Your token for bot.
```

Example use:
```bash
telegram-bot-cli getWebhookInfo --token 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
```
