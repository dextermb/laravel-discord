<?php

namespace Discord\Interaction;

use Discord\Enums\CommandType;
use Discord\Traits\InjestUserInput;
use Illuminate\Support\Collection;

class Data
{
  use InjestUserInput;

  /** @var int */
  public $id;

  /** @var string */
  public $name;

  /** @var CommandType */
  public $type;

  /** @var ResolvedData */
  public $resolved;

  /** @var Option[]|Collection */
  public $options;

  /** @var int */
  public $guildId;

  /** @var int */
  public $targetId;

  protected function transform(string $key, mixed $value)
  {
    switch ($key) {
      case "type":
        return CommandType::from($value);
      case "resolved":
        return ResolvedData::from($value);
      case "options":
        return collect(
          array_map(fn(array $value) => Option::from($value), $value)
        );
      default:
        return $value;
    }
  }
}
