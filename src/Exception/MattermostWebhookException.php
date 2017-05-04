<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook\Exception;

/**
 * Thrown when an invalid payload was sent to the Mattermost webhook.
 */
class MattermostWebhookException extends \Exception
{
    /**
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
