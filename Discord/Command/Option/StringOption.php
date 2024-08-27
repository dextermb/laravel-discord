<?php

namespace Discord\Command\Option;

use Discord\Enums\OptionType;

class StringOption extends Option
{
  public $type = OptionType::STRING;
}
