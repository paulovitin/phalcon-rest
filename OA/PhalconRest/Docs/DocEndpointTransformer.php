<?php

namespace OA\PhalconRest\Docs;

use League\Fractal;

class DocEndpointTransformer extends Fractal\TransformerAbstract
{
	/**
	 * Turn this resource object into a generic array
	 *
	 * @return array
	 */
	public function transform($endpoint)
	{

		return [
			'resource' => $endpoint->resource,
			'method' => $endpoint->method,
			'route' => $endpoint->route,
			'description' => $endpoint->description,
			'title' => $endpoint->title,
			'parameters' => $endpoint->parameters,
			'headers' => $endpoint->headers,
			'response' => $endpoint->response,
			'responseExample' => $endpoint->responseExample,
			'requestExample' => $endpoint->requestExample,
			'includeTypes' => $endpoint->includeTypes,
		];
	}
}
