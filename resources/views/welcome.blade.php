@php

$businessDays = [
    'monday',
    'friday',
];

$project = \App\Models\Project::create([
   'title' => 'Titre du projet',
   'deadline_at' => now()->addMonth(),
   'business_days' => $businessDays,
   'user_id' => 1,
]);

//dd($project->business_days);

dd($project->business_days->open());

@endphp
