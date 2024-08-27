<?php

namespace Discord\Command;

use Discord\Command\Option\Option;
use Discord\Enums\CommandType;
use Discord\Enums\ContextType;
use Discord\Enums\IntegrationType;
use Discord\Traits\MagicSetters;
use Discord\Traits\Arrayable;
use Illuminate\Support\Collection;

abstract class Command
{
  use Arrayable, MagicSetters;

  /** @var string */
  public $name;

  /** @var CommandType */
  public $type;

  /** @var string */
  public $description;

  /** @var bool */
  public $required;

  /** @var Collection */
  public $options;

  /** @var string */
  public $defaultMemberPermissions;

  /** @var bool */
  public $defaultPermissions;

  /** @var bool */
  public $nsfw;

  /** @var Collection */
  public $integrationTypes;

  /** @var Collection */
  public $contexts;

  /** @var string */
  public $version;

  public static function make(): self
  {
    return new static();
  }

  public function __construct()
  {
    $this->required = false;
    $this->options = collect();
    $this->integrationTypes = collect();
    $this->contexts = collect();
  }

  public function addOption(Option $option): self
  {
    $this->options = $this->options->push($option);

    return $this;
  }

  public function addIntegrationType(IntegrationType $integrationType): self
  {
    $this->integrationTypes = $this->integrationTypes->push($integrationType);

    return $this;
  }

  public function addContext(ContextType $context): self
  {
    $this->contexts = $this->contexts->push($context);

    return $this;
  }

  public function toArray(): array
  {
    return [
      "name" => $this->name,
      "type" => $this->type->value,
      "description" => $this->description,
      "required" => $this->required,
      "options" => $this->options
        ->map(fn(Option $option) => $option->toArray())
        ->toArray(),
      "default_member_permissions" => $this->defaultMemberPermissions,
      "default_permission" => $this->defaultPermissions,
      "nsfw" => $this->nsfw,
      "integration_types" => $this->integrationTypes
        ->map(fn(IntegrationType $type) => $type->value)
        ->toArray(),
      "contexts" => $this->contexts
        ->map(fn(ContextType $type) => $type->value)
        ->toArray(),
      "version" => $this->version,
    ];
  }
}
