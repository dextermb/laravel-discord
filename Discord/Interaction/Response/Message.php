<?php

namespace Discord\Interaction\Response;

use Discord\Enums\InteractionResponseFlags;
use Discord\Enums\InteractionResponseType;

abstract class Message extends Response
{
  public $type = InteractionResponseType::CHANNEL_MESSAGE_WITH_SOURCE;

  /** @var bool */
  public $tts;

  /** @var string */
  public $content;

  /** @var array */
  public $embeds;

  /** @var mixed */
  public $allowedMentions;

  /** @var InteractionResponseFlags */
  public $flags;

  /** @var array */
  public $components;

  /** @var array */
  public $attachments;

  /** @var mixed */
  public $poll;

  public function data(): array
  {
    return [
      "tts" => $this->tts,
      "content" => $this->content,
      "embeds" => $this->embeds,
      "allowed_mentions" => $this->allowedMentions,
      "flags" => $this->flags->value,
      "components" => $this->components,
      "attachments" => $this->attachments,
      "poll" => $this->poll,
    ];
  }

  public function toArray(): array
  {
    return [
      "type" => $this->type,
      "data" => $this->data(),
    ];
  }
}
