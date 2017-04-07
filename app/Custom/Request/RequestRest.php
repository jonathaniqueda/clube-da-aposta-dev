<?php
namespace App\Custom\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use \Exception;
use Log;

class RequestRest
{
    private $url;
    private $header = [];
    private $param;
    private $response;

    /**
     * [__construct description].
     *
     * @method __construct
     *
     * @param [type] $url [Base url]
     */
    public function __construct($url)
    {
        $this->url = new Client(['base_uri' => $url]);
    }

    /**
     * [setHeader merge de um array de header com alguns parametros setados default].
     *
     * @method setHeader
     *
     * @param array $header [description]
     */
    public function setHeader(array $header)
    {
        $this->header = array_merge($header, $this->header);
    }

    /**
     * [setParam description].
     *
     * @method setParam
     *
     * @param array $param [description]
     */
    public function setParam(array $param)
    {
        $this->param = $param;
    }

    /**
     * [postForm description].
     *
     * @method postForm
     *
     * @param [type] $url  [url parcial]
     * @param [type] $body [parametros do formulario]
     *
     * @return [type] [json]
     */
    public function postForm($url = '', $body = [])
    {
        try {
            $this->response = $this->url->request('POST', $url,
                [
                    'form_params' => $body,
                    'headers' => $this->header,
                    'query' => $this->param,
                    'verify' => false,
                ]);

            return $this;
        } catch (ClientException $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        }
    }

    /**
     * [postForm description].
     *
     * @method postForm
     *
     * @param [type] $url  [url parcial]
     * @param [type] $body [parametros do formulario]
     *
     * @return [type] [json]
     */
    public function postJson($url = '', $body = [])
    {
        try {
            $this->response = $this->url->request('POST', $url,
                [
                    'json' => $body,
                    'headers' => $this->header,
                    'query' => $this->param,
                    'verify' => false,
                ]);

            return $this;
        } catch (ClientException $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        }
    }

    /**
     * [putJson description].
     *
     * @method putJson
     *
     * @param string $url [description]
     * @param [type] $body [description]
     *
     * @return [type] [description]
     */
    public function putJson($url = '', $body = [])
    {
        try {
            $this->response = $this->url->request('PUT', $url,
                [
                    'json' => $body,
                    'headers' => $this->header,
                    'query' => $this->param,
                    'verify' => false,
                ]);

            return $this;
        } catch (ClientException $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        }
    }

    /**
     * [putForm description].
     *
     * @method putForm
     *
     * @param string $url [description]
     * @param [type] $body [description]
     *
     * @return [type] [description]
     */
    public function putForm($url = '', $body = [])
    {
        try {
            $this->response = $this->url->request('PUT', $url,
                [
                    'form_params' => $body,
                    'headers' => $this->header,
                    'query' => $this->param,
                    'verify' => false,
                ]);

            return $this;
        } catch (ClientException $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        } catch (Exception $e) {
            Log::error($e);
            throw new Exception($e->getMessage(), 1);
        }
    }

    /**
     * [get description].
     *
     * @method get
     *
     * @param [type] $url [url parcial]
     *
     * @return [type] [retorna json]
     */
    public function get($url = '', $hasEx = true)
    {
        try {
            $this->response = $this->url->request('GET', $url,
                [
                    'headers' => $this->header,
                    'query' => $this->param,
                    'verify' => false,
                ]);

            return $this;
        } catch (ClientException $e) {
            Log::error($e);
            if ($hasEx) {
                throw new Exception($e->getMessage(), 1);
            }
        } catch (Exception $e) {
            Log::error($e);
            if ($hasEx) {
                throw new Exception($e->getMessage(), 1);
            }
        }
    }

    public function getHeader($name)
    {
        return $this->response->getHeader($name);
    }

    public function decode()
    {
        return json_decode($this->response->getBody());
    }

    public function encode()
    {
        return json_encode($this->response->getBody());
    }

    public function result()
    {
        return $this->response->getBody();
    }
}