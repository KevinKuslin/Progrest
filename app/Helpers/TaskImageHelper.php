<?php

namespace App\Helpers;

class TaskImageHelper
{
    public static function randomPlaceholder()
    {
        $images = [
            '/images/task-placeholders/task1.jpg',
            '/images/task-placeholders/task2.jpg',
            '/images/task-placeholders/task3.jpg',
            '/images/task-placeholders/task4.jpg',
            '/images/task-placeholders/task5.jpg',
            '/images/task-placeholders/task6.jpg',
            '/images/task-placeholders/task7.jpeg',
            '/images/task-placeholders/task8.jpg',
            '/images/task-placeholders/task9.jpg',
            '/images/task-placeholders/task10.jpg',
        ];

        return $images[array_rand($images)];
    }
}