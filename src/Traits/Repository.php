<?php

namespace Rmunate\LaravelConfigRuntime\Traits;

use Illuminate\Contracts\Config\Repository as ConfigContract;
use Illuminate\Support\Facades\App;

trait Repository
{
    /**
     * Get an instance of the Laravel configuration repository.
     *
     * This method uses the `app()` function to resolve the Laravel configuration repository instance.
     * The repository instance is returned for further interaction with configuration values.
     *
     * @return \Illuminate\Contracts\Config\Repository
     */
    public function instance()
    {
        return App::make(ConfigContract::class);
    }
}
