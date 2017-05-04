<?php
declare(strict_types=1);
namespace Nutama\MattermostWebhook;

final class Message implements MessageInterface
{
    /**
     * Message that will be shown by the bot.
     *
     * @var string
     */
    private $text;

    /**
     * Channel where the message will be shown.
     *
     * @var string
     */
    private $channel;

    /**
     * Username of the bot.
     *
     * Option "Enable integrations to override usernames" must be enabled
     * on the server to override the shown username.
     *
     * @var string
     */
    private $username;

    /**
     * Image url to use as the profile picture of the bot.
     *
     * Option "Enable integrations to override profile picture icons" must be enabled
     * on the server to override the profile picture.
     *
     * @var string
     */
    private $icon_url;

    /**.
     * @param string $text
     */
    public function __construct(string $text)
    {
        $this->text = $text;
    }

    /**
     * @param string $channel
     * @return Message
     */
    public function setChannel(string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @param string $username
     * @return Message
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param string $icon_url
     * @return Message
     */
    public function setIconUrl(string $icon_url): self
    {
        $this->icon_url = $icon_url;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload(): array
    {
        return array_filter(
            [
                'text'     => $this->text,
                'channel'  => $this->channel,
                'username' => $this->username,
                'icon_url' => $this->icon_url,
            ]
        );
    }
}
