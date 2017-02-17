<?php
namespace App;

class GameResultHelper
{
    public function calculateResultRate(GameResult $gameResult)
    {
        $game = Game::findOrFail($gameResult->for_game_id);
        $etalonResults = $game->owner_etalon_result->results;
        $etalonNumberOfImages = $etalonResults->count();
        if ($etalonNumberOfImages < 1) {
            throw new \BadMethodCallException('etalon number of images < 1');
        }
        $calculatingResults = $gameResult->results;
        $numberOfImagesInCalculatedResult = $calculatingResults->count();
        if ($numberOfImagesInCalculatedResult < 1) {
            throw new \BadMethodCallException('number of images in game result < 1');
        }

        $maxPointsPerImage = 100 / $numberOfImagesInCalculatedResult;
        $xScale = $game->owner_etalon_result->background_width / $gameResult->background_width;
        $yScale = $game->owner_etalon_result->background_height / $gameResult->background_height;
        $calculatingResults = $calculatingResults->toArray();
        $resultRateForEachImage = [];
        foreach ($etalonResults as $etalonResult) {
            foreach ($calculatingResults as $key => $calculatingResult) {
                if ($etalonResult->for_image_id != $calculatingResult['for_image_id']) {
                    continue;
                }
                $xCoordinateRate = $maxPointsPerImage * (1 - (abs(($etalonResult->x_coordinate - ($calculatingResult['x_coordinate'] * $xScale))) / $game->owner_etalon_result->background_width));
                $yCoordinateRate = $maxPointsPerImage * (1 - (abs(($etalonResult->y_coordinate - ($calculatingResult['y_coordinate'] * $yScale))) / $game->owner_etalon_result->background_height));
                $totalImageRate = ($xCoordinateRate + $yCoordinateRate) / 2;
                if (isset($resultRateForEachImage[$calculatingResult['id']]) && $resultRateForEachImage[$calculatingResult['id']] > $totalImageRate) {
                    continue;
                } else {
                    $resultRateForEachImage[$calculatingResult['id']] = $totalImageRate;
                }
                unset($calculatingResults[$key]);
            }
        }
        return array_sum($resultRateForEachImage);
    }
}