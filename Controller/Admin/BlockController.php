<?php

declare(strict_types=1);

/*
 * Studio 107 (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Controller\Admin;

use Mindy\Bundle\BlockBundle\Form\Admin\BlockForm;
use Mindy\Bundle\BlockBundle\Model\Block;
use Mindy\Bundle\MindyBundle\Controller\Controller;
use Mindy\Bundle\PaginationBundle\Utils\PaginationTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BlockController extends Controller
{
    use PaginationTrait;

    public function list(Request $request)
    {
        $qs = Block::objects();

        $pager = $this->createPagination($qs);

        return $this->render('admin/block/list.html', [
            'blocks' => $pager->paginate(),
            'pager' => $pager->createView(),
        ]);
    }

    public function create(Request $request)
    {
        $block = new Block();

        $form = $this->createForm(BlockForm::class, $block, [
            'method' => 'POST',
            'action' => $this->generateUrl('admin_block_create'),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (false === $block->save()) {
                throw new \RuntimeException('Error while save Block');
            }

            $this->addFlash('success', 'Меню успешно сохранено');

            return $this->redirectToRoute('admin_block_list');
        }

        return $this->render('admin/block/create.html', [
            'form' => $form->createView(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $block = Block::objects()->get(['id' => $id]);
        if (null === $block) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(BlockForm::class, $block, [
            'method' => 'POST',
            'action' => $this->generateUrl('admin_block_update', ['id' => $id]),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if (false === $block->save()) {
                throw new \RuntimeException('Error while save Block');
            }

            $this->addFlash('success', 'Меню успешно сохранено');

            return $this->redirectToRoute('admin_block_list');
        }

        return $this->render('admin/block/update.html', [
            'form' => $form->createView(),
            'Block' => $block,
        ]);
    }

    public function remove(Request $request, $id)
    {
        $block = Block::objects()->get(['id' => $id]);
        if (null === $block) {
            throw new NotFoundHttpException();
        }

        $block->delete();

        $this->addFlash('success', 'Меню успешно удалено');

        return $this->redirectToRoute('admin_block_list');
    }
}
