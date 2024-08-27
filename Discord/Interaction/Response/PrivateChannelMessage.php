<?php

namespace Discord\Interaction\Response;

use Discord\Enums\InteractionResponseFlags;

class PrivateChannelMessage extends Message
{
  public $flags = InteractionResponseFlags::EPHEMERAL;
}
