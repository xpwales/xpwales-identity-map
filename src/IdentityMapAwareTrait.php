<?php

namespace Xpwales\IdentityMap;

use Xpwales\IdentityMap\Exception;

trait IdentityMapAwareTrait
{
    /**
     * @var IdentityMapInterface
     */
    private $identityMap = null;

    /**
     * @see IdentityMapAwareInterface
     *
     * @param IdentityMapInterface $identityMap
     *
     * @return $this
     */
    public function setIdentityMap(IdentityMapInterface $identityMap)
    {
        $this->identityMap = $identityMap;
        return $this;
    }

    /**
     * @see IdentityMapAwareInterface
     * 
     * @return IdentityMapInterface
     */
    public function getIdentityMap()
    {
        if (null === $this->identityMap) {
            $msg = sprintf('Identity map must be set before access in %s', __CLASS__);
            throw new Exception\RuntimeException($msg);
        }

        return $this->identityMap;
    }

}//end trait