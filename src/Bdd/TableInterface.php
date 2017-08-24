<?php

namespace Blog\Bdd;
/**
 * Interface TableInterface
 * @package Blog\Bdd
 */
interface TableInterface
{
    public function createdEvent();
    public function updateEvent();
    public function normalize($data);
}
