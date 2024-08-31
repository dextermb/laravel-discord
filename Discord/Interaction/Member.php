<?php

namespace Discord\Interaction;

use Discord\Enums\GuildMemberFlags;
use Discord\Traits\InjestUserInput;

class Member
{
  use InjestUserInput;

  /** @var User */
  public $user;

  /** @var string */
  public $nick;

  /** @var mixed */
  public $avatar;

  /** @var string[] */
  public $roles;

  /** @var string */
  public $joinedAt;

  /** @var string */
  public $premiumSince;

  /** @var bool */
  public $deaf;

  /** @var bool */
  public $mute;

  /** @var mixed */
  public $flags;

  /** @var bool */
  public $pending;

  /** @var string */
  public $permissions;

  /** @var string */
  public $communicationDisabledUntil;

  /** @var mixed */
  public $avatarDecorationData;

  protected function transform(string $key, mixed $value): mixed
  {
    switch ($key) {
      case "user":
        return User::from($value);
      case "flags":
        return GuildMemberFlags::from($value);
      default:
        return $value;
    }
  }
}
