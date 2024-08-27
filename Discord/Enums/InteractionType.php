<?php

namespace Discord\Enums;

use App\Traits\MatchingValues;

enum InteractionType: int
{
  use MatchingValues;

  case PING = 1;
  case APPLICATION_COMMAND = 2;
  case MESSAGE_COMPONENT = 3;
  case APPLICATION_COMMAND_AUTOCOMPLETE = 4;
  case MODAL_SUBMIT = 5;
}
