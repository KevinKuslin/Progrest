<?php

namespace Database\Seeders;

use App\Models\TaskCollaboration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskCollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $records = [

            // AquaVerse
            [
                'task_id' => 2,
                'user_id' => 5,
                'status' => 'completed',
                'reward_earned' => 12,
                'joined_at' => Carbon::parse('2026-07-18'),
                'completed_at' => Carbon::parse('2026-07-24'),
            ],

            // MindSpace
            [
                'task_id' => 8,
                'user_id' => 1,
                'status' => 'in_progress',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-07-12'),
                'completed_at' => null,
            ],

            [
                'task_id' => 10,
                'user_id' => 1,
                'status' => 'completed',
                'reward_earned' => 18,
                'joined_at' => Carbon::parse('2026-08-01'),
                'completed_at' => Carbon::parse('2026-08-09'),
            ],

            // CookEase
            [
                'task_id' => 14,
                'user_id' => 2,
                'status' => 'in_progress',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-07-18'),
                'completed_at' => null,
            ],

            [
                'task_id' => 15,
                'user_id' => 5,
                'status' => 'completed',
                'reward_earned' => 18,
                'joined_at' => Carbon::parse('2026-07-28'),
                'completed_at' => Carbon::parse('2026-08-03'),
            ],

            [
                'task_id' => 17,
                'user_id' => 1,
                'status' => 'declined',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-06-10'),
                'completed_at' => null,
            ],

            [
                'task_id' => 18,
                'user_id' => 2,
                'status' => 'in_progress',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-09-10'),
                'completed_at' => null,
            ],

            // EcoTrack
            [
                'task_id' => 31,
                'user_id' => 2,
                'status' => 'completed',
                'reward_earned' => 35,
                'joined_at' => Carbon::parse('2026-07-05'),
                'completed_at' => Carbon::parse('2026-07-19'),
            ],

            [
                'task_id' => 32,
                'user_id' => 2,
                'status' => 'declined',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-08-15'),
                'completed_at' => null,
            ],

            [
                'task_id' => 34,
                'user_id' => 5,
                'status' => 'in_progress',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-07-05'),
                'completed_at' => null,
            ],

            [
                'task_id' => 36,
                'user_id' => 2,
                'status' => 'in_progress',
                'reward_earned' => 0,
                'joined_at' => Carbon::parse('2026-09-18'),
                'completed_at' => null,
            ],
        ];

        foreach ($records as $record) {
            TaskCollaboration::create($record);
        }
    }
}
