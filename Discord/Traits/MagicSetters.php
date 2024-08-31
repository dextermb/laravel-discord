<?php

namespace Discord\Traits;

use Discord\Exceptions\NotImplementedException;

trait MagicSetters
{
  public function __call(string $name, array $arguments): self
  {
    if (property_exists($this, $name)) {
      $this->{$name} = $arguments[0];
    } else {
      throw new NotImplementedException(
        static::class + ":" + $name + " does not exist."
      );
    }

    return $this;
  }
}
