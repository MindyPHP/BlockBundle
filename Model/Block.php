<?php

declare(strict_types=1);

/*
 * Studio 107 (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Model;

use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\TextField;
use Mindy\Orm\Model;

/**
 * Class Block
 *
 * @property string $slug
 * @property string $content
 */
class Block extends Model
{
    public static function getFields()
    {
        return [
            'slug' => [
                'class' => CharField::class,
            ],
            'content' => [
                'class' => TextField::class,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->slug;
    }
}
