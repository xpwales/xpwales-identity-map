<?php

namespace Xpwales\IdentityMap;

use Xpwales\Identity\Identity\IdentityInterface;
use Xpwales\Identity\IdentityAware\IdentityAwareInterface;

interface IdentityMapInterface
{
    /**
     * @param IdentityAwareInterface $object
     */
    public function add(IdentityAwareInterface $object);

    /**
     * @param IdentityAwareInterface $identity
     */
    public function remove(IdentityAwareInterface $object);

    /**
     * @param IdentityInterface $identity
     *
     * @return object|null
     */
    public function find(IdentityInterface $identity);
    
}//end interface