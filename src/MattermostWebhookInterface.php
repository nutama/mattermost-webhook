<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

interface MattermostWebhookInterface
{
    /**
     * Send the Message to the webhook.
     *
     * @param MessageInterface $message
     */
    public function send(MessageInterface $message);
}
