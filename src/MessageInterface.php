<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

interface MessageInterface
{
    /**
     * Payload that will be send to the webhook.
     *
     * @return array
     */
    public function getPayload(): array;
}
