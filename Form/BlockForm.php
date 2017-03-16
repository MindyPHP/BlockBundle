<?php

/*
 * (c) Studio107 <mail@studio107.ru> http://studio107.ru
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Mindy\Bundle\AdminBundle\Form\Type\ButtonsType;
use Mindy\Bundle\BlockBundle\Model\Block;
use Mindy\Bundle\FormBundle\Form\Type\SlugType;
use Mindy\Validation\Alphanumeric;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlockForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slug', SlugType::class, [
                'label' => 'Слаг',
                'constraints' => [
                    new Alphanumeric()
                ]
            ])
            ->add('content', CKEditorType::class, [
                'label' => 'Содержимое',
            ])
            ->add('buttons', ButtonsType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Block::class,
        ]);
    }
}
