<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeMacroCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:macro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new macro file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Macro';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/Stubs/Macro.stub';
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
        return $rootNamespace . '\Macros';
    }
}
