<?php


class BookingTravelModel
{
	public function create(
		$bookingDate,
    $backDate,
    $destination,
    $userId,
		$reservation,
		$statut,
		$price
    )
	{
    	$sql = "INSERT INTO booking
        (
			BookingDate,
			BackDate,
      Destination,
      UserId,
			Reservation,
			Statut,
			Price

		) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $database = new Database();
        $database->executeSql($sql,
		[
      $bookingDate,
      $backDate,
      $destination,
      $userId,
			$reservation,
			$statut,
			$price
		]);

    }



}


?>
