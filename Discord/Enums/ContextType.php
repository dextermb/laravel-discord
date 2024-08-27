<?php

namespace Discord\Enums;

enum ContextType: int
{
  case GUILD = 0;
  case BOT_DOM = 1;
  case PRIVATE_CHANNEL = 2;
}
