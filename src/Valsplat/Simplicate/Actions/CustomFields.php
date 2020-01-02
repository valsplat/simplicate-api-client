<?php

namespace Valsplat\Simplicate\Actions;

trait CustomFields
{

    /**
     * Returns the value of a custom field
     *
     * @param string name
     * @return mixed
     */
    public function getCustomField($name)
    {
        $customFields = $this->custom_fields;
        foreach ($customFields as $field) {
            if ($field['name'] == $name) {
                if (isset($field['value'])) {
                    return $field['value'];
                } else {
                    return;
                }
            }
        }
    }

    /**
     * Set's value of a custom field
     *
     * @param string $name
     * @param mixed $value
     * @return true on success, false on failure
     */
    public function setCustomField($name, $value)
    {
        $customFields = $this->custom_fields;
        foreach ($customFields as &$field) {
            if ($field['name'] == $name) {
                $field['value'] = $value;
                $this->custom_fields = $customFields;
                return true;
            }
        }
        return false;
    }
}
