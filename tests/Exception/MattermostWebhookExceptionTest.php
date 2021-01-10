<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

use Nutama\MattermostWebhook\Exception\MattermostWebhookException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Nutama\MattermostWebhook\Exception\MattermostWebhookException
 */
final class MattermostWebhookExceptionTest extends TestCase
{
    /**
     * @var MattermostWebhookException
     */
    private $exception;

    protected function setUp(): void
    {
        $this->exception = new MattermostWebhookException();
    }

    public function testObject(): void
    {
        self::assertSame('', $this->exception->getMessage());
        self::assertSame(0, $this->exception->getCode());
        self::assertNull($this->exception->getPrevious());
    }
}
