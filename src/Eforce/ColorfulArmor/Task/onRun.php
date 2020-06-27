<?php

declare(strict_types=1);

 
namespace Eforce\ColorfulArmor\Task; 

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\scheduler\Task;

use Eforce\ColorfulArmor\Loader;
use Eforce\ColorfulArmor\Commands;

use pocketmine\item\Item;
use pocketmine\utils\Color;


class onRun extends Task
{
    
    private $plugin;
    private $player;


    public function __construct(Loader $plugin, Player $player)
    {
        $this->player = $player;
        $this->plugin = $plugin;

    }
    
    public function setArmor()
    {
        //FOLLOWING the rainbow pattern, and no i'm not gay
        switch (mt_rand(0, 7)) 
        {
            case 0:
                $color = new Color(255, 0, 0);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);                   
                break;
            case 1:
                $color = new Color(255, 163, 42);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);      
                break;
            case 2:
                $color = new Color(255, 255, 255);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);                   
                break;
            case 3:
                $color = new Color(45,171,32);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);
                
                break;
            case 4:
                $color = new Color(35,173,207);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);                
                break;
            case 5:
                $color = new Color(0,17,167);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);
                
                break;
            case 6:
                $color = new Color(87,1,146);
                $h = Item::get(298, 0, 1);
                $c = Item::get(299, 0, 1);
                $l = Item::get(300, 0, 1);
                $b = Item::get(301, 0, 1);
                
                $h->setCustomColor($color);
                $c->setCustomColor($color);
                $l->setCustomColor($color);
                $b->setCustomColor($color);
                
                $this->player->getArmorInventory()->setHelmet($h);
                $this->player->getArmorInventory()->setChestplate($c);
                $this->player->getArmorInventory()->setLeggings($l);
                $this->player->getArmorInventory()->setBoots($b);               
        }
    }
    
    /**
     * thanks to fadhel or dim
     * 
     * if ($this->plugin->colormode[$this->player->getName()] !== "none") {
     * 
     *https://github.com/DimBis/FadMad/blob/master/src/Fadhel/Core/utils/tasks/Others/Fight.php
    */
    
    public function onRun(int $currentTick)
    {
        if ($this->plugin->colormode[$this->player->getName()] === "on") {
            $this->setArmor($this->player);
        }elseif ($this->plugin->colormode[$this->player->getName()] === "none") {
            $this->plugin->getScheduler()->cancelTask($this->getTaskId());
            $this->player->getArmorInventory()->clearAll();
            //just to make sure
            $this->plugin->colormode[$this->player->getName()] = "none"; 
        }
    }
}
