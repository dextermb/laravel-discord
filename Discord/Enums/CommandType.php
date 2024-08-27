<?php

namespace Discord\Enums;

enum CommandType: int
{
  case CHAT_INPUT = 1;
  case USER = 2;
  case MESSAGE = 3;
}
