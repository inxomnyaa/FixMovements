<?php

declare(strict_types=1);

namespace UnknownOre\FixMvts;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\network\mcpe\protocol\MovePlayerPacket;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {

	public function onEnable() : void{
	    $this->getServer()->getPluginManager()->registerEvents($this,$this);
	}
	public function onMove(PlayerMoveEvent $event){
	    $player = $event->getPlayer();
	    if(!$event->isCancelled()){
            $player->sendPosition($player, $player->yaw, $player->pitch, MovePlayerPacket::MODE_NORMAL, $player->getViewers());
        }
    }
}
