<?php

namespace LaraRest;

use Illuminate\Contracts\Validation\Factory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

trait ValidateRequests
{
    /**
     * Validate the given request with the given rules.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $rules
     * @param  array  $messages
     * @param  array  $customAttributes
     * @return \Illuminate\Contracts\Validation\Validator
     *
     * @throws \Illuminate\Http\Exception\HttpResponseException
     */
    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = [])
    {
        return $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);
    }

    /**
     * Get a validation factory instance.
     *
     * @return \Illuminate\Contracts\Validation\Factory
     */
    protected function getValidationFactory()
    {
        return app(Factory::class);
    }
}