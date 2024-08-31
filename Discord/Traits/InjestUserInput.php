<?php

namespace Discord\Traits;

use Str;

trait InjestUserInput
{
  public static function from(array $data): static
  {
    $instance = new static();

    foreach ($data as $key => $value) {
      $prop = Str::camel($key);

      if (property_exists($instance, $prop)) {
        $instance->{$prop} = $instance->transform($key, $value);
      }
    }

    return $instance;
  }

  protected function transform(string $key, mixed $value): mixed
  {
    return $value;
  }
}
