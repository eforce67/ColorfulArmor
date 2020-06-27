<?php

/**
 * Author: Eforce
 * 
 *This plugin is my second public plugin
 * besides anti advertise which i later
 * deleted on my youtube channel.
 * 
 * Anyways i hope you enjoy my work!
 * 
 * this plugin was created using 
 * phpstorm, version 2019.3.1, build 193
 * .5662.63 18 December 2019
 */

declare(strict_types=1);


namespace Eforce\ColorfulArmor; 

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;

use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

use Eforce\ColorfulArmor\Commands;
use Eforce\ColorfulArmor\Task\onRun;


class Loader extends PluginBase implements Listener {
    
    public function onEnable(): void{
        
        @mkdir($this->getDataFolder());
        $config = $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->check();
        $this->getServer()->getLogger()->info(TextFormat::GREEN . " Enabled");

        }
        
        public function check()
        {
            $this->getServer()->getCommandMap()->register("colorarmor", $this->commands[] = new Commands($this));
        }
        
        public function createTask(Player $player){
			$this->colormode[$player->getName()] = "on";
            $this->getScheduler()->scheduleRepeatingTask(new onRun($this, $player), 20);

        }
        
        public function onQuit(\pocketmine\event\player\PlayerQuitEvent $event)
        {
            $this->colormode[$event->getPlayer()->getName()] = "none"; 

        }
        
        public function onDisable(){
            $this->getServer()->getLogger()->info(TextFormat::RED . " Disabled");
        }
    }
    
?>
