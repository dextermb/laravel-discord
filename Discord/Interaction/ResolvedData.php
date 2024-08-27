<?php

namespace Discord\Interaction;

use Discord\Traits\InjestUserInput;
use Illuminate\Support\Collection;

class ResolvedData
{
  use InjestUserInput;

  /** @var User[]|Collection */
  public $users;

  /** @var array */
  public $members;

  /** @var array */
  public $roles;

  /** @var array */
  public $channels;

  /** @var array */
  public $messages;

  /** @var array */
  public $attachments;

  protected function transform(string $key, mixed $value)
  {
    switch ($key) {
      case "users":
        return collect(
          array_map(fn(array $value) => User::from($value), $value)
        );
      default:
        return $value;
    }
  }
}
