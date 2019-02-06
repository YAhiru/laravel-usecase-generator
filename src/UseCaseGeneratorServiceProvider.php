<?php
declare(strict_types=1);

namespace Yahiru\UseCaseGenerator;

use Illuminate\Support\ServiceProvider;

final class UseCaseGeneratorServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/usecase.php' => config_path('usecase.php'),
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                UseCaseMakeCommand::class,
                ViewModelMakeCommand::class,
                InputDataMakeCommand::class,
                AdapterMakeCommand::class,
            ]);
        }
    }
}