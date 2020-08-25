<?php

namespace Afip\NumberGame;


use afip\NumberGame\LevelInterface;
use afip\NumberGame\GameErrorInterface;
use afip\NumberGame\ErrorMangerInterface;
use afip\NumberGame\HelperInterface;

class Game implements GameInterface
{
private $_Helper;
private $_Error;
private $_Level;
private $number;

public function __constrcut()
{
    $this->_Helper = new Helper();
    $this->_Error  = new ErrorManager();
    $this->_Level = new Level();
    $this->number = $this->_Helper-> getRandomNumberBetween(0,100);
    $this->start();
}

    public function start(){
        $toursNumbers = $this->prepareGame();
        $isCorrect = false;
        
        for($i = 0 ; $i< $toursNumbers; $i++){
            $isCorrect = $this->gameTurn();
            if($isCorrect === true){
                $i = $toursNumbers;

            }

        }
        endGame($isCorrect);
    }

    private function prepareGame(): int{
       
        $levelEntered  = $this->_Helper->getInput('Enter a level ('.implode(',',$this->_Level->levels).')');
        
        try{
            $this->_Error->checkLevel($levelEntered);
            $this->_Level->setLevel($levelEntered);
            $turns =  $this->_Level->getMaxAttempts();
            return $turns;

        }catch (Exception $e) {
            $this->_Helper->output($e->getMessage());
            $this->prepareGame();
        }


    }
    private function gameTurn(): bool{
        
        $NumberEntered  = $this->_Helper->getInput('Enter a number between 0 and 100');
        try{
            $this->_Error->checkInput($NumberEntered);
            $result = false;
            if($NumberEntered > $this->number){
                $this->_Helper->output('The mystery number is inferior');
            } elseif($NumberEntered < $this->number){
                $this->_Helper->output('The mystery number is superior');
            }else{
                $this->_Helper->output('You found the mystery number !');
                $result = true;
            }
            return($result);
        } catch (Exception $e) {
            $this->_Helper->output($e->getMessage());
            $this->gameTurn();
        }
        

    }

    private function endGame($isWinner): void{
       
        if($isWinner){
            $this->_Helper->output('(/\'-\')/ You are the winner !!!!! \\(\'-\'\)');
        }else{
            $this->_Helper->output('You lost !!!!!');
        }
        $this->_Helper->getInput('Press "Enter" to end');
        
    }

}