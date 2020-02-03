<?php

namespace applications\lib\db;

Class Get_data_db extends db 
{

	public function select_data ($condition, $preparedData = null) {
		
        try {
		
            $DBH = parent::db_connect()->prepare($condition);
            $DBH->execute($preparedData);
            $result = $DBH->fetchAll();
            $DBH = null;
            return $result;

        } catch (PDOException $e) {

			$DBH = null;
			return null;

        }
    }
}