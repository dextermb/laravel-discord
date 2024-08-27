<?php

namespace Discord\Interaction;

use Discord\Traits\InjestUserInput;

class Message
{
  use InjestUserInput;

  /** @var int */
  public $id;

  /** @var int */
  public $channel_id;
}
