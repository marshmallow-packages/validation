<?php

declare(strict_types=1);

namespace Marshmallow\Validation\Laravel;

use Illuminate\Support\ServiceProvider;
use Marshmallow\Validation\Exceptions\NotExistingRuleException;
use Marshmallow\Validation\Rule;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // load translation files
        $this->loadTranslationsFrom(
            __DIR__ . '/../lang',
            'validation'
        );

        // add rules to laravel validator
        foreach ($this->getRuleShortnames() as $rulename) {
            $this->app['validator']->extend(
                $rulename,
                function ($attribute, $value, $parameters, $validator) use ($rulename) {
                    return $this->getMarshmallowRule($rulename, $parameters)
                        ->isValid($value);
                },
                $this->getErrorMessage($rulename)
            );
        }
    }

    /**
     * Return rule object for given shortname
     *
     * @param string $rulename
     * @param array $parameters
     * @return Rule
     * @throws NotExistingRuleException
     */
    private function getMarshmallowRule(string $rulename, array $parameters): Rule
    {
        $classname = sprintf("Marshmallow\Validation\Rules\%s", ucfirst($rulename));

        if (!class_exists($classname)) {
            throw new NotExistingRuleException("Rule " . $rulename . " does not exist.");
        }

        return new $classname($parameters);
    }

    /**
     * List all shortnames of new rule objects
     *
     * @return array
     */
    private function getRuleShortnames(): array
    {
        return array_map(function ($filename) {
            return mb_strtolower(substr($filename, 0, -4));
        }, array_diff(scandir(__DIR__ . '/../Rules'), ['.', '..']));
    }

    /**
     * Return error message of given rule shortname
     *
     * @param string $rulename
     * @return string
     */
    protected function getErrorMessage(string $rulename): string
    {
        return $this->app['translator']->get('validation::validation.' . $rulename);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['validator'];
    }
}
