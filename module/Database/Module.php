<?php

namespace Database;

//Db core
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
//Tables
use Database\Model\News;
use Database\Model\NewsTable;
use Database\Model\Seminare;
use Database\Model\SeminareTable;
use Database\Model\SeminareFolder;
use Database\Model\SeminareFolderTable;
use Database\Model\Token;
use Database\Model\TokenTable;

class Module {

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getServiceConfig() {
		return array(
			'factories' => array(
				'Database\Model\NewsTable' => function($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new News());
	
					return new NewsTable(new TableGateway('news', $dbAdapter, null, $resultSetPrototype));
				},
				'Database\Model\SeminareTable' => function($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Seminare());
	
					return new SeminareTable(new TableGateway('seminare', $dbAdapter, null, $resultSetPrototype));
				},
				'Database\Model\SeminareFolderTable' => function($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new SeminareFolder());
	
					return new SeminareFolderTable(new TableGateway('seminare_folder', $dbAdapter, null, $resultSetPrototype));
				},
				'Database\Model\TokenTable' => function($sm) {
					$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
					$resultSetPrototype->setArrayObjectPrototype(new Token());
					
					return new TokenTable(new TableGateway('token', $dbAdapter, null, $resultSetPrototype));
				},
			),
		);
	}

}