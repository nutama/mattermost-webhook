<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

use GuzzleHttp\ClientInterface;
use Nutama\MattermostWebhook\Exception\MattermostWebhookException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Nutama\MattermostWebhook\MattermostWebhook
 */
final class MattermostWebhookTest extends TestCase
{
    public function testSend(): void
    {
        $client             = $this->prophesize(ClientInterface::class);
        $mattermost_webhook = new MattermostWebhook($client->reveal());
        $message            = new Message('document');

        $client
            ->request('POST', '', ['json' => $message->getPayload()])
            ->shouldBeCalled();

        $mattermost_webhook->send($message);
    }

    public function testSendWithUri(): void
    {
        $client             = $this->prophesize(ClientInterface::class);
        $mattermost_webhook = new MattermostWebhook($client->reveal(), 'http://{your-mattermost-site}');
        $message            = new Message('file');

        $client
            ->request('POST', 'http://{your-mattermost-site}', ['json' => $message->getPayload()])
            ->shouldBeCalled();

        $mattermost_webhook->send($message);
    }

    public function testSendWithClientException(): void
    {
        $client             = $this->prophesize(ClientInterface::class);
        $mattermost_webhook = new MattermostWebhook($client->reveal());
        $message            = new Message('exception');

        $client
            ->request('POST', '', ['json' => $message->getPayload()])
            ->willThrow(new MattermostWebhookException());

        self::expectException(MattermostWebhookException::class);

        $mattermost_webhook->send($message);
    }
}