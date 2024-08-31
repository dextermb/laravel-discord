<?php

namespace Discord\Interaction;

use Discord\Enums\CommandType;
use Discord\Enums\ComponentType;
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

  /** @var ComponentType */
  public $componentType;

  /** @var string */
  public $customId;

  /** @var mixed */
  public $values;

  protected function transform(string $key, mixed $value): mixed
  {
    switch ($key) {
      case "type":
        return CommandType::from($value);
      case "component_type":
        return ComponentType::from($value);
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

  public function getOption(string $key, mixed $default = null): Option
  {
    /** @var Option|null */
    $option = $this->options->first(
      fn(Option $option) => $option->name === $key
    );

    if (is_null($option)) {
      return Option::from(["name" => $key, "value" => $default]);
    }

    return $option;
  }
}
