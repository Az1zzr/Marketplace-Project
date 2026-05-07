<?php

namespace App\Form;

use App\Entity\Role;
use App\Entity\User;
use App\Repository\RoleRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, [
                'label' => 'First Name',
                'attr' => [
                    'autocomplete' => 'given-name',
                    'maxlength' => 100,
                    'placeholder' => 'John',
                ],
            ])
            ->add('nom', TextType::class, [
                'label' => 'Last Name',
                'attr' => [
                    'autocomplete' => 'family-name',
                    'maxlength' => 255,
                    'placeholder' => 'Doe',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'attr' => [
                    'autocomplete' => 'email',
                    'autocapitalize' => 'none',
                    'inputmode' => 'email',
                    'maxlength' => 255,
                    'placeholder' => 'john@example.com',
                    'spellcheck' => 'false',
                ],
            ])
            ->add('telephone', TelType::class, [
                'label' => 'Phone',
                'required' => false,
                'attr' => [
                    'autocomplete' => 'tel',
                    'maxlength' => 20,
                    'placeholder' => '+216 XX XXX XXX',
                ],
            ])
            ->add('dateNaissance', DateType::class, [
                'label' => 'Birth Date',
                'required' => false,
                'widget' => 'single_text',
                'attr' => [
                    'autocomplete' => 'bday',
                    'max' => (new \DateTimeImmutable())->format('Y-m-d'),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'The password fields must match.',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Please enter a password.',
                    ]),
                    new Assert\Length([
                        'min' => 8,
                        'max' => 72,
                        'minMessage' => 'Your password must be at least {{ limit }} characters long.',
                        'maxMessage' => 'Your password cannot be longer than {{ limit }} characters.',
                    ]),
                ],
                'first_options' => [
                    'label' => 'Password',
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'maxlength' => 72,
                        'placeholder' => 'Create a strong password',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirm Password',
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'maxlength' => 72,
                        'placeholder' => 'Repeat your password',
                    ],
                ],
            ])
            ->add('role', EntityType::class, [
                'class' => Role::class,
                'choice_label' => static fn (Role $role): string => ucwords(strtolower((string) $role->getNomRole())),
                'label' => 'Account Type',
                'placeholder' => '-- Select Role --',
                'query_builder' => static fn (RoleRepository $roleRepository) => $roleRepository->createPublicRegistrationQueryBuilder(),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
