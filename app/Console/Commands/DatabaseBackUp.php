<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DatabaseBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $filename = "backup-" . now()->format('Y-m-d') . ".sql";
        $filePath = storage_path("app/backup/" . $filename);

        $connection = config('database.default');
        $database = config("database.connections.{$connection}.database");
        $username = config("database.connections.{$connection}.username");
        $password = config("database.connections.{$connection}.password");
        $host = config("database.connections.{$connection}.host");
        $port = config("database.connections.{$connection}.port");

        $command = "mysqldump --user={$username} --password={$password} --host={$host} --port={$port} {$database} > {$filePath}";

        $returnVar = NULL;
        $output = NULL;

        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            $this->info("Database backup has been created successfully: {$filename}");
        } else {
            $this->error("Database backup failed.");
        }
    }
}