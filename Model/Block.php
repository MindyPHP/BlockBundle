<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Model;

use Mindy\Orm\Fields\CharField;
use Mindy\Orm\Fields\TextField;
use Mindy\Orm\Model;
use Mindy\Validation\Alphanumeric;

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
                'validators' => [
                    new Alphanumeric()
                ]
            ],
            'content' => [
                'class' => TextField::class,
            ],
        ];
    }

    public function __toString()
    {
        return (string) $this->content;
    }
}
