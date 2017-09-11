<?php
namespace App\Frontend\Modules\News;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \OCFram\FormHandler;
// TODO Ajouter une modération commentaire et un timestamp et un recaptcha qui empeche le spam
class NewsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $nombreNews = $this->app->config()->get('nombre_news');
    $maNews = $this->app->config()->get('first_news');
    $preNews = $this->app->config()->get('pre_news');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', ' Mon blog d&apos;écrivain ');
    
    // On récupère le manager des news.
    $manager = $this->managers->getManagerOf('News');

    $listeNews = $manager->getList(0, $nombreNews);
    $listeComment = $manager->getListComment(0, $nombreNews);
    // todo Si dessous je pourrez ajouter un lien suivant
    $firstNews = $manager->getList(0, $maNews);
    $preNews = $manager->getList($_GET["pageSuivante"], $preNews+$_GET["pageSuivante"]);
    
	// Compte le nombre de caractères de chaque poste
    foreach ($listeNews as $news)
    {
      if (strlen($news->contenu()) > $nombreCaracteres)
      {
        $debut = substr($news->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $news->setContenu($debut);
      }
    }
    
    // On ajoute la variable $listeNews à la vue.
    $this->page->addVar('listeNews', $listeNews);
    $this->page->addVar('firstNews', $firstNews);
    $this->page->addVar('preNews', $preNews);
    $this->page->addVar('listeComment', $listeComment);
  }
  
  public function executeShow(HTTPRequest $request)
  {
    $news = $this->managers->getManagerOf('News')->getUnique($request->getData('id'));
    
    if (empty($news))
    {
      $this->app->httpResponse()->redirect404();
    }

    // NB Pour afficher un champs crée dans la BDD il faut modifier la ligne si dessous et la page news.php
    $this->page->addVar('title', $news->titre());
    $this->page->addVar('image', $news->image());
    $this->page->addVar('etat', $news->etat());
    $this->page->addVar('date', $news->date());
    $this->page->addVar('news', $news);
    $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($news->id()));
  }

    public function executeSignalComment(HTTPRequest $request)
    {
        $this->managers->getManagerOf('Comments')->signal($request->getData('id'));

        $this->app->user()->setFlash('Le commentaire a bien été signalé !');

        $this->app->httpResponse()->redirect('.');
    }

    public function executeDeco(HTTPRequest $request)
    {
        $_SESSION['auth'] = false;

        $this->app->user()->setFlash('Vous vous etes déconnecté !');

        $this->app->httpResponse()->redirect('.');
    }

    public function executeBio(HTTPRequest $request)
    {
        $this->app->user()->setFlash('Ma bio');

        // On ajoute une définition pour le titre.
        $this->page->addVar('title', ' Ma biographie ');


        // On récupère le manager des news.
        $manager = $this->managers->getManagerOf('News');

        $bioNews = $manager->getList(0, 99);


        // On ajoute la variable $listeNews à la vue.
        $this->page->addVar('bioNews', $bioNews);
    }

    public function executeContacte(HTTPRequest $request)
    {

        // On ajoute une définition pour le titre.
        $this->page->addVar('title', ' Me contacter ');


        // On récupère le manager des news.
        $manager = $this->managers->getManagerOf('News');

        $bioNews = $manager->getList(0, 99);


        // On ajoute la variable $listeNews à la vue.
        $this->page->addVar('bioNews', $bioNews);
    }

    public function executeInsertComment(HTTPRequest $request)
  {
    // Si le formulaire a été envoyé.
    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'news' => $request->getData('news'),
        'auteur' => $request->postData('auteur'),
        'contenu' => $request->postData('contenu')
      ]);
    }
    else
    {
      $comment = new Comment;
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');
      
      $this->app->httpResponse()->redirect('news-'.$request->getData('news').'.html');
    }

    $this->page->addVar('comment', $comment);
    $this->page->addVar('form', $form->createView());
    $this->page->addVar('title', 'Ajout d\'un commentaire');
  }
}