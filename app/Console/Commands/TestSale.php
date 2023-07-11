<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\StudentController;
use Illuminate\Contracts\Container\Container;
use App\Http\Controllers\ProfileController;
class TestSale extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:sale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */


    public function handle(Container $container)
    {
        $studentController = $container->make(StudentController::class);
        $ProfileController = $container->make(ProfileController::class);
        // $studentController->index();
        $studentController->testData();
        $ProfileController->index();
    }
}
