<?php

namespace Discord\Interaction\Message;

use Discord\Traits\InjestUserInput;

class Interaction
{
  use InjestUserInput;

  /** @var string */
  public $id;

  /** @var string */
  public $name;

  /** @var int */
  public $type;
}
