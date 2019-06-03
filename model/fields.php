<?php
class Field {
    private $name;
    private $message = '';
    private $state = '';
    private $hasError = false;

    public function __construct($name, $message = '') {
        $this->name = $name;
        $this->message = $message;
    }
    
    public function getName()    { return $this->name; }
    public function getMessage() { return $this->message; }
    public function hasError()    { return $this->hasError; }

    public function setErrorMessage($message) {
        $this->message = $message;
        $this->hasError = true;
        $this->state = "error";
    }
    
    public function clearErrorMessage() {
        $this->message = '';
        $this->hasError = false;
        $this->state = "";
    }
    
    public function setError() {
        $state = htmlspecialchars($this->state);
        if ($this->hasError()) {
            return $state;
        } else {
            return "";
        }
    }
    
    public function setErrorIcon() {
        if ($this->hasError()) {
            return '<i class="fas fa-exclamation-triangle"></i>';
        } else {
            return "";
        }
    }

    public function getHTML() {
        //$message = htmlspecialchars($this->message);
        $message = htmlspecialchars($this->message);
        if ($this->hasError()) {
            return '<span class="error">' . $message . '</span>';
            
        } else {
            return '<span>' . $message . '</span>';
        }
    }
    
}

class Fields {
    private $fields = array();
    
    public function addField($name, $message = '') {
        $field = new Field($name, $message);
        $this->fields[$field->getName()] = $field;
    }

    public function getField($name) {
        return $this->fields[$name];
    }

    public function hasErrors() {
        foreach ($this->fields as $field) {
            if ($field->hasError()) { return true; }
        }
        return false;
    }
}
?>