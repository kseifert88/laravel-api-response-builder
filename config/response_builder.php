<?php

/**
 * Laravel API Response Builder - config file
 *
 * @author    Marcin Orlowski <mail (#) marcinorlowski (.) com>
 * @copyright 2016 Marcin Orlowski
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/MarcinOrlowski/laravel-api-response-builder
 */

use App\ErrorCode;

return [

	/*
	|--------------------------------------------------------------------------
	| Code range settings
	|--------------------------------------------------------------------------
	|
	| This option controls code range allowed error codes to use. This is
	| helpful when you use i.e. many chained APIs and you would like to ensure
	| all error codes are unique. By assigning different ranges to your API
	| and by properly setting min_code and max_code you have this guarded
	| by ResponseBuilder at runtime.
	|
	| NOTE ResponseBuilder reserves codes from 0 to 63 (inclusive) for own
	| internal use, and your codes cannot use this range.
	|
	| min_code - Min error code assigned for this module (inclusive)
	| max_code - Max error code assigned for this module (inclusive)
	|
	*/
	'min_code'  => 100,
    'max_code'  => 399,

	/*
	|--------------------------------------------------------------------------
	| Error code to message mapping
	|--------------------------------------------------------------------------
	|
	| ResponseBuilder automatically "translates" your error code to more human
	| readable form, that's why this mapping is needed. ResponseBuilder uses
	| standard Laravel's Lang
	|
	|    ErrorCode::SOMETHING => 'api.something',
	|
	| See README if you want to provide own messages for built-in codes too.
	|
	*/
    'map' => [

    ],


	/*
	|--------------------------------------------------------------------------
	| Exception handler error codes
	|--------------------------------------------------------------------------
	|
	| If you use ResponseBuilder's Exception handler helper, you must map events
	| to error codes you assigned.
	|
	| See README for details
	|
	*/
	'exception_handler' => [

		// Set to true, if you want exception class name to be included
		// in reponse caused by unhandled exception.
		'include_class_name' => env('EX_INCLUDE_CLASS_NAME', false),

		// Map exception to your own error codes. That way, when cascading
		// you will still know which module thrown this exception
		'exception' => [
			'http_not_found'           => ErrorCode::UNKNOWN_METHOD,
			'http_service_unavailable' => ErrorCode::SERVICE_IN_MAINTENANCE,
			'http_exception'           => ErrorCode::HTTP_EXCEPTION,
			'uncaught_exception'       => ErrorCode::UNCAUGHT_EXCEPTION,
		],

	],

];
