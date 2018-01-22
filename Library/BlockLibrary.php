<?php

declare(strict_types=1);

/*
 * Studio 107 (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Library;

use Mindy\Bundle\BlockBundle\Model\Block;
use Mindy\Template\Library\AbstractLibrary;

class BlockLibrary extends AbstractLibrary
{
    /**
     * @return array
     */
    public function getHelpers()
    {
        return [
            'get_block' => function ($slug) {
                return Block::objects()->get(['slug' => $slug]);
            },
        ];
    }
}
