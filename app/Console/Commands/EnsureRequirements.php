<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Intern;
use App\Models\Requirement;

class EnsureRequirements extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ensure-requirements';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ensure all interns have requirement records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $interns = Intern::whereDoesntHave('requirement')->get();
        
        foreach ($interns as $intern) {
            Requirement::create([
                'intern_id' => $intern->id,
                'pds' => false,
                'waiver' => false,
                'med_cert' => false,
                'moa' => false,
                'photo_2x2' => false,
                'accomplishment_report' => false,
                'certificate_of_completion' => false,
            ]);
        }
        
        $this->info("Created {$interns->count()} requirement records.");
        return Command::SUCCESS;
    }
}
