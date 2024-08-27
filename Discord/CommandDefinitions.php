<?php

namespace Discord;

use Discord\Commands\Command;
use Discord\Commands\CreateItemGoal;
use Discord\Commands\CreateNpcGoal;
use Discord\Commands\CreateXpGoal;
use Discord\Commands\GetApiKey;
use Illuminate\Support\Collection;

class CommandDefinitions
{
  const COMMANDS = [
    GetApiKey::class,
    CreateItemGoal::class,
    CreateNpcGoal::class,
    CreateXpGoal::class,
  ];

  /**
   * @return Collection<int,string>
   */
  public static function all(): Collection
  {
    return collect(static::COMMANDS);
  }

  public static function get(string $name): Command|null
  {
    foreach (self::COMMANDS as $command) {
      if ($command::$name === $name) {
        return new $command();
      }
    }

    return null;
  }
}
