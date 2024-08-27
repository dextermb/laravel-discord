<?php

namespace Discord\Command\Option;

use Discord\Enums\OptionType;

class BooleanOption extends Option
{
  public $type = OptionType::BOOLEAN;
}
