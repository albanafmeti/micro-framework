<?php

namespace App\Libs;


class Validation
{
    private $errors = [];
    public $request;

    public static function create()
    {
        return new self();
    }

    public function check(Request $request, Array $controls)
    {
        $this->request = $request;
        foreach ($controls as $field => $control) {

            $control = explode("|", $control);

            foreach ($control as $ctrl) {
                $ctrl = trim($ctrl);
                switch ($ctrl) {

                    case "required":

                        if (empty($request->input($field))) {
                            $this->errors[$field] = self::getMessage("required", $field);
                        }
                        break;
                    case "email":
                        if (!filter_var($request->input($field), FILTER_VALIDATE_EMAIL)) {
                            $this->errors[$field] = self::getMessage("email", $field);
                        }
                        break;
                }
            }
        }

        return $this;

    }

    public function action($route)
    {
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                Flash::addDanger($error);
                break;
            }
            Data::create()->model($this->request);
            redirect($route);
        }
    }

    private static function getMessage($msg_label, $field)
    {
        $messages = [
            "required" => ":field is required!",
            "email" => ":field must be a correct email address!"
        ];

        return str_replace(":field", ucfirst($field), $messages[$msg_label]);
    }

}