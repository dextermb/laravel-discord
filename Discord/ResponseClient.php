<?php

namespace Discord;

use Discord\Interaction\Response\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ResponseClient
{
  public function do(Response $response): JsonResponse
  {
    return response()->json($response->toJson(), headers: $this->headers());
  }

  public function clientError(Response $response): JsonResponse
  {
    return response()->json(
      $response->toJson(),
      headers: $this->headers(),
      status: 422
    );
  }

  public function authError(): JsonResponse
  {
    return response()->json(status: 401);
  }

  public function verifySignature(): bool
  {
    $body = request()->getContent();
    $timestamp = request()->header("X-Signature-Timestamp");
    $signature = request()->header("X-Signature-Ed25519");
    $publicKey = env("DISCORD_PUBLIC_KEY");

    if (!$signature || !$timestamp || !$publicKey) {
      Log::warning(
        "verifySignature:missing signature, timestamp, or public key.",
        compact("signature", "timestamp", "publicKey")
      );

      return false;
    }

    if (!trim($signature, "0..9A..Fa..f") == "") {
      Log::warning("verifySignature:trimming signature has failed");

      return false;
    }

    return sodium_crypto_sign_verify_detached(
      sodium_hex2bin($signature),
      $timestamp . $body,
      sodium_hex2bin($publicKey)
    );
  }

  protected function headers(): array
  {
    return ["User-Agent" => "DiscordBot (" . env("APP_URL") . ", Laravel/11)"];
  }
}
