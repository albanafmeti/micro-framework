<?php
namespace App\Libs;


class Data
{
    public static function create()
    {
        return new self();
    }

    public function model($entity = null)
    {

        if (get_class($entity) == "App\\Libs\\Request") {
            foreach ($entity->request->all() as $key => $value) {
                Session::setArray(["saved_data", $key], $value);
            }

        } elseif (is_array($entity->getFillable())) {
            foreach ($entity->getFillable() as $attribute) {
                Session::setArray(["saved_data", $attribute], $entity->{$attribute});
            }
        }
    }

    public function value($field)
    {
        return Session::getFromArray(["saved_data", $field]);
    }

    public function clear()
    {
        Session::clear("saved_data");
    }
}