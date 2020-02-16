<?php

declare(strict_types=1);

namespace UnknownOre\FixMvts;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\network\mcpe\protocol\MovePlayerPacket;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginException;

class Main extends PluginBase implements Listener
{

    /**
     * @throws PluginException
     */
    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    /**
     * @param PlayerMoveEvent $event
     */
    public function onMove(PlayerMoveEvent $event): void
    {
        $player = $event->getPlayer();
        if (!$event->isCancelled()) {
            $player->sendPosition($player, $player->yaw, $player->pitch, MovePlayerPacket::MODE_NORMAL, $player->getViewers());
        }
    }
}
