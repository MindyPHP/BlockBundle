<?php

declare(strict_types=1);

/*
 * Studio 107 (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\BlockBundle\Form\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Mindy\Bundle\BlockBundle\Model\Block;
use Mindy\Bundle\FormBundle\Form\Type\SlugType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class BlockForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('slug', SlugType::class, [
                'label' => 'Слаг',
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Callback(function ($value, ExecutionContextInterface $context, $payload) {
                        if (!empty($value) && !preg_match('/^[a-zA-Z0-9-_]+$/', $value, $matches)) {
                            $context
                                ->buildViolation('The string "%string%" contains an illegal character: it can only contain letters or numbers.')
                                ->setParameter('%string%', $value)
                                ->addViolation();
                        }
                    }),
                ],
            ])
            ->add('content', CKEditorType::class, [
                'label' => 'Содержимое',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Сохранить',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Block::class,
        ]);
    }
}
