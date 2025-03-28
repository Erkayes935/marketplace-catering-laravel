namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeModelMCRFS extends GeneratorCommand
{
    protected $signature = 'make:model {name} -mcrfs';
    protected $description = 'Create a model, migration, controller, factory, and seeder with MCRFS setup';

    // Menentukan lokasi stub file
    protected function getStub()
    {
        return false; // Kita menulis sendiri logika generate file
    }

    public function handle()
    {
        $modelName = $this->argument('name');
        $modelNameSingular = Str::singular($modelName); // Menyesuaikan nama model menjadi bentuk tunggal

        // Buat Model
        $this->call('make:model', ['name' => $modelName]);

        // Buat Migration
        $this->call('make:migration', ['name' => "create_{$modelNameSingular}s_table", '--create' => strtolower($modelNameSingular).'s']);

        // Buat Controller
        $this->call('make:controller', ['name' => "{$modelName}Controller"]);

        // Buat Factory
        $this->call('make:factory', ['name' => "{$modelName}Factory", '--model' => $modelName]);

        // Buat Seeder
        $this->call('make:seeder', ['name' => "{$modelName}Seeder"]);

        $this->info("Model, Migration, Controller, Factory, and Seeder for {$modelName} with MCRFS setup generated successfully.");
    }
}
