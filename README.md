Mattermost incoming webhook PHP client
======================================

PHP client to send messages to a Mattermost webhook.

See [https://docs.mattermost.com/developer/webhooks-incoming.html](https://docs.mattermost.com/developer/webhooks-incoming.html)
for the documentation of the incoming webhook of Mattermost.

[![Build Status](https://travis-ci.org/nutama/mattermost-webhook.svg?branch=master)](https://travis-ci.org/nutama/mattermost-webhook)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/55b70bd5-d02e-49ca-9fbb-8f685cf0f207/mini.png)](https://insight.sensiolabs.com/projects/55b70bd5-d02e-49ca-9fbb-8f685cf0f207)

Installation / Usage
--------------------

Install the latest version via [composer](https://getcomposer.org/):

```bash
php composer.phar require nutama/mattermost-webhook
```

Example:

```php
<?php
require_once('vendor/autoload.php');

$webhook_uri        = 'http://{your-mattermost-site}/hooks/xxx-generatedkey-xxx';
$client             = new \GuzzleHttp\Client(['base_uri' => $webhook_uri]);
$mattermost_webhook = new \Nutama\MattermostWebhook\MattermostWebhook($client);
$message            = new \Nutama\MattermostWebhook\Message('message');

$mattermost_webhook->send($message);
```

Requirements
------------

PHP 7.0.x or above.

License
-------

This library is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
