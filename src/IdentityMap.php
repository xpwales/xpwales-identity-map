<?php

namespace Xpwales\IdentityMap;

use Xpwales\Identity\Identity\IdentityInterface;
use Xpwales\IdentityMap\Exception;

class IdentityMap implements IdentityMapInterface
{
    /**
     * @var array
     */
    private $entities = array();

    /**
     * @inheritdoc
     *
     * @throws Exception\InvalidArgumentException on non-object entity param
     */
    public function attach(IdentityInterface $identity, $entity)
    {
        $idKey = $this->assembleIdKey($identity);

        if (is_object($entity) === false) {
            $msg = sprintf('Entity must be an object, %s given', gettype($entity));
            throw new Exception\InvalidArgumentException($msg);
        }

        if (array_key_exists($idKey, $this->entities) === false) {
            $this->entities[$idKey] = $entity;
            return true;
        }

        return false;
    }

    /**
     * @inheritdoc
     */
    public function detach(IdentityInterface $identity)
    {
        $idKey = $this->assembleIdKey($identity);

        if (array_key_exists($idKey, $this->entities) === true) {
            unset($this->entities[$idKey]);
            return true;
        }

        return false;
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
     * @throws Exception\InvalidArgumentException on incomplete identity
     *
     * @return string
     */
    private function assembleIdKey(IdentityInterface $identity)
    {
        if ($identity->isComplete() === false) {
            $msg = 'Identity must be complete for ID key assembly';
            throw new Exception\InvalidArgumentException($msg);
        }

        $idKeyArr   = [];
        $idKeyArr[] = $identity->getDomainspace();

        foreach ($identity->getValues() as $value) {
            $idKeyArr[] = $value;
        }//end loop

        $idKey = implode('_', $idKeyArr);

        return $idKey;
    }

}//end class