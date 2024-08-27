<?php

namespace Discord\Command\Option;

use Discord\Enums\OptionType;

class IntegerOption extends Option
{
  public $type = OptionType::INTEGER;
}
