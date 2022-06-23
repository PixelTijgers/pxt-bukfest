<?php


// Console Namespacing.
namespace App\Console\Commands;

// Facades.
use Illuminate\Console\Command;

class MakeResourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:resource';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new .scss and/or .js file for a module.';

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
        // Ask for the module folder.
        $path = $this->ask('What is the path of the module? (E.g.: website.modules.post)');
        $file = $this->ask('What is name of the blade view file? (E.g.: index or createEdit)');

        // Create the files.
        $this->createWebsiteResource($path, $file);
    }

    /**
     * Return the correct stub file.
     *
     * @return mixed
     */
    protected function getStub($stubType)
    {
        // Put the file in variable.
        $getStub = __DIR__ . '/Stubs/Resource/' . $stubType . '.stub';

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
    protected function createFile($crudVar, $crudName, $stubType)
    {
        // Set the variable to replace.
        return str_replace($crudVar, $crudName, $this->getStub($stubType));
    }

    /**
     * Replace the content of the .stub file.
     *
     * @var string
     * @return mixed
     */
    protected function replaceStubContent($resourceFile, $template, $resourcePath = null)
    {
        // Trim the full path from the variable for better reading.
        $shortResourceFile = str_replace(\Str::finish(app_path(), '/'), '', $resourceFile);

        // If the $resourcePath is given, check if the path exists. Create directory.
        if($resourcePath && !file_exists($resourcePath)) {

            // Create folder. Return error is folder cannot be created.
            if(!mkdir($resourcePath, 0777, true))
                return $this->error('Error: ' . $resourcePath . ' not created.');
        }

        // Check if file exists.
        if(file_exists($resourceFile))
            return $this->error('Error: ' . $shortResourceFile . ' already exists.');

         // Create file and replace the variables in the .stub file.
        if(!file_put_contents($resourceFile, $template))
            return $this->error('Error: ' . $shortResourceFile . ' was not created');

        return $this->info('Success: ' . $shortResourceFile . ' was created succesfully.');
    }

    /**
     * Create the website resource files.
     *
     * @var string
     */
    protected function createWebsiteResource($path, $file)
    {
        if($this->confirm('Do you wish to create a .scss and .js file?'))
            $resourceArray = ['Scss', 'Js'];
        elseif($this->confirm('Do you wish to create a .scss file?'))
            $resourceArray = ['Scss'];
        elseif($this->confirm('Do you wish to create a .js file?'))
            $resourceArray = ['Js'];
        else
            return false;

        // Create the resource file(s).
        foreach($resourceArray as $resource) {

            // Create namespace.
            // TODO: Improve code?
            if($resource == 'Scss') {
                $namespace = str_replace(['.', ','], '-', $path) . '-' . \Str::ucfirst($file);
                $folder = 'sass';
            }
            else {
                $namespace = str_replace(['.', ','], '-', $path) . '.' . \Str::ucfirst($file);
                $folder = 'js';
            }

            // Set the variable to replace..
            $resourceTemplate = $this->createFile(
                                    [
                                        '{{namespace}}',
                                    ],
                                    [
                                        $namespace,
                                    ],
                                    $resource);

            // Set path where the file must be placed.
            $resourcePath = resource_path($folder . '/' . str_replace(['.', ','], '/', $path) . '/');
            $resourceFile = $resourcePath . $file . '.' . \Str::lower($resource);

            // Replace the content within the .stub file.
            $this->replaceStubContent($resourceFile, $resourceTemplate, $resourcePath);
        }

        // TODO: Do automatically?
        $this->info('Don\'t forget to run npm run dev, prod or watch!');
    }
}
