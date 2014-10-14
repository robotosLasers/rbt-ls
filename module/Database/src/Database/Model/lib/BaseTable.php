<?php

namespace Database\Model\lib;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class BaseTable {

	protected $tableGateway;

	public function __construct(TableGateway $tableGateway) {
		$this->tableGateway = $tableGateway;
	}

	public function fetchAll($paginated = false, $params = null) {
		// create a new Select object for the table
		$select = new Select($this->tableGateway->getTable());

		if ($params) {
			$keys = array_keys($params);
			foreach ($keys as $key) {
				$select->$key($params[$key]);
			}
		}
		
		if ($paginated) {
			// create a new result set
			$resultSetPrototype = new ResultSet();
			$resultSetPrototype->setArrayObjectPrototype($this->tableGateway->getResultSetPrototype()->getArrayObjectPrototype());
			// create a new pagination adapter object
			$paginatorAdapter = new DbSelect(
					// our configured select object
					$select,
					// the adapter to run it against
					$this->tableGateway->getAdapter(),
					// the result set to hydrate
					$resultSetPrototype
			);
			$resultSet = new Paginator($paginatorAdapter);
		} else {
			$resultSet = $this->tableGateway->selectWith($select);
		}
		return $resultSet;
	}

	public function getById($id) {
		$id = (int) $id;
		return $this->getByParms(array('id' => $id));
	}

	public function getByParms($params) {
		$rowset = $this->tableGateway->select($params);
		return $rowset->current();
	}

	public function save($data) {
		$result = 0;
		$dummy = (array) $data;

		$id = (int) $data->id;
		if ($id == 0) {
			$result = $this->tableGateway->insert($dummy);
		} else {
			if ($this->getById($id)) {
				$result = $this->tableGateway->update($dummy, array('id' => $id));
			}
		}

		return $result;
	}

	public function delete($id) {
		$this->tableGateway->delete(array('id' => $id));
	}

	public function deleteByParms($params) {
		$this->tableGateway->delete($params);
	}

}