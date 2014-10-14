<?php

namespace Database\Model\lib;

class Base {
	public function exchangeArray($data) {
		$keys = array_keys($data);
		foreach ($keys as $key) {
			$this->$key = (!empty($data[$key])) ? $data[$key] : null;
		}
	}

}