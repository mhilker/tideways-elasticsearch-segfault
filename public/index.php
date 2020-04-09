<?php

require __DIR__ . '/../vendor/autoload.php';

try {
    profiler_start();
    run_application();
} catch (Exception $exception) {
    echo $exception->getMessage();
    profiler_exception($exception);
} finally {
    profiler_stop();
}
