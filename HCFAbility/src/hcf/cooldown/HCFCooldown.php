<?php

namespace hcf\cooldown;

use pocketmine\player\Player;

final class HCFCooldown {
  
  private array $cooldown = [
    'Speed' => [],
    ];
  
  public static function inCooldown(string $type, string $player): bool
    {
        if (isset($this->cooldowns[$type]) && isset($this->cooldowns[$type][$player])) {
            return $this->cooldowns[$type][$player] > time();
        }
        return false;
    }

    public static function getCooldown(string $type, string $player): int
    {
        return $this->cooldowns[$type][$player] - time();
    }

    public static function addCooldown(string $type, string $player, int $time): void
    {
        $this->cooldowns[$type][$player] = time() + $time;
    }
}
?>