<?php

namespace App;

class Autoloader
{
    /**
     *                      /!\ IMPORTANT /!\
     * à remplir avec les Chemins depuis la racine du projet vers les class
     *                      /!\    /!\    /!\
     */

    public static $folderList = ["model/", "controller/", "src/repository/"];

    /**
     *
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoloadClass'));
    }

    /**
     * fonction qui se charge de l'autoload des class
     */
    public static function autoloadClass($className)
    {
        // parcours de chaque dossier dans $folderList
        foreach (self::$folderList as $folder) {
            $fileFound = false;

            // le chemin vers le fichier de la class
            $path = __DIR__ . "/";

            // nom du fichier de la class
            $fileName = str_replace(__NAMESPACE__ . '\\', '', $className);
            $fileName = str_replace('\\', '/', $fileName);
            $fileName =  $fileName . ".php";

            // vérification si le fichier de la class se trouve dans la liste de dossier de $folderList
            $fileFound = self::findFile($fileName, $folder);

            if ($fileFound == true) {

                require_once($path . $fileName);
                break;
            }
        }
    } // public static function autoloadClass()

    /**
     * fonction qui se charge de vérifier l'éxistence du fichier de la class
     */
    private static function findFile($className, $folder)
    {
        $path = __DIR__ . "/" . $folder;

        // ouverture du dossier
        if ($folderOpened = opendir($path)) {
            // lecture du contenu du dossier
            while (($fichier = readdir($folderOpened)) !== false) {
                if (preg_match('#^[a-zA-Z0-9_]+\.php$#', $fichier)) {
                    // si le fichier trouvé correspond à celui de la class
                    if ($folder.$fichier == $className) return true;
                }
            } // while
        }
    } // private static function findFile()
}
