<?php
/**
 * Ce fichier est développé pour la gestion de la librairie Mélanie2
 * Cette Librairie permet d'accèder aux données sans avoir à implémenter de couche SQL
 * Des objets génériques vont permettre d'accèder et de mettre à jour les données
 * ORM M2 Copyright © 2017 PNE Annuaire et Messagerie/MEDDE
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
namespace LibMelanie\Api\Melanie2;

use LibMelanie\Lib\Melanie2Object;
use LibMelanie\Objects\ObjectMelanie;
use LibMelanie\Config\ConfigMelanie;
use LibMelanie\Config\MappingMelanie;
use LibMelanie\Exceptions;
use LibMelanie\Log\M2Log;

/**
 * Classe pour la gestion des propriétés des évènements
 * Permet d'ajouter de nouvelles options aux évènements
 * implémente les API de la librairie pour aller chercher les données dans la base de données
 * Certains champs sont mappés directement ou passe par des classes externes
 * 
 * @author PNE Messagerie/Apitech
 * @package Librairie Mélanie2
 * @subpackage API Mélanie2
 *             @api
 * @property string $user Utilisateur lié à la preference
 * @property string $scope Scope lié à la preference
 * @property string $name Nom de la preference
 * @property string $value Valeur de la preference
 * @method bool load() Chargement la preference, en fonction de l'utilisateur, du scope et du nom
 * @method bool exists() Test si la preference existe, en fonction de l'utilisateur, du scope et du nom
 * @method bool save() Sauvegarde la preference dans la base de données
 * @method bool delete() Supprime la preference, en fonction de l'utilisateur, du scope et du nom
 */
class UserPrefs extends Melanie2Object {
  /**
   * Constructeur de l'objet
   * 
   * @param UserMelanie $usermelanie          
   */
  function __construct($usermelanie) {
    // Défini la classe courante
    $this->get_class = get_class($this);
    
    // M2Log::Log(M2Log::LEVEL_DEBUG, $this->get_class."->__construct()");
    // Définition de la propriété de l'évènement
    $this->objectmelanie = new ObjectMelanie('UserPrefs');
    
    // Définition des objets associés
    $this->objectmelanie->user = $usermelanie->uid;
  }
}