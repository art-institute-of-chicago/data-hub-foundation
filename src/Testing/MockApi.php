<?php

namespace Aic\Hub\Foundation\Testing;

use Aic\Hub\Foundation\Library\Api\Consumers\GuzzleApiConsumer;
use Aic\Hub\Foundation\Library\Api\Models\BaseApiModel as ApiModel;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

/**
 * Testing helper for inspecting requests to and mocking responses from the API.
 */
trait MockApi
{
    /**
     * A mock request handler to simulate returning response.
     * See https://docs.guzzlephp.org/en/stable/testing.html#mock-handler.
     */
    protected MockHandler $mockApi;

    /**
     * An array for storing request/response transactions to the mock API.
     * See https://docs.guzzlephp.org/en/stable/testing.html#history-middleware.
    */
    protected array $transactions;

    /**
     * Set up Guzzle's builtin mock request handler and swap it in for the app's
     * `ApiClient` service.
     *
     * This method is run during `setUp()` by `Aic\Hub\Foundation\Testing\FeatureTestCase`.
     */
    public function setUpMockApi(): void
    {
        $this->transactions = array();
        $this->mockApi = new MockHandler();
        $handler = HandlerStack::create($this->mockApi);
        $handler->push(Middleware::history($this->transactions));
        $this->instance('ApiClient', new GuzzleApiConsumer(['handler' => $handler]));
    }

    /**
     * Generate a mock API response based on the given model.
     */
    public function mockApiModelReponse(?ApiModel $model = null, int $statusCode = 200, array $headers = []): Response
    {
        if ($errorResponse = $this->isError($statusCode, $headers)) {
            return $errorResponse;
        }
        return new Response($statusCode, $headers, json_encode(['data' => $model ? $model->toArray() : $model]));
    }

    /**
     * Generate a mock API search response based on the given models.
     */
    public function mockApiSearchResponse(array $models = [], int $statusCode = 200, array $headers = []): Response
    {
        if ($errorResponse = $this->isError($statusCode, $headers)) {
            return $errorResponse;
        }
        return new Response($statusCode, $headers, json_encode([
            'preference' => null,
            'pagination' => [
                'total' => count($models),
                'limit' => 10,
                'offset' => 0,
                'total_pages' => 1,
                'current_page' => 1,
            ],
            'data' => array_map(fn ($model) => $model->toArray(), $models),
            'info' => [
                'license_text' => "The data in this response may be protected by copyright, and other restrictions, of the Art Institute of Chicago and third parties. You may use this data for noncommercial educational and personal use and for \"fair use\" as authorized under law, provided that you also retain all copyright and other proprietary notices contained on the materials and cite the author and source of the materials.",
                'license_links' => ['https:\/\/www.artic.edu\/terms'],
                'version' => '1.6',
            ],
            'config' => [
                'iiif_url' => 'https:\/\/www.artic.edu\/iiif\/2',
                'website_url' => 'http:\/\/www.artic.edu',
            ],
        ]));
    }

    /**
     * Generate a mock API AI response based on the given models.
     */
    public function mockApiAiResponse(array $models = [], int $statusCode = 200, array $headers = []): Response
    {
        if ($errorResponse = $this->isError($statusCode, $headers)) {
            return $errorResponse;
        }
        return new Response($statusCode, $headers, json_encode([
            'data' => [
                'items' => array_map(fn ($model) => $model->id, $models),
            ]
        ]));
    }

    /**
     * Add mocked API responses to the queue.
     *
     * When the mock API receives a request, it will respond with the next
     * response from the queue until the queue is empty.
     */
    public function addMockApiResponses(array|Response $responses): void
    {
        if ($responses instanceof Response) {
            $responses = [$responses];
        }
        $this->mockApi->append(...$responses);
    }

    /**
     * Assert the mock API received the expected number of requests.
     */
    public function assertApiRequestCount(int $expected, ?string $message = null): void
    {
        $this->assertCount(
            $expected,
            $this->transactions,
            $message ?: 'The API did not receive the expected number of requests',
        );
    }

    /**
     * Assert the mock API received a request with the expected method and uri.
     */
    public function assertApiRequestReceived(string $method, string $uri, ?string $message = null): void
    {
        $transactionsContainRequest = collect($this->transactions)
            ->pluck('request')
            ->contains(function ($request, $_) use ($method, $uri) {
                return strtoupper($method) == $request->getMethod() && $uri == $request->getUri()->getPath();
            });
        $message = $message ?: "The API did not receive the request {$method} {$uri}";
        $this->assertTrue($transactionsContainRequest, $message);
    }

    /**
     * If the status code is an error, return an error response.
     */
    private function isError(int $statusCode, array $headers = []): Response|bool
    {
        if ($statusCode > 399) {
            return new Response (
                $statusCode,
                $headers,
                json_encode(['status' => $statusCode, 'error' => 'Mock error response']),
            );
        }
        return false;
    }
}
