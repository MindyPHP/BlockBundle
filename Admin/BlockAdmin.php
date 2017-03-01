<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Admin;

use Mindy\Bundle\AdminBundle\Admin\AbstractModelAdmin;
use Mindy\Bundle\BlockBundle\Form\BlockForm;
use Mindy\Bundle\BlockBundle\Model\Block;

class BlockAdmin extends AbstractModelAdmin
{
    public $columns = ['slug'];

    public function getFormType()
    {
        return BlockForm::class;
    }

    public function getModelClass()
    {
        return Block::class;
    }
}
