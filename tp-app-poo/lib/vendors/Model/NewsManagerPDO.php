<?php
namespace Model;

use \Entity\News;

class NewsManagerPDO extends NewsManager
{
    protected function add(News $news)
    {
        $requete = $this->dao->prepare('INSERT INTO news SET auteur = :auteur, titre = :titre, contenu = :contenu, dateAjout = NOW(), dateModif = NOW()');
    
        $requete->bindValue(':titre', $news->titre());
        $requete->bindValue(':auteur', $news->auteur());
        $requete->bindValue(':contenu', $news->contenu());
    
        $requete->execute();
    }

    public function count()
    {
        return $this->dao->query('SELECT COUNT(*) FROM news')->fetchColumn();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM news WHERE id = '.(int) $id);
    }

    // Appelle les données qui seron affiche dans la page index
    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT id, auteur, titre, contenu, image, dateAjout, dateModif FROM news ORDER BY id DESC';
    
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }
    
        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
    
        $listeNews = $requete->fetchAll();
    
        foreach ($listeNews as $news)
        {
            $news->setDateAjout(new \DateTime($news->dateAjout()));
            $news->setDateModif(new \DateTime($news->dateModif()));
        }
    
        $requete->closeCursor();

        return $listeNews;
    }

    // Appelle les données qui affiche les commentaires
    public function getListComment($debut = -1, $limite = -1)
    {
        $sql = 'SELECT id, news, auteur, contenu, date, etat FROM comments ORDER BY id DESC';

        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');

        $listeComment = $requete->fetchAll();

        $requete->closeCursor();

        return $listeComment;
    }
// todo Crée un  fichier en s'inspirant de celui la pour manage commentaire 'commenteManagerPDO.php'

    // Appel les données qui seron afficher dans une page unique
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT id, auteur, titre, contenu, image, dateAjout, dateModif FROM news WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();
    
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\News');
    
        if ($news = $requete->fetch())
        {
            $news->setDateAjout(new \DateTime($news->dateAjout()));
            $news->setDateModif(new \DateTime($news->dateModif()));
      
            return $news;
        }
    
        return null;
    }

    protected function modify(News $news)
    {
        $requete = $this->dao->prepare('UPDATE news SET auteur = :auteur, titre = :titre, contenu = :contenu, dateModif = NOW() WHERE id = :id');
    
        $requete->bindValue(':titre', $news->titre());
        $requete->bindValue(':auteur', $news->auteur());
        $requete->bindValue(':contenu', $news->contenu());
        $requete->bindValue(':id', $news->id(), \PDO::PARAM_INT);
    
        $requete->execute();
    }
}