<?php

namespace WriteDown\Validator;

interface Validator
{
    /**
     * Set rules to validate against.
     *
     * @param array $rules
     *
     * @return void
     */
    public function setRules(array $rules);

    /**
     * Set data to validate.
     *
     * @param array $data
     *
     * @return void
     */
    public function setData(array $data);

    /**
     * Validate data. Optionally allows $rules and $data to be set here. If not,
     * uses $this->rules and $this->data.
     *
     * Should $this->rules or $this->data not be available an exception must be
     * thrown.
     *
     * Returns true on validation success, false on failure.
     *
     * @param array $rules
     * @param array $data
     *
     * @return bool
     * @throws \Exception
     */
    public function validate($rules = null, $data = null);

    /**
     * Check if the last validation was successful.
     *
     * An exception should be thrown if not validation has occoured.
     *
     * @return boolean
     * @throws \Exception
     */
    public function success();

    /**
     * Retrieve errors.
     *
     * Throws an exception when no errors are available.
     *
     * @return array
     * @throws \Exception
     */
    public function errors();
}
