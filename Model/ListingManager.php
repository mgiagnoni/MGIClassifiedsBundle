<?php

/*
 * This file is part of the AcmeClassifiedsBundle package.
 *
 * Copyright 2011 Massimo Giagnoni <gimassimo@gmail.com>
 *
 * This source file is subject to the MIT license. Full copyright and license
 * information are in the LICENSE file distributed with this source code.
 */

namespace Acme\ClassifiedsBundle\Model;

use Lyra\AdminBundle\Model\ORM\ModelManager as BaseManager;

class ListingManager extends BaseManager
{
    public function deleteExpiredListings()
    {
        $this->getRepository()->createQueryBuilder('a')
            ->delete()
            ->where('a.expires_at < :d')
            ->setParameter('d', new \DateTime('now'))
            ->getQuery()->execute();

        return true;
    }

    public function getBaseListQueryBuilder()
    {
        $qb = parent::getBaseListQueryBuilder();
        $qb->select('a');
        $qb->leftJoin('a.category', 'category');

        return $qb;
    }
}
