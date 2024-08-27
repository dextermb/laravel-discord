<?php

namespace Discord\Traits;

trait Arrayable
{
  abstract public function toArray(): array;

  public function toJson(): array
  {
    return $this->toArray();
  }
}
