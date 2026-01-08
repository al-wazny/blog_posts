<?php

namespace BlogPosts\Core;

use BlogPosts\Core\AbstractRepository;

interface ServiceInterface
{
    public function __construct(AbstractRepository $repository);
}
