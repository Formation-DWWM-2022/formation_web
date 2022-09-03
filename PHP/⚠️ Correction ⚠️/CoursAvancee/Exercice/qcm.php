<?php

class Qcm
{
    private $questions;
    private $appreciation;

    public function __construct()
    {
        $this->questions = array();
        $this->appreciation = array();
    }

    public function ajouterQuestion($question)
    {
        $this->questions[] = $question;
        return $this;
    }

    public function setAppreciation($appreciation)
    {
        foreach ($appreciation as $key => $appr) {
            if (is_numeric($key))
                $this->appreciation[(int)$appr] = $appr;
            else {
                list($min, $max) = explode('-', $key);
                if ($min > $max)
                    list($min, $max) = array($max, $min);
                for ($i = (int)$min; $i <= $max; $i++)
                    $this->appreciation[$i] = $appr;
            }
        }
        return $this;
    }

    public function generer()
    {
        $id = md5(serialize($this));
        if (isset($_POST['qcm_id']) and $_POST['qcm_id'] == $id) {
            $nbrBonneReponses = 0;
            foreach ($this->questions as $i => $question) {
                echo 'Question ' . $i . ' : ' . htmlspecialchars($question->getQuestion()) . '<br /><br />';
                if ($_POST['qcm_q' . $i] == $question->getNumBonneReponse()) {
                    echo 'Bonne réponse!<br /><br />';
                    $nbrBonneReponses++;
                } else
                    echo 'Mauvaise réponse : ' . htmlspecialchars($question->getReponse($_POST['qcm_q' . $i])->getText()) . '<br />';
                echo 'La bonne réponse était : ' . htmlspecialchars($question->getBonneReponse()->getText()) . '<br /><br />';
                echo 'Explication : ' . htmlspecialchars($question->getExplication());
                echo '<hr />';
            }
            $note = round($nbrBonneReponses / count($this->questions) * 20);
            echo 'Note : ' . $note . '/20<br />';
            if (isset($this->appreciation[$note]))
                echo 'Appréciation : ' . htmlspecialchars($this->appreciation[$note]);
        } else {
            echo '<form method="post" />';
            echo '<input type="hidden" value="' . $id . '" name="qcm_id" />';
            foreach ($this->questions as $i => $question) {
                echo '<fieldset>Question ' . $i . ' : ' . htmlspecialchars($question->getQuestion()) . '<br />';
                foreach ($question->getReponses() as $j => $reponse) {
                    echo '<input type="radio" name="qcm_q' . $i . '" value="' . $j . '" />';
                    echo htmlspecialchars($reponse->getText()) . '<br />';
                }
                echo '</fieldset><br />';
            }
            echo '<input type="submit" value="envoyer" /></form>';
        }
    }
}

class Question
{
    private $question;
    private $reponses;
    private $explication;

    public function __construct($question)
    {
        $this->question = $question;
        $this->reponse = array();
    }

    public function ajouterReponse($reponse)
    {
        $this->reponses[] = $reponse;
        return $this;
    }

    public function setExplications($explication)
    {
        $this->explication = $explication;
        return $this;
    }

    public function getNumBonneReponse()
    {
        foreach ($this->reponses as $i => $reponse)
            if ($reponse->getStatus())
                return $i;
    }

    public function getBonneReponse()
    {
        foreach ($this->reponses as $reponse)
            if ($reponse->getStatus())
                return $reponse;
    }

    public function getReponses()
    {
        return $this->reponses;
    }

    public function getReponse($num)
    {
        return $this->reponses[$num];
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function getExplication()
    {
        return $this->explication;
    }
}


class Reponse
{
    private $reponse;
    private $status;
    const MAUVAIS_REPONSE = false;
    const BONNE_REPONSE = true;

    public function __construct($reponse, $status = self::MAUVAIS_REPONSE)
    {
        $this->reponse = $reponse;
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getText()
    {
        return $this->reponse;
    }
}

$qcm = new Qcm();

$question1 = new Question('Et paf, ça fait ...');
$question1->ajouterReponse(new Reponse('Des mielpops'))
    ->ajouterReponse(new Reponse('Des chocapics', Reponse::BONNE_REPONSE))
    ->ajouterReponse(new Reponse('Des actimels'))
    ->setExplications('Et oui, la célèbre citation est « Et paf, ça fait des chocapics ! »');

$question2 = new Question('POO signifie');
$question2->ajouterReponse(new Reponse('Php Orienté Objet'))
    ->ajouterReponse(new Reponse('ProgrammatiOn Orientée'))
    ->ajouterReponse(new Reponse('Programmation Orientée Objet', Reponse::BONNE_REPONSE))
    ->setExplications('Sans commentaires si vous avez eu faux :-°');

$qcm->ajouterQuestion($question1)
    ->ajouterQuestion($question2)
    ->setAppreciation(array(
        '0-10' => 'Pas top du tout ...',
        '10-20' => 'Très bien ...'
    ))
    ->generer();
