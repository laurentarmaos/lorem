<?php


class BookingModel
{

	public function listAll(){

		$database = new Database;

		$sql = 'SELECT * FROM booking';
		return $database->query($sql);
	}


	public function payed($booking) {

		$database = new Database();

		$sql = 'UPDATE booking
		SET Statut = "payed"
		WHERE Reservation = ?';
		$database->executeSql($sql, [$booking]);
	}


	public function find($reservationId)
	{
			$database = new Database();

			$sql = 'SELECT *
							FROM booking
							WHERE Reservation = ?';
	return $database->queryOne($sql, [ $reservationId ]);
	}





}


?>
