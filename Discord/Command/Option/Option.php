<?php

namespace Discord\Command\Option;

use Discord\Command\Choice\Choice;
use Discord\Enums\ChannelType;
use Discord\Enums\OptionType;
use Discord\Traits\MagicSetters;
use Discord\Traits\Arrayable;
use Illuminate\Support\Collection;

abstract class Option
{
  use Arrayable, MagicSetters;

  /** @var OptionType */
  public $type;

  /** @var string */
  public $name;

  /** @var string */
  public $description;

  /** @var bool */
  public $required;

  /** @var Collection */
  public $choices;

  /** @var Collection */
  public $options;

  /** @var Collection */
  public $channelTypes;

  /** @var int */
  public $minValue;

  /** @var int */
  public $maxValue;

  /** @var int */
  public $minLength;

  /** @var int */
  public $maxLength;

  public static function make(): self
  {
    return new static();
  }

  public function __construct()
  {
    $this->required = false;
    $this->choices = collect();
    $this->options = collect();
    $this->channelTypes = collect();
  }

  public function choices(Choice ...$choices): self
  {
    $this->choices = collect($choices);

    return $this;
  }

  public function addChoice(Choice $choice): self
  {
    $this->choices = $this->choices->push($choice);

    return $this;
  }

  public function addOption(Option $option): self
  {
    $this->options = $this->options->push($option);

    return $this;
  }

  public function addChannelType(ChannelType $channelType): self
  {
    $this->channelTypes = $this->channelTypes->push($channelType);

    return $this;
  }

  public function toArray(): array
  {
    return [
      "name" => $this->name,
      "type" => $this->type->value,
      "description" => $this->description,
      "required" => $this->required,
      "choices" => $this->choices
        ->map(fn(Choice $choice) => $choice->toArray())
        ->toArray(),
      "options" => $this->options
        ->map(fn(Option $option) => $option->toArray())
        ->toArray(),
      "channel_types" => $this->channelTypes
        ->map(fn(ChannelType $type) => $type->value)
        ->toArray(),
      "min_value" => $this->minValue,
      "max_value" => $this->maxValue,
      "min_length" => $this->minLength,
      "max_length" => $this->maxLength,
    ];
  }
}
