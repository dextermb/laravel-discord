<?php

namespace Discord\Traits;

trait MatchingValues
{
  public function equals(int $value)
  {
    return $this->value === $value;
  }
}
