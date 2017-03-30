<?php

namespace App\Services;

use App\Game;
use App\Player;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class FCMService
{
    /**
     * Send Notification To Game Owner after Player join the game.
     *
     * @param  Game $game
     * @param  Player $joinedPlayer
     */
    public function sendNotificationToGameOwnerAfterPlayerJoinTheGame(Game $game, Player $joinedPlayer)
    {
        $token = $game->owner->device_token;
        if ($token == null) {
            return;
        }
        $title = 'New player join ' . $game->name;
        $body = 'Player ' . $joinedPlayer->nickname . ' join game ' . $game->name;

        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['type' => 'player_joined']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
    }

    public function sendNotificationToAllGamePlayersAndGameOwnerAfterPlayerJoinTheGame(Game $game, Player $joinedPlayer)
    {
        $tokens = [];
        foreach ($game->players as $player) {
            if (empty($player->device_token) || $player->id == $game->owner->id) {
                continue;
            }
            $tokens[] = $player->device_token;
        }
        if (!empty($game->owner->device_token)) {
            $tokens[] = $game->owner->device_token;
        }
        if (count($tokens) < 1) {
            return;
        }
        $title = 'New player join ' . $game->name;
        $body = 'Player ' . $joinedPlayer->nickname . ' join game ' . $game->name;

        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['type' => 'player_joined']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
    }

    /**
     * Send Notification to all game players about game was started by owner.
     *
     * @param  Game $game
     */
    public function sendNotificationToPlayersAboutGameStarted(Game $game)
    {
        $tokens = [];
        foreach ($game->players as $player) {
            if ($player->device_token == null || $player->device_token == '' || $player->id == $game->owner->id) {
                continue;
            }
            $tokens[] = $player->device_token;
        }
        if (count($tokens) < 1) {
            return;
        }
        $title = 'Game ' . $game->name . ' started!';
        $body = 'Game ' . $game->name . ' started!';

        $optionBuiler = new OptionsBuilder();
        $optionBuiler->setTimeToLive(60 * 20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['type' => 'game_started']);

        $option = $optionBuiler->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
    }

}