<?php

class AppModel extends Model {

    function find($conditions = NULL, $fields = array(), $order = NULL, $recursive = NULL) {
        if ($conditions == 'list' && is_array($this->displayField))
            return Set::combine($this->find('all', $fields, $order, $recursive), "{n}.{$this->name}.{$this->primaryKey}", $this->displayField);
        else
            return parent::find($conditions, $fields, $order, $recursive);
    }

    function beforeSave() {
        parent::beforeSave();
        /**
         * Checks table metadata for fields which allows NULL and set the value
         * to NULL when they are empty
         *
         * TODO: probably make this a behavior?
         */
        $tableInfo = $this->_schema;
        foreach ($tableInfo as $key => $value) {
            if ($value['null']) {
                if (isset($this->data[$this->name][$key]) && $this->data[$this->name][$key] === '') {
                    $this->data[$this->name][$key] = null;
                }
            }
        }
        return true;
    }

    /**
     * static enums
     * @access static
     */
    static function enum($value, $options, $default = '') {
        if ($value !== null) {
            if (array_key_exists($value, $options)) {
                return $options[$value];
            }
            return $default;
        }
        return $options;
    }

}