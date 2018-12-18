<?php

namespace App\Form;

use App\Entity\Backlog;
use App\Entity\Status;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class BacklogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('slug', TextType::class )
            ->add('description', TextType::class )
            ->add('timestamp' )
            ->add('notation', IntegerType::class)
	        ->add('status',  EntityType::class, array(
		        'class' => Status::class,
		        'query_builder' => function (EntityRepository $er) {
			        return $er->createQueryBuilder('u')
			                  ->orderBy('u.name', 'ASC');
		        },
		        'choice_label' => 'name',
	        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Backlog::class,
        ]);
    }
}
