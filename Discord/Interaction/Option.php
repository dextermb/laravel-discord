<?php

namespace Discord\Interaction;

use Discord\Enums\OptionType;
use Discord\Traits\InjestUserInput;
use Illuminate\Support\Collection;

class Option
{
  use InjestUserInput;

  /** @var string */
  public $name;

  /** @var OptionType */
  public $type;

  /** @var mixed */
  public $value;

  /** @var Option[]|Collection */
  public $options;

  /** @var bool */
  public $focused;

  public function __toString(): string
  {
    return $this->value;
  }

  protected function transform(string $key, mixed $value): mixed
  {
    switch ($key) {
      case "type":
        return OptionType::from($value);
      case "options":
        return collect(
          array_map(fn(array $value) => Option::from($value), $value)
        );
      default:
        return $value;
    }
  }
}
