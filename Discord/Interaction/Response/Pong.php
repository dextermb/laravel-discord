<?php

namespace Discord\Interaction\Response;

use Discord\Enums\InteractionResponseType;

class Pong extends Response
{
  public $type = InteractionResponseType::PONG;

  public function toArray(): array
  {
    return [
      "type" => $this->type->value,
    ];
  }
}
