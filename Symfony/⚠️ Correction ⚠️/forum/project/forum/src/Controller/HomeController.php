<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Message;
use App\Form\MessageType;
use App\Form\SearchType;
use App\Repository\CategoryRepository;
use App\Repository\MessageRepository;
use DateTime;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private CategoryRepository $categoryRepository;
    private MessageRepository $messageRepository;

    public function __construct(CategoryRepository $categoryRepository, MessageRepository $messageRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->messageRepository = $messageRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $categories = $this->categoryRepository->findAllWhereParentNullOrderByNumberMessage();
        return $this->render('home/index.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/message/{message}', name: 'app_front_message_show')]
    public function showMessage(Request $request, Message $message): Response
    {
        $form = $this->newMessage($request, $message->getCategory(), $message);
        $otherMessages = $this->messageRepository->findAllByCategoryParent($message->getCategory());
        return $this->render('home/show_message.html.twig', [
            'message' => $message,
            'otherMessages' => $otherMessages,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/category/{category}', name: 'app_front_category_show')]
    public function showCategory(Request $request, Category $category, PaginatorInterface $paginator): Response
    {
        $form = $this->newMessage($request, $category);
//        $messages = $this->messageRepository->findAllByCategoryParent($category);

        $pagination = $paginator->paginate(
            $this->messageRepository->findAllByCategoryParentQueryBuilder($category), /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );

        return $this->render('home/show_category.html.twig', [
            'category' => $category,
            //'messages' => $messages,
            'pagination' => $pagination,
            'form' => $form->createView(),
        ]);
    }

    public function newMessage(Request $request, Category $category, Message $message = null): FormInterface
    {
        $newMessage = new Message();
        $newMessage->setDateCreated(new DateTime());
        $newMessage->setCategory($category);
        $newMessage->setMessage(null);
        if ($message != null) {
            $title = $message->getTitle();
            $newMessage->setTitle($title);
            $newMessage->setMessage($message);
        }
        $newMessage->setUser($this->getUser());

        $form = $this->createForm(MessageType::class, $newMessage);
        if ($message != null) {
            $form->remove('title');
        }

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->messageRepository->save($newMessage, true);
            $this->addFlash('success', 'Votre message a été enregistrée');
            $form = $this->createForm(MessageType::class, $newMessage);
        }

        return $form;
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route("/contact", name: "app_contact")]
    public function sendMail(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createFormBuilder()
            ->add('nom', TextType::class)
            ->add('email', EmailType::class)
            ->add('content', TextareaType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Message'))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() and $form->isValid()) {
            $data = $form->getData();
            $mail = (new Email())
                ->from($data['email'])
                ->to(new Address('contact@drosalys.fr', 'Alexandre'))
                ->subject('Email de contact')
                ->html('<p>' . $data['content'] . '</p>');

            $mailer->send($mail);
            $this->addFlash("success", "Votre message a bien été envoyée");
        }

        return $this->render('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function recherchePost(Request $request, PaginatorInterface $paginator): Response
    {
        $formR = $this->createForm(SearchType::class);
        $pagination = [];

        $formR->handleRequest($request);
        if ($formR->isSubmitted() && $formR->isValid()) {
            $title = $formR->getData()['title'];
            $pagination = $paginator->paginate(
                $this->messageRepository->findByTitle($title), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                5/*limit per page*/
            );
        }

        return $this->render('home/show_category.html.twig', [
            'formR' => $formR->createView(),
            'pagination' => $pagination,
        ]);
    }

}
