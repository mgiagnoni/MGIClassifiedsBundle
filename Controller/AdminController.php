<?php

/*
 * This file is part of the AcmeClassifiedsBundle package.
 *
 * Copyright 2011 Massimo Giagnoni <gimassimo@gmail.com>
 *
 * This source file is subject to the MIT license. Full copyright and license
 * information are in the LICENSE file distributed with this source code.
 */

namespace Acme\ClassifiedsBundle\Controller;
use Lyra\AdminBundle\Controller\AdminController as BaseAdminController;

class AdminController extends BaseAdminController
{
    public function expiredAction()
    {
        if ('POST' === $this->getRequest()->getMethod()) {
            if ($this->getModelManager()->deleteExpiredListings()) {
                $this->setFlash('acme_classifieds success', 'Expired ads have been successfully deleted');
            }

            return $this->getRedirectToListResponse();
        }

        $renderer = $this->getDialogRenderer();

        return $this->container->get('templating')
            ->renderResponse('LyraAdminBundle:Admin:dialog.html.twig', array(
                'renderer' => $renderer
        ));
    }

    protected function executeBatchPublish($ids)
    {
        $this->getModelManager()->setFieldValueByIds('published', true, $ids);
    }

    protected function executeBatchUnpublish($ids)
    {
        $this->getModelManager()->setFieldValueByIds('published', false, $ids);
    }
}
