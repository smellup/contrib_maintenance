<?php

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}


/**
 * Insertion dans le pipeline declarer_tables_objets_sql (SPIP)
 *
 * Declarer les champs categorie et préfixe pour les rubriques.
 *
 * @param array $tables
 * 	La définition des objets SPIP
 * @return array
 * 	La définition des objets SPIP modifiés
 */
function contrib_declarer_champs_extras($champs = array())  {

	// Table : spip_rubriques, on initialise les champs extras de la table.
	if (!is_array($champs['spip_rubriques'])) {
		$champs['spip_rubriques'] = array();
	}

	// Ajout de la catégorie de plugin. La saisie est une sélection particulière.
	$champs['spip_rubriques']['categorie'] = array(
			'saisie' => 'rubrique_categorie',
			'options' => array(
				'nom' => 'categorie',
				'label' => '<:svp:label_categorie:>',
				'option_intro' => '<:contrib:categorie_vide:>',
				'env' => true,
				'restrictions' => array(
					'modifier' => array(
						'auteur' => 'webmestre',
					),
					'voir' => false,
				),
				'sql' => "varchar(100) DEFAULT '' NOT NULL",
				'rechercher_ponderation' => '2',
			),
			'versionner' => false,
			'verifier' => array(
			),
		);

	$champs['spip_rubriques']['prefixe'] = array(
			'saisie' => 'input',
			'options' => array(
				'nom' => 'prefixe',
				'label' => '<:svp:label_prefixe:>',
				'env' => true,
				'restrictions' => array(
					'modifier' => array(
						'auteur' => 'webmestre',
					),
					'voir' => false,
				),
				'sql' => "varchar(30) DEFAULT '' NOT NULL",
				'rechercher_ponderation' => '10',
			),
			'versionner' => false,
			'verifier' => array(
			),
		);

	// Table : spip_rubriques, on initialise les champs extras de la table.
	if (!is_array($champs['spip_articles'])) {
		$champs['spip_articles'] = array();
	}

	// Ajout de la catégorie de plugin. La saisie est une sélection particulière.
	$champs['spip_articles']['type_article'] = array(
			'saisie' => 'article_type',
			'options' => array(
				'nom' => 'type_article',
				'label' => '<:contrib:label_type_article:>',
				'restrictions' => array(
					'modifier' => array(
						'auteur' => 'webmestre',
					),
				),
				'sql' => "varchar(16) DEFAULT '' NOT NULL",
			),
			'versionner' => false,
			'verifier' => array(
			),
		);

	return $champs;
}
