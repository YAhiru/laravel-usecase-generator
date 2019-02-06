<?php

namespace Yahiru\UseCaseGenerator;

use Illuminate\Console\GeneratorCommand;

class InputDataMakeCommand extends GeneratorCommand
{
    use UseCaseMakeCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:usecase:input';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new InputData class for UseCase class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'InputData';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/inputdata.stub';
    }
}
