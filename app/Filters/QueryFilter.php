<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;    // For handling database queries
use Illuminate\Http\Request;                 // For handling HTTP requests
use Illuminate\Support\Str;                                    // Laravel's string manipulation helper

/**
 * Abstract base class for implementing query filters in Laravel
 * This class provides the foundation for creating specific filter classes for different models
 */
abstract class QueryFilter
{
    /**
     * @var Request
     * Holds the current HTTP request instance
     * Contains all request data (query parameters, form data, etc.)
     */
    protected $request;

    /**
     * @var Builder
     * Holds the query builder instance
     * Used to build and modify database queries
     */
    protected $builder;

    /**
     * @var string
     * Delimiter used to split parameter values into arrays
     * Example: category=1,2,3 will become array [1,2,3]
     */
    protected $delimiter = ',';

    /**
     * Constructor: Initializes the filter with an HTTP request
     *
     * @param Request $request The current HTTP request instance
     * Example Usage: new ProductFilter($request)
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Applies filters to the query builder based on request parameters
     *
     * @param Builder $builder The query builder instance
     * @return Builder The modified query builder
     *
     * How it works:
     * 1. Stores the builder instance
     * 2. Gets all request parameters
     * 3. For each parameter, checks if a matching filter method exists
     * 4. If exists, calls that method with the parameter value
     *
     * Example:
     * URL: /products?price=100&category=1
     * Will look for and call methods: price(100) and category(1)
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            // Check if this filter has a corresponding method
            if (method_exists($this, $name) && $value !== null) {
                // Call the filter method with its value
                //call_user_func_array([$this, $name], array_filter([$value]));
                $this->{$name}($value); // this accepts 0 value
            }
        }

        return $this->builder;
    }

    /**
     * Gets all filters from the current request
     *
     * @return array All request parameters
     *
     * Example:
     * URL: /products?price=100&category=1
     * Returns: ['price' => '100', 'category' => '1']
     */
    public function filters()
    {
        return $this->request->all();
    }

    /**
     * Converts a parameter string into an array using the delimiter
     *
     * @param string $param The parameter value to convert
     * @return array The resulting array
     *
     * Example Usage:
     * Input: "1,2,3"
     * Output: [1,2,3]
     *
     * Input: "single_value"
     * Output: ["single_value"]
     */
    protected function paramToArray($param)
    {
        return Str::contains($param, $this->delimiter) ?
            explode($this->delimiter, $param) :
            [$param];
    }
}
