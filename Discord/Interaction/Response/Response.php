<?php

namespace Discord\Interaction\Response;

use Discord\Enums\InteractionResponseType;
use Discord\Traits\MagicSetters;
use Discord\Traits\Arrayable;

abstract class Response
{
  use Arrayable, MagicSetters;

  /** @var InteractionResponseType */
  public $type;

  public static function make()
  {
    return new static();
  }

  public function toArray(): array
  {
    return [
      "type" => $this->type->value,
    ];
  }
}
