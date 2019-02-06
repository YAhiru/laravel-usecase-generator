<?php
declare(strict_types=1);

namespace Yahiru\UseCaseGenerator;

use Illuminate\Support\Str;

trait UseCaseMakeCommandTrait
{
    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->getRootPath().'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * @return string
     */
    private function getRootPath(): string
    {
        if ($config = config('usecase.root_path')) {

            $root = ltrim(str_replace(base_path(), '',  $config), '/');

            return rtrim(base_path($root), '\\/');
        }

        return app_path('UseCases');
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        if ($config = config('usecase.namespace')) {
            return $config;
        }

        return $this->laravel->getNamespace().'UseCases\\';
    }
}
