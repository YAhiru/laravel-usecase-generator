<?php

namespace Yahiru\LaravelUseCaseGenerator;

use Illuminate\Console\GeneratorCommand;

class AdapterMakeCommand extends GeneratorCommand
{
    use UseCaseMakeCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:usecase:adapter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new UseCase Adapter Interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Adapter';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/adapter.stub';
    }
}
