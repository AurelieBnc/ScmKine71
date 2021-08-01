<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class ContactFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			// Sujet pour résumer et identifier plus facilement la raison du contact
			->add('subject', TextType::class, [
				'label'       => 'Sujet du message',
				'attr'        => [
					'class' => 'form-control input-group-text mb-3',
					'placeholder' => 'Contact pour des rensignements sur ...',
				],
				'constraints' => [
					new NotBlank([
						'message' => 'Merci de renseigner un sujet',
					]),
					new Length([
						'min'        => 1,
						'max'        => 150,
						'minMessage' => 'Le sujet doit contenir au moins {{ limit }} caractères',
						'maxMessage' => 'Le sujet doit contenir au maximum {{ limit }} caractères',
					]),
				],
			])

			// Champ email qui servira pour répondre le cas échéant
			->add('email', EmailType::class, [
				'label'       => 'Email',
				'attr'        => [
					'class' => 'form-control input-group-text mb-3',
					'placeholder' => 'alice.dupont@exemple.com',
				],
				'constraints' => [
					new Email([
						'message' => 'L\'adresse email {{ value }} n\'est pas une adresse email valide',
					]),
					new NotBlank([
						'message' => 'Merci de renseigner une adresse email',
					]),
				],
			])

			// Contenu du message
			->add('content', TextareaType::class, [
				'label'       => 'Contenu de votre message',
				'attr'        => [
					'class' => 'form-control input-group-text mb-3',
					'rows'        => 16,
					'margin'      => 5,
					'placeholder' => 'Laissez votre message de contact',
				],
				'constraints' => [
					new NotBlank([
						'message' => 'Merci de renseigner un contenu',
					]),
					new Length([
						'min'        => 1,
						'max'        => 10000,
						'minMessage' => 'Le message doit contenir au moins {{ limit }} caractère(s)',
						'maxMessage' => 'Le message doit contenir au maximum {{ limit }} caractères',
					]),
				],
			])

			//Ajout d'un champ de type bouton de validation, envoyer est le texte du bouton
			->add('save', SubmitType::class, [
				'label' => 'Envoyer le message',
				'attr'  => [
					'class' => 'form-control input-group-text btn btn-outline-secondary mt-5',
					'data-mdb-ripple-duration' => '0',
				],
			]);

	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'attr'       => ['novalidate' => 'novalidate'],
		]);
	}
}
