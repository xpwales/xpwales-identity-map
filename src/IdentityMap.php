<?php

namespace Xpwales\IdentityMap;

use Xpwales\Identity\Identity\IdentityInterface;
use Xpwales\Identity\IdentityAware\IdentityAwareInterface;
use Xpwales\Identity\Utils\IdentityUtils;

class IdentityMap implements IdentityMapInterface
{
    /**
     * @var array
     */
    private $entities = array();

    /**
     * @inheritdoc
     */
    public function add(IdentityAwareInterface $object)
    {
        $idKey                  = $this->assembleIdKey($object->getIdentity());
        $this->entities[$idKey] = $object;
    }

    /**
     * @inheritdoc
     */
    public function remove(IdentityAwareInterface $object)
    {
        $idKey = $this->assembleIdKey($object->getIdentity());

        if (array_key_exists($idKey, $this->entities) === true) {
            unset($this->entities[$idKey]);
        }
    }

    /**
     * @inheritdoc
     */
    public function find(IdentityInterface $identity)
    {
        $idKey = $this->assembleIdKey($identity);

        if (array_key_exists($idKey, $this->entities) === true) {
            return $this->entities[$idKey];
        }

        return null;
    }

    /**
     * @param IdentityInterface $identity
     *
     * @return string
     */
    private function assembleIdKey(IdentityInterface $identity)
    {
        $idKey = IdentityUtils::assembleKey($identity);

        return $idKey;
    }

}//end class