<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Entity\Service;
use App\Repository\EquipementRepository;
use App\Repository\ServiceRepository;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactFormType;
use App\Recaptcha\RecaptchaValidator;
use Symfony\Component\Form\FormError;

class MainController extends AbstractController
{
    /**
     * Page d'accueil
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * Page informations région sous-dotée
     * @Route("/region", name="region")
     */
    public function region(): Response
    {
        return $this->render('main/region.html.twig');
    }

    /**
     * Page informations soins
     * @Route("/soins", name="service")
     */
    public function service(ServiceRepository $services, EquipementRepository $equipements, Request $request): Response
    {


        return $this->render('main/service.html.twig', [
            'service' => $services->findAll(),
            'equipement' =>$equipements->findAll(),
        ]);
    }

    /**
	 * @Route("/contact", name="contact")
	 */
	public function contact(Request $request, RecaptchaValidator $recaptcha, MailerInterface $mailer): Response
	{
		// Création d'un nouveau formulaire et d'un nouveau message de contact
		$contactForm = $this->createForm(ContactFormType::class);

		// Symfony va remplir $newContact grâce aux données du formulaire envoyé
		$contactForm->handleRequest($request);

		// Pour savoir si le formulaire a été envoyé et validé, on a accès à cette condition :
		if ( $contactForm->isSubmitted() )
		{
/* Todo: Problème d'affichage du recapcha
			// Si le captcha n'est pas valide, on crée une nouvelle erreur dans le formulaire
			if ( !$recaptcha->verify($request->request->get('g-recaptcha-response', ""), $request->server->get('REMOTE_ADDR')) )
			{

				// Ajout d'une nouvelle erreur manuellement dans le formulaire
				$contactForm->addError(new FormError('Veuillez valider le captcha !'));
			}
 */
			if ( $contactForm->isValid() )
			{

				$email = ( new TemplatedEmail() )
					->from(new Address($contactForm->get("email")->getData(), 'noreply'))
					->to('scmkinecarton@gmail.com')
					->subject($contactForm->get("subject")->getData())
					->htmlTemplate('email/contact.html.twig')    // Fichier twig du mail en version html
					->textTemplate('email/contact.txt.twig')     // Fichier twig du mail en version text

					->context([
						'contact_email'   => $contactForm->get("email")->getData(),
						'contact_subject' => $contactForm->get("subject")->getData(),
						'content'         => $contactForm->get("content")->getData(),
					]);
				// Envoi du mail
				$mailer->send($email);

				// Création d'un message flash de type "success"
				$this->addFlash('success', 'Votre message de contact a bien été envoyé, nous vous répondrons dans les meilleurs délais !');

				// return $this->redirectToRoute('main_contact');
				return $this->render('contact/requestContact.html.twig',
					[
						'contact_email'   => $contactForm->get("email")->getData(),
						'contact_subject' => $contactForm->get("subject")->getData(),
						'content'         => $contactForm->get("content")->getData(),
					]);

			}else{
                // Création d'un message flash de type "erreur"
				$this->addFlash('error', 'Une erreur est survenue, veuillez renvoyer votre message.');
            }

		}

		//Pour que la vue puisse afficher le formulaire, on doit lui envoyer le formulaire généré, avec $formContact->createView()
		return $this->render('contact/contact.html.twig', [
			'contactForm' => $contactForm->createView(),
		]);
	}

}
