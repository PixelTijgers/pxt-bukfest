<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeViewComposerCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:viewcomposer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new viewcomposer file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Viewcomposer';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/Stubs/Viewcomposer.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\ViewComposers';
    }
}
