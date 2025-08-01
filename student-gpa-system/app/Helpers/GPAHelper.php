<?php

namespace App\Helpers;

class GPAHelper
{
    public static function getLetterGrade($score)
    {
        return match (true) {
            $score >= 90 => 'A+',
            $score >= 85 => 'A',
            $score >= 80 && $score < 85 => 'A-',
            $score >= 75 => 'B+',
            $score >= 70 && $score < 75 => 'B',
            $score >= 65 => 'B-',
            $score >= 60 && $score < 65 => 'C',
            $score >= 55 && $score < 60 => 'D',
            default => 'F',
        };
    }

    public static function getGradePoint($letter)
    {
        return [
            'A' => 4.0,
            'B' => 3.0,
            'C' => 2.0,
            'D' => 1.0,
            'F' => 0.0,
        ][$letter] ?? 0.0;
    }

    public static function calculateGPA($scores)
    {
        if (count($scores) == 0) return 0;
        $totalPoints = 0;
        foreach ($scores as $score) {
            $letter = self::getLetterGrade($score->score);
            $totalPoints += self::getGradePoint($letter);
        }
        return round($totalPoints / count($scores), 2);
    }
}
