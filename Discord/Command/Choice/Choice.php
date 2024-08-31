<?php

namespace Discord\Command\Choice;

use Discord\Traits\MagicSetters;
use Discord\Traits\Arrayable;

class Choice
{
  use Arrayable, MagicSetters;

  /** @var string */
  public $name;

  /** @var mixed */
  public $value;

  public static function make(): static
  {
    return new static();
  }

  public function toArray(): array
  {
    return [
      "name" => $this->name,
      "value" => $this->value,
    ];
  }
}
