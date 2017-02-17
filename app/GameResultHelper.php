<?php
namespace App;

class GameResultHelper
{
    public function calculateResultRate(GameResult $gameResult)
    {
        $game = Game::findOrFail($gameResult->for_game_id);
        if (!$game->owner_etalon_result instanceof GameResult) {
            return -1;
        }
        $etalonResults = $game->owner_etalon_result->results;
        if ($game->owner_etalon_result->background_width < 1 || $game->owner_etalon_result->background_height < 1) {
            return -1;
        }
        $etalonNumberOfImages = $etalonResults->count();
        if ($etalonNumberOfImages < 1) {
            throw new \BadMethodCallException('etalon number of images < 1');
        }
        $calculatingResults = $gameResult->results;
        $numberOfImagesInCalculatedResult = $calculatingResults->count();
        if ($numberOfImagesInCalculatedResult < 1) {
            throw new \BadMethodCallException('number of images in game result < 1');
        }
        $maxCountOfImages = $numberOfImagesInCalculatedResult;
        if($etalonNumberOfImages > $numberOfImagesInCalculatedResult){
            $maxCountOfImages = $etalonNumberOfImages;
        }
        $maxPointsPerImage = 100 / $maxCountOfImages;
        $xScale = $game->owner_etalon_result->background_width / $gameResult->background_width;
        $yScale = $game->owner_etalon_result->background_height / $gameResult->background_height;
        $calculatingResults = $calculatingResults->toArray();
        $resultRateForEachImage = [];
        $usedCalculatedResults = [];
        foreach ($etalonResults as $etalonResult) {
            foreach ($calculatingResults as $calculatingResult) {
                if ($etalonResult->for_image_id != $calculatingResult['for_image_id']) {
                    continue;
                }
                $xCoordinateRate = $maxPointsPerImage * (1 - (abs(($etalonResult->x_coordinate - ($calculatingResult['x_coordinate'] * $xScale))) / $game->owner_etalon_result->background_width));
                $yCoordinateRate = $maxPointsPerImage * (1 - (abs(($etalonResult->y_coordinate - ($calculatingResult['y_coordinate'] * $yScale))) / $game->owner_etalon_result->background_height));
                $totalImageRate = ($xCoordinateRate + $yCoordinateRate) / 2;
                if (isset($resultRateForEachImage[$etalonResult->id]) && $resultRateForEachImage[$etalonResult->id] > $totalImageRate) {
                    continue;
                } else {
                    $resultRateForEachImage[$etalonResult->id] = $totalImageRate;
                    $usedCalculatedResults[$etalonResult->id] = $calculatingResult['id'];
                }
            }
            // clean array from user results
            foreach ($calculatingResults as $key => $calculatingResult) {
                if ($usedCalculatedResults[$etalonResult->id] == $calculatingResult['id']) {
                    unset($calculatingResults[$key]);
                }
            }
        }
        return array_sum($resultRateForEachImage);
    }
}