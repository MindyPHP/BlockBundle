<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Library;

use Mindy\Bundle\BlockBundle\Model\Block;
use Mindy\Template\Library;

class BlockLibrary extends Library
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

    /**
     * @return array
     */
    public function getTags()
    {
        return [];
    }
}
