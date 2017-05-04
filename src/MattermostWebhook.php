<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Nutama\MattermostWebhook\Exception\MattermostWebhookException;

final class MattermostWebhook implements MattermostWebhookInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var string
     */
    private $uri;

    /**
     * @param ClientInterface $client
     * @param string          $uri
     */
    public function __construct(ClientInterface $client, string $uri = '')
    {
        $this->client = $client;
        $this->uri    = $uri;
    }

    /**
     * {@inheritdoc}
     */
    public function send(MessageInterface $message)
    {
        try {
            $this->client->request('POST', $this->uri, ['json' => $message->getPayload()]);
        } catch (ClientException $e) {
            throw new MattermostWebhookException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
