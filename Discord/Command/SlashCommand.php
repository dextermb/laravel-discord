<?php

namespace Discord\Command;

use Discord\Enums\CommandType;

class SlashCommand extends Command
{
  public $type = CommandType::CHAT_INPUT;
}
