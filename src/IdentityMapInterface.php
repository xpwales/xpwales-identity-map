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
    public function attach(IdentityInterface $identity, $entity);

    /**
     * @param IdentityInterface $identity
     *
     * @return bool
     */
    public function detach(IdentityInterface $identity);

    /**
     * @param IdentityInterface $identity
     *
     * @return mixed|null
     */
    public function find(IdentityInterface $identity);
    
}//end interface