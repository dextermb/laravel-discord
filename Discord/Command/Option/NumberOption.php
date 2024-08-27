<?php

namespace Discord\Command\Option;

use Discord\Enums\OptionType;

class NumberOption extends Option
{
  public $type = OptionType::NUMBER;
}
