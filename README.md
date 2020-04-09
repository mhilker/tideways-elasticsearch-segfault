# Tideways Elasticsearch Segfault

Uncomment the code block in `public/app.php` and try different index names. The segfault occurs when the index does not exist in elasticsearch.

## Run

```bash
docker-compose up --build
```

## Log

```
php_1 | NOTICE: PHP message: [tideways.ERROR] PHP received segfault signal: 11
php_1 | NOTICE: PHP message: [tideways.ERROR] PHP Backtrace:
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(+0x27d27) [0x7f7860b2ed27]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(+0x27ddd) [0x7f7860b2eddd]
php_1 | NOTICE: PHP message: [tideways.ERROR] /lib/x86_64-linux-gnu/libc.so.6(+0x37840) [0x7f7864211840]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(zend_call_function+0x2f) [0x555d8c77f50f]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(_call_user_function_ex+0x55) [0x555d8c77fda5]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(+0x18a17) [0x7f7860b1fa17]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(tracing_trace_callback_elasticsearch_perform_request_stop+0x24e) [0x7f7860b212be]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(tracing_trace_function_stop+0x51) [0x7f7860b2db81]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(tideways_execute_ex+0x13f) [0x7f7860b89d7f]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so(+0x12ad6) [0x7f78612e9ad6]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(+0x22ed08) [0x555d8c4bed08]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(execute_ex+0x196d) [0x555d8c80c72d]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(tideways_execute_ex+0x549) [0x7f7860b8a189]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so(+0x12ad6) [0x7f78612e9ad6]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(+0x22ed08) [0x555d8c4bed08]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(execute_ex+0x196d) [0x555d8c80c72d]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(tideways_execute_ex+0x549) [0x7f7860b8a189]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so(+0x12ad6) [0x7f78612e9ad6]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(+0x22e9d4) [0x555d8c4be9d4]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(execute_ex+0x196d) [0x555d8c80c72d]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/tideways.so(tideways_execute_ex+0x2b) [0x7f7860b89c6b]
php_1 | NOTICE: PHP message: [tideways.ERROR] /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so(+0x12ad6) [0x7f78612e9ad6]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(zend_execute+0x133) [0x555d8c8138d3]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(zend_execute_scripts+0xc3) [0x555d8c78e213]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(php_execute_script+0x250) [0x555d8c72e4e0]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(+0x23d070) [0x555d8c4cd070]
php_1 | NOTICE: PHP message: [tideways.ERROR] /lib/x86_64-linux-gnu/libc.so.6(__libc_start_main+0xeb) [0x7f78641fe09b]
php_1 | NOTICE: PHP message: [tideways.ERROR] php-fpm: pool www(_start+0x2a) [0x555d8c4ce4aa]
```
