<?php
namespace App\Form;

use App\Entity\Proveedor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// Tipos de campo que usamos
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'label' => 'Nombre'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Correo electrónico'
            ])
            ->add('telefono', TextType::class, [
                'label' => 'Teléfono de contacto',
                'required' => false
            ])
            ->add('tipo', ChoiceType::class, [
                'label' => 'Tipo de proveedor',
                'choices' => [
                    'Hotel' => 'hotel',
                    'Pista' => 'pista',
                    'Complemento' => 'complemento',
                ],
            ])
            ->add('activo', CheckboxType::class, [
                'label' => 'Activo',
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Proveedor::class,
        ]);
    }
}
