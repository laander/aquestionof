<?php

/*
 *  Written by: Adam Crownoble
 *  Contact: adam@obledesign.com
 *  Created: 11/18/2005 -  Modified: 17/4/2007 translated to spanish by Luciano A. Ferrer
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

$QE_lang['QE_lang'] = 'es';
$QE_lang['QE_xml_lang'] = 'es';
$QE_lang['QE_charset'] = 'iso-8859-1';
$QE_lang['QE_title'] = 'QuickEdit'; // please change only if it violates local trademarks
$QE_lang['QE_show_links'] = 'Mostrar enlaces';
$QE_lang['QE_hide_links'] = 'Ocultar enlaces';
$QE_lang['QE_someone_editing'] = 'Alguien m�s est� editando este documento';
$QE_lang['QE_cant_find_content'] = 'No puede encontrarse contenido a editar';
$QE_lang['QE_description'] = 'Editar p�ginas desde el frontend del sitio';
$QE_lang['revert'] = 'Revertir';
$QE_lang['apply'] = 'Aplicar';
$QE_lang['revert_prompt'] = '�Deshacer TODAS sus modificaciones?';
$QE_lang['QE_no_edit_rights'] = 'Sin permiso de edici�n';
$QE_lang['ok'] = 'OK';
$QE_lang['content'] = 'Contenido';
$QE_lang['setting'] = 'Configuraciones';
$QE_lang['go'] = 'Ir';
$QE_lang['manager'] = 'Manager';
$QE_lang['help'] = 'Ayuda';
$QE_lang['edit'] = 'Editar';
$QE_lang['logout'] = 'Salir';
$QE_lang['close'] = 'Cerrer';
$QE_lang['document_title'] = 'T�tulo';
$QE_lang['document_title_help'] = 'Ingrese el nombre/t�tulo del documento. �Evite el uso de barras invertidas en el nombre!';
$QE_lang['long_title'] = 'T�tulo largo';
$QE_lang['document_long_title_help'] = 'Aqu� puede ingresar un t�tulo m�s largo para su documento. Esto es �til para los moteres de b�squeda, y puede ser m�s descriptivo para su documento.';
$QE_lang['document_description'] = 'Descripci�n';
$QE_lang['document_description_help'] = 'Puede ingresar una descripci�n opcional aqu�.';
$QE_lang['document_content'] = 'Contendo del documento';
$QE_lang['template'] = 'Plantilla';
$QE_lang['page_data_template_help'] = 'Aqu� puede seleccionar qu� plantilla utiliza el documento.';
$QE_lang['document_alias'] = 'Alias del documento';
$QE_lang['document_alias_help'] = 'Aqu� puede seleccionar un alias para el documento. Esto har� el documento accesible utilizando:\n\nhttp://suservidor/alias\n\nEsto s�lo funciona si est� usando URLs amigables.';
$QE_lang['document_opt_published'] = '�Publicado?';
$QE_lang['document_opt_published_help'] = 'Seleccione este campo para publicar el documento inmediatamente luego de guardarlo.';
$QE_lang['document_summary'] = 'Sumario (introtext)';
$QE_lang['document_summary_help'] = 'Ingrese un breve resumen del documento';
$QE_lang['document_opt_menu_index'] = 'Indice de men�';
$QE_lang['document_opt_menu_index_help'] = 'Indice de men� es un campo que puede utilizar para ordenar los documentos en su(s) snippet(s) de men�. Puede a su vez usarlo para cualquier otro proposito en sus snippets.';
$QE_lang['document_opt_menu_title'] = 'T�tulo de men�';
$QE_lang['document_opt_menu_title_help'] = 'T�tulo de men� es un campo que puede usar para mostrar un corto t�tulo para el documento, dentro de su(s) snippet(s) de men� o modulos.';
$QE_lang['document_opt_show_menu'] = 'Mostrar en men�';
$QE_lang['document_opt_show_menu_help'] = 'Seleccione esta opci�n para mostrar el documento dentro de un men� web. Note que algunos constructores de men� pueden elegir ignorar esta opci�n.';
$QE_lang['page_data_searchable'] = 'Buscable';
$QE_lang['page_data_searchable_help'] = 'Seleccionando este campo permite que el documento sea buscable. Tambi�n puede usar este campo para otros propositos en sus snippets.';
$QE_lang['page_data_cacheable'] = 'Cacheable';
$QE_lang['page_data_cacheable_help'] = 'Dejando este campo seleccionado permitir� que el documento sea guardado en el cache. Deje este campo deseleccionado si su documento contiene snippets.';
?>
