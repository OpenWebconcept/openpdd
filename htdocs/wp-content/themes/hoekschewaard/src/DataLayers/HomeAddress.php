<?php

namespace HW\DataLayers;

use GeoJson\Feature\FeatureCollection;
use OWC\PrefillGravityForms\Controllers\VrijBRPController;
use Yard\GeoCode\Pdok\GeoCoder;
use Yard\GeoCode\Pdok\LonLat;
use Yard\Logging\Log;

class HomeAddress
{
	private const API_NAMESPACE = 'brphome';

	public static function registerRestRoute(): void
	{
		register_rest_route(
			self::API_NAMESPACE,
			'geojson',
			[
				'methods'             => \WP_REST_Server::READABLE,
				'callback'            => function () {return self::getGeoJson();},
				'permission_callback' => function () {return true;},
				'args'                => [],
			]);
	}

	public static function getGeoJson(): array
	{
		try {
			$address = self::getAddressString();
		} catch (\Exception $e) {
			error_log($e->getMessage());
			$address = '3261 WB 1';
		}

		$location = self::geoCode($address);

		$point = new \GeoJson\Geometry\Point([$location->lon, $location->lat]);

		$featureProperties = [
			"type" => "brp-address",
			"address" => $address,
		];

		$location = new \GeoJson\Feature\Feature($point, $featureProperties, "brphome");
		$collection = new FeatureCollection([$location]);

		return $collection->jsonSerialize();
	}

	public static function getAddressString(): string
	{
		$controller = new VrijBRPController();
		$data = $controller->get();

		if (count($data) === 0) {
			throw new \Exception("BRP data is empty.");
		}

		if (!isset($data['verblijfplaats']['postcode'])) {
			throw new \Exception('ERROR: Failed to find address postcode: '.var_export($data, true));
		}

		if (!isset($data['verblijfplaats']['huisnummer'])) {
			throw new \Exception('ERROR: Failed to find address street number: '.var_export($data, true));
		}

		return sprintf('%s %s', $data['verblijfplaats']['postcode'], $data['verblijfplaats']['huisnummer']);
	}

	public static function geoCode(string $address): LonLat
	{
		$coder = new GeoCoder(Log::getLogger());
		return $coder->geocode($address);
	}
}
