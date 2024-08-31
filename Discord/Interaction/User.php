<?php

namespace Discord\Interaction;

use Discord\Enums\PremiumType;
use Discord\Traits\InjestUserInput;

class User
{
  use InjestUserInput;

  /** @var int */
  public $id;

  /** @var string */
  public $username;

  /** @var string */
  public $discriminator;

  /** @var string */
  public $globalName;

  /** @var string */
  public $avatar;

  /** @var bool */
  public $bot;

  /** @var bool */
  public $system;

  /** @var bool */
  public $mfaEnabled;

  /** @var string */
  public $banner;

  /** @var int */
  public $accentColor;

  /** @var string */
  public $locale;

  /** @var bool */
  public $verified;

  /** @var string */
  public $email;

  /** @var int */
  public $flags;

  /** @var int */
  public $premiumType;

  /** @var int */
  public $publicFlags;

  /** @var array */
  public $avatarDecorationData;

  protected function transform(string $key, mixed $value): mixed
  {
    switch ($key) {
      case "premium_type":
        return PremiumType::from($value);
      default:
        return $value;
    }
  }
}
