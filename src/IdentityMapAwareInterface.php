<?php

namespace Xpwales\IdentityMap;

interface IdentityMapAwareInterface
{
    /**
     * @param IdentityMapInterface $identityMap
     *
     * @return $this
     */
    public function setIdentityMap(IdentityMapInterface $identityMap);

    /**
     * @return IdentityMapInterface
     */
    public function getIdentityMap();

}//end interface