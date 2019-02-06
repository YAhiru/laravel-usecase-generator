<?php

namespace Yahiru\LaravelUseCaseGenerator;

use Illuminate\Console\GeneratorCommand;

class ViewModelMakeCommand extends GeneratorCommand
{
    use UseCaseMakeCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:usecase:vm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ViewModel';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/viewmodel.stub';
    }
}
