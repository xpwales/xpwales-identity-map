<?php

namespace Xpwales\IdentityMap;

use Xpwales\Identity\Identity\IdentityInterface;

interface IdentityMapInterface
{
    /**
     * @param IdentityInterface $identity
     * @param \stdClass         $entity
     *
     * @return bool
     */
    public function add(IdentityInterface $identity, $entity);

    /**
     * @param IdentityInterface $identity
     *
     * @return bool
     */
    public function remove(IdentityInterface $identity);

    /**
     * @param IdentityInterface $identity
     *
     * @return mixed|null
     */
    public function find(IdentityInterface $identity);
    
}//end interface