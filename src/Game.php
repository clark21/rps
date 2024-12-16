<?php

include_once(__DIR__ . '/Player.php');

/**
 * Game Class
 */
class Game {
    /**
     * game choices
     */
    protected static $choices = [
        'rock',
        'paper',
        'scissor'
    ];

    protected $players = [];
    protected $draw = 0;

    /**
     * get game choices
     *
     * @returns array
     */
    public static function getChoices() {
        return self::$choices;
    }

    /**
     * Add game player
     *
     * @params Player $player
     * @returns $this
     */
    public function addPlayer(Player $player) {
        $this->players[] = $player;
        return $this;
    }

    /**
     * get draw results
     *
     * @returns integer
     */
    public function getDrawResult() {
        return $this->draw;
    }

    /**
     * starts the game
     *
     * @params integer $rounds
     * @returns void
     */
    public function start(Int $rounds = 1) {
        if (count($this->players) != 2) {
            throw new \Exception("We need two players to start the game");
        }

        for($i = 0; $i < $rounds; $i++) {
            echo sprintf("Round %s...\n", $i + 1);
            $hands = [];
            foreach ($this->players as $player) {
                $hand = $player->play();
                $hands[] = $hand;
                echo sprintf("%s uses %s.\n", ucwords($player->getName()), ucwords($hand));
            }
            
            // compare hands
            $winner = $this->processResults($hands);
            
            // no winner, means this is a draw
            if ($winner == null) {
                echo "This round is a draw...\n\n\n";
                continue;
            }
            
            // winner is a player object
            // but just incase, lets process the logic inside try catch
            try {
                $winner->addScore();
                echo sprintf("%s wins this round.\n\n\n", $winner->getName());
            } catch (\Exception $e) {
                echo sprintf("Something went wrong! Cannot figure out whose the winner for round %s\n\n\n", $i+1);
            }
        }

    }

    /**
     * compare hands / process results
     *
     * @param array $hads
     * @returns Player|null
     */
    private function processResults($hands) {
        list($handOne, $handTwo) = $hands;
        // check if the same,
        // this means draw
        if ($handOne === $handTwo) {
              $this->draw++;
              return null;
        }

        $winningCombinations = [
            'rock' => 'scissor',
            'scissor' => 'paper',
            'paper' => 'rocket'
        ];

        if ($winningCombinations[$handOne] == $handTwo) {
            return $this->players[0];
        }

        return $this->players[1];
    }
}
