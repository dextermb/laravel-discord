<?php

namespace Discord;

use Discord\Command\Command;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CommandClient
{
  const BASE_URI = "https://discord.com/api/v10";

  public function registerGlobalCommand(Command $command): Response
  {
    return Http::withHeaders($this->headers())->post(
      $this->endpoint("/commands"),
      $this->prune($command->toJson())
    );
  }
  /**
   * @return array<string,string>
   */
  protected function headers(): array
  {
    $token = config("services.discord.token");

    return [
      "authorization" => "Bot $token",
    ];
  }

  protected function endpoint(string $path): string
  {
    $baseUri = self::BASE_URI;
    $applicationId = config("services.discord.application");

    return "$baseUri/applications/$applicationId/$path";
  }
  /**
   * @param array<int,mixed> $data
   * @return array<int,mixed>
   */
  protected function prune(array $data): array
  {
    foreach ($data as $key => &$value) {
      if (is_array($value) && !empty($value)) {
        $this->prune($value);

        continue;
      }

      if (is_array($value) && empty($value)) {
        unset($data[$key]);
      }

      if (is_null($value)) {
        unset($data[$key]);
      }
    }

    return $data;
  }
}
