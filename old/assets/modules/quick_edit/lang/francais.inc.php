<?php

/*
 *  Written by: Adam Crownoble
 *  Contact: adam@obledesign.com
 *  Updated: 05/12/2006 by David Molli�re
 *  For: MODx cms (modxcms.com)
 *  Description: Class for the QuickEditor
 */

/*
                             License

QuickEdit - A MODx module which allows the editing of content via
            the frontent of the site
Copyright (C) 2005  Adam Crownoble

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

$QE_lang['QE_lang'] = 'fr';
$QE_lang['QE_xml_lang'] = 'fr'; 
$QE_lang['QE_charset'] = 'iso-8859-1';
$QE_lang['QE_title'] = 'QuickEdit'; // please change only if it violates local trademarks
$QE_lang['QE_show_links'] = 'Afficher les liens';
$QE_lang['QE_hide_links'] = 'Masquer les liens'; 
$QE_lang['QE_someone_editing'] = 'Une autre personne modifie actuellement ce document';
$QE_lang['QE_cant_find_content'] = 'Ne trouve pas de contenu � modifier';
$QE_lang['QE_description'] = 'Modifier les pages � partir de la partie publique du site';
$QE_lang['document_opt_hide_menu'] = 'Hide in menu';
$QE_lang['revert'] = 'Annuler';
$QE_lang['apply'] = 'Appliquer';
$QE_lang['revert_prompt'] = 'Annuler toutes vos modifications ?';
$QE_lang['QE_no_edit_rights'] = 'vous n\'avez pas les droits n�cessaire pour �diter ce document';
$QE_lang['ok'] = 'OK';
$QE_lang['setting'] = 'configuration';
$QE_lang['content'] = 'contenu';
$QE_lang['go'] = 'aller �';
$QE_lang['manager'] = 'Manager';
$QE_lang['help'] = 'Aide';
$QE_lang['edit'] = 'Editer';
$QE_lang['logout'] = 'D�connecter';
$QE_lang['close'] = 'Fermer';
$QE_lang['document_title'] = 'Titre';
$QE_lang['document_title_help'] = 'Saisir le nom / titre du document ici. Attention � ne pas utiliser de caract�res interdits (backlash par exemple)!';
$QE_lang['long_title'] = 'Titre long';
$QE_lang['document_long_title_help'] = 'Ici vous pouvez saisir un titre long pour votre document web. Ce champ peut �tre utile pour l\'indexation par les moteurs de recherche, et/ou peut servir de description compl�mentaire.';
$QE_lang['document_description'] = 'Description';
$QE_lang['document_description_help'] = 'Vous pouvez saisir une description (optionnelle) de votre document ici.';
$QE_lang['document_content'] = 'Contenu du document';
$QE_lang['template'] = 'Mod�le';
$QE_lang['page_data_template_help'] = 'Ici vous pouvez s�lectionner quel mod�le est utilis� par le document.';
$QE_lang['document_alias'] = 'Alias du document';
$QE_lang['document_alias_help'] = 'Ici vous pouvez s�lectionner un alias pour le document. Cela donnera acc�s au document via :\n\nhttp://mondomaine.tld/alias\n\nCela n\'est utile que si vous avez activ� les URLs simples (FURLs).';
$QE_lang['document_opt_published'] = 'Publi� ?';
$QE_lang['document_opt_published_help'] = 'Cochez cette case pour que le document soit publi� juste apr�s l\'avoir sauvegard�.';
$QE_lang['document_summary'] = 'R�sum�';
$QE_lang['document_summary_help'] = 'Saisissez ici un bref r�sum� du document (optionnel)';
$QE_lang['document_opt_menu_index'] = 'Index de menu';
$QE_lang['document_opt_menu_index_help'] = 'L\'index de menu est un champ que vous pouvez utiliser pour trier les items de menu.';
$QE_lang['document_opt_menu_title'] = 'Titre de menu';
$QE_lang['document_opt_menu_title_help'] = 'Le champ titre de menu sert � afficher un titre diff�rent du titre du document dans votre menu.';
$QE_lang['document_opt_show_menu'] = 'Afficher dans le menu';
$QE_lang['document_opt_show_menu_help'] = 'S�lectionnez cette option pour afficher le document dans le menu. Merci de noter que suivant le snippet utilis� pour la g�n�ration du menu, cette option peut �tre ignor�e.';
$QE_lang['page_data_searchable'] = 'Rechercheable';
$QE_lang['page_data_searchable_help'] = 'Cochez cette case autorisera le moteur interne du site � indexer ce document.';
$QE_lang['page_data_cacheable'] = 'Mettre en cache';
$QE_lang['page_data_cacheable_help'] = 'Activer cette option permettra de conserver une copie de la page g�n�r�e dans un dossier temporaire (cache), ce qui permet d\'am�liorer la vitesse de chargement des pages.';

?>
