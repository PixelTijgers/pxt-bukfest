<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MakeMixinCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:mixin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mixin file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Mixin';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/Stubs/Mixin.stub';
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
        return $rootNamespace . '\Mixins';
    }
}
