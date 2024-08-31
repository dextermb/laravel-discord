<?php

namespace Discord\Interaction;

use Discord\Enums\ContextType;
use Discord\Enums\InteractionType;
use Discord\Traits\InjestUserInput;

class Interaction
{
  use InjestUserInput;

  /** @var int */
  public $id;

  /** @var int */
  public $applicationId;

  /** @var InteractionType */
  public $type;

  /** @var Data */
  public $data;

  /** @var array */
  public $guild;

  /** @var int */
  public $guildId;

  /** @var array */
  public $channel;

  /** @var int */
  public $channelId;

  /** @var Member */
  public $member;

  /** @var array */
  public $user;

  /** @var string */
  public $token;

  /** @var int */
  public $version;

  /** @var Message */
  public $message;

  /** @var string */
  public $appPermissions;

  /** @var string */
  public $locale;

  /** @var string */
  public $guildLocale;

  /** @var array */
  public $entitlements;

  /** @var array */
  public $authorizingIntegrationOwners;

  /** @var ContextType */
  public $context;

  protected function transform(string $key, mixed $value): mixed
  {
    switch ($key) {
      case "type":
        return InteractionType::from($value);
      case "context":
        return ContextType::from($value);
      case "member":
        return Member::from($value);
      case "data":
        return Data::from($value);
      case "message":
        return Message::from($value);
      default:
        return $value;
    }
  }
}
