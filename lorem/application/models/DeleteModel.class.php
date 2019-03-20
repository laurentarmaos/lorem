<?php


class DeleteModel
{



	public function find($reservationId)
	{
			$database = new Database();

			$sql = 'DELETE
							FROM booking
							WHERE Reservation = ?';
	return $database->queryOne($sql, [ $reservationId ]);
	}





}


?>
