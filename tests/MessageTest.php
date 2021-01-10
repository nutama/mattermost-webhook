<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Nutama\MattermostWebhook\Message
 */
final class MessageTest extends TestCase
{
    /**
     * @dataProvider getPayloadProvider
     *
     * @param array $expected_payload
     * @param MessageInterface $message
     */
    public function testGetPayload(array $expected_payload, MessageInterface $message): void
    {
        self::assertSame($expected_payload, $message->getPayload());
    }

    public function getPayloadProvider(): array
    {
        return [
            [
                ['text' => 'string'],
                new Message('string')
            ],
            [
                [
                    'text'    => 'detached',
                    'channel' => 'coco',
                ],
                (new Message('detached'))->setChannel('coco')
            ],
            [
                [
                    'text'     => 'card',
                    'username' => 'cable',
                ],
                (new Message('card'))->setUsername('cable')
            ],
            [
                [
                    'text'     => 'momentum',
                    'channel'  => 'bank',
                    'username' => 'wire',
                    'icon_url' => 'less',
                ],
                (new Message('momentum'))->setIconUrl('less')->setUsername('wire')->setChannel('bank')
            ],
        ];
    }
}