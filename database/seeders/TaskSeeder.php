<?php

namespace Database\Seeders;

use App\Helpers\TaskImageHelper;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collab1 = User::firstWhere('id', '1'); 
        $collab2 = User::firstWhere('id', '2'); 
        $collab3 = User::firstWhere('id', '3'); 
        $collab4 = User::firstWhere('id', '4'); 
        $collab5 = User::firstWhere('id', '5'); 

        $project1 = Project::firstWhere('id', '1'); 
        $project2 = Project::firstWhere('id', '2'); 
        $project3 = Project::firstWhere('id', '3'); 
        $project4 = Project::firstWhere('id', '4'); 
        $project5 = Project::firstWhere('id', '5'); 
        $project6 = Project::firstWhere('id', '6'); 

        // AquaVerse (Project 1)

        $task1 = Task::create([
            'title' => 'Design Landing Page',
            'description' => 'Create the landing page UI for AquaVerse.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,

            'deadline' => Carbon::parse('2026-08-17'),
            'is_completed' => true,
            'project_id' => $project1->id,
        ]);
        $task1->users()->attach([$collab1->id, $collab3->id]);

        $task2 = Task::create([
            'title' => 'User Authentication',
            'description' => 'Implement login and registration.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Work together to implement authentication flows and security validation.',
            'go_collab_limit' => 2,
            'go_collab_reward' => 12,

            'deadline' => Carbon::parse('2026-07-25'),
            'is_completed' => true,
            'project_id' => $project1->id,
        ]);
        $task2->users()->attach([$collab4->id]);

        $task3 = Task::create([
            'title' => 'Marine Species Database',
            'description' => 'Populate the database with marine species.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Research and enter verified marine species collaboratively.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 18,

            'deadline' => Carbon::parse('2026-09-02'),
            'is_completed' => true,
            'project_id' => $project1->id,
        ]);
        $task3->users()->attach([$collab1->id]);

        $task4 = Task::create([
            'title' => 'Interactive Ocean Map',
            'description' => 'Build an interactive habitat map.',
            'priority' => 'medium',
            'status' => 'cancelled',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,

            'deadline' => Carbon::parse('2026-07-08'),
            'is_completed' => false,
            'project_id' => $project1->id,
        ]);
        $task4->users()->attach([$collab3->id]);

        $task5 = Task::create([
            'title' => 'Quiz Module',
            'description' => 'Develop educational quizzes.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Create quiz questions and verify scientific accuracy together.',
            'go_collab_limit' => 4,
            'go_collab_reward' => 20,

            'deadline' => Carbon::parse('2026-06-15'),
            'is_completed' => true,
            'project_id' => $project1->id,
        ]);
        $task5->users()->attach([$collab1->id, $collab4->id]);

        $task6 = Task::create([
            'title' => 'Application Testing',
            'description' => 'Perform functional testing.',
            'priority' => 'low',
            'status' => 'pending',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,

            'deadline' => Carbon::parse('2026-07-20'),
            'is_completed' => false,
            'project_id' => $project1->id,
        ]);
        $task6->users()->attach([$collab3->id]);

        // MindSpace (Project 2)

        $task7 = Task::create([
            'title' => 'Mood Tracker UI',
            'description' => 'Design the mood tracking interface.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,

            'deadline' => Carbon::parse('2026-08-14'),
            'is_completed' => true,
            'project_id' => $project2->id,
        ]);
        $task7->users()->attach([$collab2->id]);

        $task8 = Task::create([
            'title' => 'Journal Feature',
            'description' => 'Allow users to write daily journals.',
            'priority' => 'high',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Collaborate on journal templates, formatting, and autosave functionality.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 25,

            'deadline' => Carbon::parse('2026-07-27'),
            'is_completed' => false,
            'project_id' => $project2->id,
        ]);
        $task8->users()->attach([$collab3->id, $collab5->id]);

        $task9 = Task::create([
            'title' => 'Reminder Notifications',
            'description' => 'Implement daily reminder notifications.',
            'priority' => 'medium',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,

            'deadline' => Carbon::parse('2026-06-04'),
            'is_completed' => false,
            'project_id' => $project2->id,
        ]);
        $task9->users()->attach([$collab4->id]);

        $task10 = Task::create([
            'title' => 'Meditation Audio',
            'description' => 'Integrate guided meditation sessions.',
            'priority' => 'high',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Gather audio resources and integrate playback collaboratively.',
            'go_collab_limit' => 2,
            'go_collab_reward' => 18,

            'deadline' => Carbon::parse('2026-08-10'),
            'is_completed' => false,
            'project_id' => $project2->id,
        ]);
        $task10->users()->attach([$collab2->id, $collab4->id]);

        $task11 = Task::create([
            'title' => 'Analytics Dashboard',
            'description' => 'Display mood trends.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Visualize analytics and verify reporting accuracy together.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 22,

            'deadline' => Carbon::parse('2026-10-18'),
            'is_completed' => true,
            'project_id' => $project2->id,
        ]);
        $task11->users()->attach([$collab3->id]);

        $task12 = Task::create([
            'title' => 'User Feedback System',
            'description' => 'Allow users to submit feedback.',
            'priority' => 'low',
            'status' => 'pending',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,

            'deadline' => Carbon::parse('2026-07-25'),
            'is_completed' => false,
            'project_id' => $project2->id,
        ]);
        $task12->users()->attach([$collab5->id]);

        // CookEase (Project 3)
        // Members: C3

        $task13 = Task::create([
            'title' => 'Recipe Categories',
            'description' => 'Create recipe category management.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),
            
            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-05-12'),
            'is_completed' => true,
            'project_id' => $project3->id,
        ]);
        $task13->users()->attach([$collab3->id]);

        $task14 = Task::create([
            'title' => 'Meal Planner',
            'description' => 'Develop the weekly meal planner.',
            'priority' => 'high',
            'status' => 'cancelled',

            'image' => TaskImageHelper::randomPlaceholder(),
            'go_collab_enabled' => true,
            'go_collab_description' => 'Need contributors to design weekly meal scheduling workflows.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 25,
            'deadline' => Carbon::parse('2026-07-28'),
            'is_completed' => false,
            'project_id' => $project3->id,
        ]);
        $task14->users()->attach([$collab3->id]);

        $task15 = Task::create([
            'title' => 'Shopping List Generator',
            'description' => 'Generate grocery lists automatically.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),
            'go_collab_enabled' => true,
            'go_collab_description' => 'Looking for developers to improve shopping list generation accuracy.',
            'go_collab_limit' => 2,
            'go_collab_reward' => 18,
            'deadline' => Carbon::parse('2026-08-03'),
            'is_completed' => true,
            'project_id' => $project3->id,
        ]);
        $task15->users()->attach([$collab3->id]);

        $task16 = Task::create([
            'title' => 'Nutrition Information',
            'description' => 'Display nutritional facts.',
            'priority' => 'medium',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),
            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-08-10'),
            'is_completed' => false,
            'project_id' => $project3->id,
        ]);
        $task16->users()->attach([$collab3->id]);

        $task17 = Task::create([
            'title' => 'Recipe Search',
            'description' => 'Implement search and filtering.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),
            'go_collab_enabled' => true,
            'go_collab_description' => 'Collaborate on search ranking and filtering improvements.',
            'go_collab_limit' => 4,
            'go_collab_reward' => 30,
            'deadline' => Carbon::parse('2026-06-18'),
            'is_completed' => true,
            'project_id' => $project3->id,
        ]);
        $task17->users()->attach([$collab3->id]);

        $task18 = Task::create([
            'title' => 'Application Testing',
            'description' => 'Test all application modules.',
            'priority' => 'low',
            'status' => 'pending',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Help perform cross-device QA testing.',
            'go_collab_limit' => 5,
            'go_collab_reward' => 12,
            'deadline' => Carbon::parse('2026-09-24'),
            'is_completed' => false,
            'project_id' => $project3->id,
        ]);
        $task18->users()->attach([$collab3->id]);

        // PetPal (Project 4)
        // Members: C1, C2, C4, C5

        $task19 = Task::create([
            'title' => 'Pet Profile Management',
            'description' => 'Allow users to create and manage pet profiles.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-10-16'),
            'is_completed' => true,
            'project_id' => $project4->id,
        ]);
        $task19->users()->attach([$collab1->id]);

        $task20 = Task::create([
            'title' => 'Vaccination Reminder',
            'description' => 'Notify users about upcoming vaccinations.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Assist with reminder scheduling and notification testing.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 22,
            'deadline' => Carbon::parse('2026-07-28'),
            'is_completed' => true,
            'project_id' => $project4->id,
        ]);
        $task20->users()->attach([$collab2->id, $collab5->id]);

        $task21 = Task::create([
            'title' => 'Pet Health Records',
            'description' => 'Store and manage medical history for pets.',
            'priority' => 'high',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Need collaborators to organize medical record categories.',
            'go_collab_limit' => 4,
            'go_collab_reward' => 35,
            'deadline' => Carbon::parse('2026-08-05'),
            'is_completed' => false,
            'project_id' => $project4->id,
        ]);
        $task21->users()->attach([$collab4->id]);

        $task22 = Task::create([
            'title' => 'Appointment Scheduler',
            'description' => 'Schedule veterinary appointments.',
            'priority' => 'medium',
            'status' => 'cancelled',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-06-12'),
            'is_completed' => false,
            'project_id' => $project4->id,
        ]);
        $task22->users()->attach([$collab1->id, $collab4->id]);

        $task23 = Task::create([
            'title' => 'Pet Growth Tracker',
            'description' => 'Track pet weight and growth history.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Collect and validate pet growth tracking data.',
            'go_collab_limit' => 2,
            'go_collab_reward' => 15,
            'deadline' => Carbon::parse('2026-07-18'),
            'is_completed' => true,
            'project_id' => $project4->id,
        ]);
        $task23->users()->attach([$collab5->id]);

        $task24 = Task::create([
            'title' => 'Application QA Testing',
            'description' => 'Perform complete quality assurance testing.',
            'priority' => 'low',
            'status' => 'pending',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Open for community testing across multiple devices.',
            'go_collab_limit' => 5,
            'go_collab_reward' => 10,
            'deadline' => Carbon::parse('2026-01-24'),
            'is_completed' => false,
            'project_id' => $project4->id,
        ]);
        $task24->users()->attach([$collab2->id]);

        // TravelMate (Project 5)
        // Members: C1, C2, C4, C5

        $task25 = Task::create([
            'title' => 'Trip Budget Calculator',
            'description' => 'Estimate travel expenses for users.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-07-10'),
            'is_completed' => true,
            'project_id' => $project5->id,
        ]);
        $task25->users()->attach([$collab2->id]);

        $task26 = Task::create([
            'title' => 'Hotel Recommendation',
            'description' => 'Recommend hotels based on user preferences.',
            'priority' => 'high',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Looking for contributors to improve hotel recommendation quality and ranking algorithms.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 30,
            'deadline' => Carbon::parse('2026-08-18'),
            'is_completed' => false,
            'project_id' => $project5->id,
        ]);
        $task26->users()->attach([$collab1->id, $collab5->id]);

        $task27 = Task::create([
            'title' => 'Flight Search Integration',
            'description' => 'Integrate third-party flight search API.',
            'priority' => 'high',
            'status' => 'pending',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Need developers familiar with REST APIs and flight booking integrations.',
            'go_collab_limit' => 2,
            'go_collab_reward' => 40,
            'deadline' => Carbon::parse('2026-06-24'),
            'is_completed' => false,
            'project_id' => $project5->id,
        ]);
        $task27->users()->attach([$collab4->id]);

        $task28 = Task::create([
            'title' => 'Travel Itinerary Planner',
            'description' => 'Generate customizable travel itineraries.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Collaborate on itinerary templates and destination recommendations.',
            'go_collab_limit' => 4,
            'go_collab_reward' => 28,
            'deadline' => Carbon::parse('2026-07-02'),
            'is_completed' => true,
            'project_id' => $project5->id,
        ]);
        $task28->users()->attach([$collab2->id, $collab5->id]);

        $task29 = Task::create([
            'title' => 'Offline Map Support',
            'description' => 'Allow users to access maps without internet.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-08-10'),
            'is_completed' => true,
            'project_id' => $project5->id,
        ]);
        $task29->users()->attach([$collab1->id]);

        $task30 = Task::create([
            'title' => 'Application Release',
            'description' => 'Prepare and publish the first stable release.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Seeking testers to validate the final release candidate before deployment.',
            'go_collab_limit' => 5,
            'go_collab_reward' => 50,
            'deadline' => Carbon::parse('2026-06-18'),
            'is_completed' => true,
            'project_id' => $project5->id,
        ]);
        $task30->users()->attach([
            $collab1->id,
            $collab2->id,
            $collab4->id,
            $collab5->id,
        ]);


        // EcoTrack (Project 6)
        // Members: C4

        $task31 = Task::create([
            'title' => 'Carbon Footprint Calculator',
            'description' => 'Calculate users\' daily carbon emissions.',
            'priority' => 'high',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Contribute by validating emission calculation formulas and datasets.',
            'go_collab_limit' => 2,
            'go_collab_reward' => 35,
            'deadline' => Carbon::parse('2026-07-20'),
            'is_completed' => true,
            'project_id' => $project6->id,
        ]);
        $task31->users()->attach([$collab4->id]);

        $task32 = Task::create([
            'title' => 'Transportation Tracker',
            'description' => 'Track transportation habits and emissions.',
            'priority' => 'high',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Collect transportation datasets and improve activity tracking accuracy.',
            'go_collab_limit' => 4,
            'go_collab_reward' => 30,
            'deadline' => Carbon::parse('2026-08-29'),
            'is_completed' => false,
            'project_id' => $project6->id,
        ]);
        $task32->users()->attach([$collab4->id]);

        $task33 = Task::create([
            'title' => 'Energy Consumption Monitor',
            'description' => 'Record household energy usage.',
            'priority' => 'medium',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-06-06'),
            'is_completed' => true,
            'project_id' => $project6->id,
        ]);
        $task33->users()->attach([$collab4->id]);

        $task34 = Task::create([
            'title' => 'Weekly Sustainability Report',
            'description' => 'Generate personalized sustainability reports.',
            'priority' => 'medium',
            'status' => 'in_progress',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Help design insightful weekly environmental reports and visualizations.',
            'go_collab_limit' => 3,
            'go_collab_reward' => 22,
            'deadline' => Carbon::parse('2026-07-13'),
            'is_completed' => false,
            'project_id' => $project6->id,
        ]);
        $task34->users()->attach([$collab4->id]);

        $task35 = Task::create([
            'title' => 'Achievement Badge System',
            'description' => 'Reward users for eco-friendly habits.',
            'priority' => 'low',
            'status' => 'completed',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => false,
            'go_collab_description' => null,
            'go_collab_limit' => null,
            'go_collab_reward' => 0,
            'deadline' => Carbon::parse('2026-08-20'),
            'is_completed' => true,
            'project_id' => $project6->id,
        ]);
        $task35->users()->attach([$collab4->id]);

        $task36 = Task::create([
            'title' => 'Final Application Testing',
            'description' => 'Conduct end-to-end testing before deployment.',
            'priority' => 'high',
            'status' => 'pending',

            'image' => TaskImageHelper::randomPlaceholder(),

            'go_collab_enabled' => true,
            'go_collab_description' => 'Recruit testers to verify every module before public launch.',
            'go_collab_limit' => 5,
            'go_collab_reward' => 45,
            'deadline' => Carbon::parse('2026-09-27'),
            'is_completed' => false,
            'project_id' => $project6->id,
        ]);
        $task36->users()->attach([$collab4->id]);
    }
}
