<?php

function profiler_start(array $variables = []) {
    if (class_exists('\Tideways\Profiler')) {
        \Tideways\Profiler::start();
        \Tideways\Profiler::setServiceName('web');
        \Tideways\Profiler::enableCallgraphProfiler();
        \Tideways\Profiler::setTransactionName('example');
        foreach ($variables as $name => $value) {
            \Tideways\Profiler::setCustomVariable($name, $value);
        }
    }
}

function profiler_exception(Throwable $throwable): void
{
    if (class_exists('\Tideways\Profiler')) {
        \Tideways\Profiler::logException($throwable);
    }
}

function profiler_stop(): void
{
    if (class_exists('\Tideways\Profiler')) {
        \Tideways\Profiler::stop();
    }
}
