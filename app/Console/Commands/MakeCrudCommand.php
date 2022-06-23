<?php

// Console Namespacing.
namespace App\Console\Commands;

// Facades.
use Illuminate\Console\Command;

class MakeCrudCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model, controller and request file. Migration and seeder are both optional.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Ask for the model name.
        $crudName = $this->ask('What is the name of the model? (This must be singular and capitalized. E.g.: Post)');

        // Create the files.
        $this->createModel($crudName);
        $this->createControllers($crudName);
        $this->createStoreRequest($crudName);
        $this->createMigration($crudName);
        $this->createSeeder($crudName);
        $this->createViewFiles($crudName);
    }

    /**
     * Return the correct stub file.
     *
     * @return mixed
     */
    protected function getStub($stubType, $dir)
    {
        // Put the file in variable.
        $getStub = __DIR__ . '/Stubs/' . $dir . '/' . $stubType . '.stub';

        // Check if the current file exists in the given directory, else return content from the .stub file.
        if(!file_exists($getStub))
            $this->error('The file does not exists on the given path.');
        else
            return file_get_contents($getStub);
    }

    /**
     * Create the CRUD file based on the given stub type.
     *
     * @var string
     * @return mixed
     */
    protected function createFile($crudVar, $crudName, $stubType, $dir = 'Crud')
    {
        // Set the variable to replace.
        return str_replace($crudVar, $crudName, $this->getStub($stubType, $dir));
    }

    /**
     * Replace the content of the .stub file.
     *
     * @var string
     * @return mixed
     */
    protected function replaceStubContent($crudFile, $template, $crudPath = null)
    {
        // Trim the full path from the variable for better reading.
        $shortCrudFile = str_replace(\Str::finish(app_path(), '/'), '', $crudFile);

        // If the $crudPath is given, check if the path exists. Create directory.
        if($crudPath && !file_exists($crudPath)) {

            // Create folder. Return error is folder cannot be created.
            if(!mkdir($crudPath, 0777, true))
                return $this->error('Error: ' . $crudPath . ' not created.');
        }

        // Check if file exists.
        if(file_exists($crudFile))
            return $this->error('Error: ' . $shortCrudFile . ' already exists.');

         // Create file and replace the variables in the .stub file.
        if(!file_put_contents($crudFile, $template))
            return $this->error('Error: ' . $shortCrudFile . ' was not created');

        return $this->info('Success: ' . $shortCrudFile . ' was created succesfully.');
    }

    /**
     * Create the model.
     *
     * @var string
     */
    protected function createModel($crudName)
    {
        // Set the variable to replace.
        $modelTemplate = $this->createFile(
                                [
                                    '{{crudName}}',
                                    '{{crudNameSingularSnakeCase}}',
                                ],
                                [
                                    $crudName,
                                    \Str::camel($crudName),
                                ],
                                'Model');

        // Place crud file in a variable.
        $crudFile = app_path('Models/' . $crudName . '.php');

        // Replace the content within the .stub file.
        $this->replaceStubContent($crudFile, $modelTemplate);
    }

    /**
     * Create the migration.
     *
     * @var string
     */
    protected function createMigration($crudName)
    {
        if($this->confirm('Do you wish to create a migration file?')) {

            // Set the variable to replace.
            $migrationTemplate = $this->createFile(
                                    [
                                        '{{crudNamePlural}}',
                                        '{{crudNamePluralLowerCase}}',
                                    ],
                                    [
                                        \Str::plural($crudName),
                                        \Str::lower(\Str::snake(\Str::plural($crudName))),
                                    ],
                                    'Migration');

            // Format date for the name of the file.
            $date = \DateTime::createFromFormat('U.u', microtime(true))->format('Y_m_d_u');

            // Generate the name of the migration file.
            $migrationFileName = $date . '_create_' . \Str::snake(\Str::plural($crudName)) . '_table.php';

            // Place crud file in a variable.
            $crudFile = database_path(\Str::finish('migrations', '/') . $migrationFileName);

            // Replace the content within the .stub file.
            $this->replaceStubContent($crudFile, $migrationTemplate);
        }
    }

    /**
     * Create the controller.
     *
     * @var string
     */
    protected function createControllers($crudName)
    {
        $this->info('The controllers will be created.');

        if($this->confirm('Do you wish to create a front controller?'))
            $controllerArray = ['Front', 'Admin'];
        else
            $controllerArray = ['Admin'];

        // Create the controller(s).
        foreach($controllerArray as $controller) {

            // Set the variable to replace..
            $controllerTemplate = $this->createFile(
                                    [
                                        '{{crudName}}',
                                        '{{crudNameSingularSnakeCase}}',
                                        '{{crudNamePluralSnakeCase}}'
                                    ],
                                    [
                                        $crudName,
                                        \Str::camel($crudName),
                                        \Str::plural(\Str::camel($crudName))
                                    ],
                                    'Controller' . $controller);

            // Place crud file in a variable.
            $crudFile = app_path('Http/Controllers/' . $controller . '/Modules/' . $crudName . 'Controller.php');

            // Replace the content within the .stub file.
            $this->replaceStubContent($crudFile, $controllerTemplate);
        }
    }

    /**
     * Create the store request.
     *
     * @var string
     */
    protected function createStoreRequest($crudName)
    {
        // Set the variable to replace.
        $requestTemplate = $this->createFile(
                                [
                                    '{{crudName}}'
                                ],
                                [
                                    $crudName
                                ],
                                'Request');

        // Place crud file in a variable.
        $crudFile = app_path('Http/Requests/' . $crudName . 'Request.php');

        // Replace the content within the .stub file.
        $this->replaceStubContent($crudFile, $requestTemplate);
    }

    /**
     * Create the seeder.
     *
     * @var string
     */
    protected function createSeeder($crudName)
    {
        if($this->confirm('Do you wish to create a seeder?'))
            $crudType = 'Seeder';
        elseif($this->confirm('Do you wish to create a factory?'))
            $crudType = 'Factory';
        else
            return false;

        // Make crud name lowercase and plurar.
        $crudNameLower = \Str::lower($crudName);
        $crudNameLowerPlural = \Str::plural($crudNameLower);

        // Set the variable to replace.
        $seederTemplate = $this->createFile(
                                [
                                    '{{crudName}}',
                                    '{{crudNameLower}}',
                                    '{{crudNameLowerPlural}}'
                                ],
                                [
                                    $crudName,
                                    $crudNameLower,
                                    $crudNameLowerPlural
                                ],
                                $crudType);

        // Make crudtype plural and lowercase.
        $crudNamePlural = ($crudType == 'Seeder' ? 'seeders' : 'factories');

        // Place crud file in a variable.
        $crudFile = database_path(\Str::finish($crudNamePlural, '/') . $crudName . $crudType . '.php');

        // Replace the content within the .stub file.
        $this->replaceStubContent($crudFile, $seederTemplate);
        $this->info('Don\'t forget to add the seeder or factory to the DatabaseSeeder.php file!');
    }

    /**
     * Create the view files.
     *
     * @var string
     */
    protected function createViewFiles($crudName)
    {
        $this->info('The admin view files will be created.');

        if($this->confirm('Do you wish to create a website view folder?')) {
            $viewArray = [
                'Front' => [
                    'Index',
                    'Show'
                ],
                'Admin' => [
                    'CreateEdit',
                    'Index'
                ]
            ];
        }
        else {
            $viewArray = [
                'Admin' => [
                    'CreateEdit',
                    'Index'
                ]
            ];
        }

        foreach($viewArray as $stubFolder => $stubFile) {
            foreach($stubFile as $stub) {
                $stubTemplate = $this->createFile(
                                        [
                                            '{{crudName}}',
                                            '{{crudNameSingularSnakeCase}}',
                                            '{{crudNamePluralSnakeCase}}'
                                        ],
                                        [
                                            $crudName,
                                            \Str::camel($crudName),
                                            \Str::plural(\Str::camel($crudName))
                                        ],
                                        $stub,
                                        'Views/' . $stubFolder
                                    );

                                    // Place crud file in a variable.
                $crudPath = resource_path('views/' . \Str::lower($stubFolder) . '/modules/' . \Str::camel($crudName));
                $viewFile = $crudPath . '/' . \Str::camel($stub) . '.blade.php';

                // Replace the content within the .stub file.
                $this->replaceStubContent($viewFile, $stubTemplate, $crudPath);

            }
        }
    }
}
