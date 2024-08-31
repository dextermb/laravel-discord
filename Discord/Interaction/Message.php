<?php

namespace Discord\Interaction;

use Discord\Interaction\Message\Interaction;
use Discord\Traits\InjestUserInput;

class Message
{
  use InjestUserInput;

  /** @var int */
  public $id;

  /** @var int */
  public $channel_id;

  /** @var Interaction */
  public $interaction;

  protected function transform(string $key, mixed $value): mixed
  {
    switch ($key) {
      case "interaction":
        return Interaction::from($value);
      default:
        return $value;
    }
  }
}
