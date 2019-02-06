<?php

namespace Yahiru\UseCaseGenerator;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class UseCaseMakeCommand extends GeneratorCommand
{
    use UseCaseMakeCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:usecase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new UseCase class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'UseCase';

    /**
     * @return bool|void|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (parent::handle() === false && ! $this->option('force')) {
            return;
        }

        if ($this->option('all')) {
            $this->input->setOption('input', true);
            $this->input->setOption('viewmodel', true);
            $this->input->setOption('adapter', true);
        }

        if ($this->option('input')) {
            $this->createInputData();
        }

        if ($this->option('viewmodel')) {
            $this->createViewModel();
        }

        if ($this->option('adapter')) {
            $this->createAdapter();
        }
    }

    /**
     * Create a InputData for the UseCase.
     *
     * @return void
     */
    protected function createInputData()
    {
        $namespace = $this->additionalNamespace();

        $input = $this->replaceUseCaseName(config('usecase.name.inputdata', 'InputData'));
        $this->call('make:usecase:input', [
            'name' => str_replace('\\', '/', $namespace).'/'.$input,
        ]);
    }

    /**
     * Create a InputData for the UseCase.
     *
     * @return void
     */
    protected function createViewModel()
    {
        $namespace = $this->additionalNamespace();

        $vm = $this->replaceUseCaseName(config('usecase.name.viewmodel', 'ViewModel'));
        $this->call('make:usecase:vm', [
            'name' => str_replace('\\', '/', $namespace).'/'.$vm,
        ]);
    }

    /**
     * Create a Adapter for the UseCase.
     *
     * @return void
     */
    protected function createAdapter()
    {
        $namespace = $this->additionalNamespace();

        $adapter = $this->replaceUseCaseName(config('usecase.name.adapter', '__USE_CASE__Adapter'));
        $this->call('make:usecase:adapter', [
            'name' => str_replace('\\', '/', $namespace).'/'.$adapter,
        ]);
    }

    /**
     * @param $name
     * @return string
     */
    private function replaceUseCaseName($name): string
    {
        return str_replace('__USE_CASE__', $this->getClassName(), $name);
    }

    /**
     * @return string
     */
    protected function additionalNamespace()
    {
        $namespace = $this->qualifyClass($this->getNameInput());
        return str_replace($this->rootNamespace(), '', $namespace);
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->getRootPath().'/'.str_replace('\\', '/', $name).'/'.$this->getClassName().'.php';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/usecase.stub';
    }

    /**
     * @return string
     */
    protected function getClassName()
    {
        return Str::studly(class_basename($this->argument('name')));
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', null, InputOption::VALUE_NONE, 'Generate a Adapter, InputData, and ViewModel for the UseCase'],
            ['adapter', 'a', InputOption::VALUE_NONE, 'Generate an Adapter for the UseCase'],
            ['input', 'i', InputOption::VALUE_NONE, 'Generate an InputData for the UseCase'],
            ['viewmodel', 'm', InputOption::VALUE_NONE, 'Generate a ViewModel for the UseCase'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the UseCase already exists'],
        ];
    }
}
