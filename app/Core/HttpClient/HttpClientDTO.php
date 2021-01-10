<?php


namespace App\Core\HttpClient;


use JsonException;

class HttpClientDTO
{
    private int $status_code;

    private ?string $content;

    private array $headers;

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    /**
     * @param int $status_code
     * @return HttpClientDTO
     */
    public function setStatusCode(int $status_code): HttpClientDTO
    {
        $this->status_code = $status_code;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     * @return HttpClientDTO
     */
    public function setContent(?string $content): HttpClientDTO
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array|null
     * @throws JsonException
     */
    public function getContentAsArray(): ?array
    {
        if ($this->content !== null) {
            return json_decode($this->content, true, 512, JSON_THROW_ON_ERROR);
        }

        return [];
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return HttpClientDTO
     */
    public function setHeaders(array $headers): HttpClientDTO
    {
        $this->headers = $headers;
        return $this;
    }
}
