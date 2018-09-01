<?php
/**
 * @package Redbit\Vyfakturuj\VyfakturujAPI
 * @license MIT
 * @copyright 2016-2018 Redbit s.r.o.
 * @author Redbit s.r.o. <info@vyfakturuj.cz>
 * @author Ing. Martin Dostál
 */



/**
 * Třída pro práci s API Vyfakturuj.cz
 */
class VyfakturujAPI
{
    // HTTP methods
    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_DELETE = 'DELETE';
    const HTTP_METHOD_PUT = 'PUT';

    /** @var string */
    protected $endpointUrl = 'https://api.vyfakturuj.cz/2.0/';

    /** @var string */
    protected $login;

    /** @var string */
    protected $apiHash;

    /** @var null|array */
    protected $lastInfo;

    /**
     * @param string $login
     * @param string $apiHash
     */
    public function __construct($login, $apiHash)
    {
        $this->login = $login;
        $this->apiHash = $apiHash;
    }


    /**
     * Vytvoření nového dokumentu
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o dokumentu
     * @throws VyfakturujAPIException
     */
    public function createInvoice($data)
    {
        return $this->fetchPost('invoice/', $data);
    }


    /**
     * Úprava již vytvořeného dokumentu
     *
     * @param int $id ID dokumentu
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o dokumentu
     * @throws VyfakturujAPIException
     */
    public function updateInvoice($id, $data)
    {
        return $this->fetchPut('invoice/' . $id . '/', $data);
    }


    /**
     * Vratí informace o dokladu
     *
     * @param int $id ID dokumentu
     * @return array Vrátí kompletní informace o dokumentu
     * @throws VyfakturujAPIException
     */
    public function getInvoice($id)
    {
        return $this->fetchGet('invoice/' . $id . '/');
    }


    /**
     * Vrátí seznam všech faktur
     *
     * @param array $args Data pro vyhledání faktury
     * @return array
     * @throws VyfakturujAPIException
     */
    public function getInvoices($args = array())
    {
        return $this->fetchGet('invoice/?' . http_build_query($args));
    }


    /**
     * Vrati šablonu e-mailu, který by se odeslal zákazníkovi.
     *
     * @param int $id ID faktury
     * @param array $data Data, která chceme použít pro vytvoření šablony.
     * @return array
     * @throws VyfakturujAPIException
     */
    public function invoice_sendMail_test($id, $data)
    {
        $data['test'] = true;
        return $this->fetchPost('invoice/' . $id . '/send-mail/', $data);
    }


    /**
     * Odešle e-mail podle zadaných dat
     *
     * @param int $id ID faktury
     * @param array $data Data, která chceme použít pro vytvoření e-mailu
     * @return array
     * @throws VyfakturujAPIException
     */
    public function invoice_sendMail($id, $data)
    {
        return $this->fetchPost('invoice/' . $id . '/send-mail/', $data);
    }


    /**
     * Odesle dokument do EET
     *
     * @param int $id
     * @return array
     * @throws VyfakturujAPIException
     */
    public function invoice_sendEet($id)
    {
        return $this->fetchPost('invoice/' . $id . '/send-eet/');
    }


    /**
     * Uhradí fakturu
     *
     * @param int $id id dokumentu
     * @param string|null $date Např: 2016-12-31, pokud je nastaveno na 0000-00-00 pak se zruší uhrada dokladu
     * @param int|float $amount Kolik bylo uhrazeno. Pokud je NULL, bude faktura uhrazena nezávisle na částce
     * @return array Detail dokladu po uhrazeni
     * @throws VyfakturujAPIException
     */
    public function invoice_setPayment($id, $date = null, $amount = null)
    {
        $data = array('date' => is_null($date) ? date('Y-m-d') : $date);
        if (!is_null($amount)) {
            $data['amount'] = $amount;
        }
        return $this->fetchPost('invoice/' . $id . '/payment/', $data);
    }


    /**
     * Smazání faktury
     *
     * @param int $id ID dokumentu
     * @return array Vrátí stav operace
     * @throws VyfakturujAPIException
     */
    public function deleteInvoice($id)
    {
        return $this->fetchDelete('invoice/' . $id . '/');
    }


    /**
     * Vytvoření nového kontaktu v adresáři
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o kontaktu
     * @throws VyfakturujAPIException
     */
    public function createContact($data)
    {
        return $this->fetchPost('contact/', $data);
    }


    /**
     * Úprava již vytvořeného kontaktu
     *
     * @param int $id ID kontaktu
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o kontaktu
     * @throws VyfakturujAPIException
     */
    public function updateContact($id, $data)
    {
        return $this->fetchPut('contact/' . $id . '/', $data);
    }


    /**
     * Vratí informace o kontaktu
     *
     * @param int $id ID kontaktu
     * @return array Vrátí kompletní informace o kontaktu
     * @throws VyfakturujAPIException
     */
    public function getContact($id)
    {
        return $this->fetchGet('contact/' . $id . '/');
    }


    /**
     * Vrátí seznam kontaktů
     *
     * @param array $args
     * @return array
     * @throws VyfakturujAPIException
     */
    public function getContacts($args = array())
    {
        return $this->fetchGet('contact/?' . http_build_query($args));
    }


    /**
     * Smazání kontaktu v adresáři
     *
     * @param int $id ID kontaktu
     * @return array Vrátí stav operace
     * @throws VyfakturujAPIException
     */
    public function deleteContact($id)
    {
        return $this->fetchDelete('contact/' . $id . '/');
    }


    /**
     * Vytvoření nové šablony|pravidelné faktury
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o položce
     * @throws VyfakturujAPIException
     */
    public function createTemplate($data)
    {
        return $this->fetchPost('template/', $data);
    }


    /**
     * Úprava již vytvořené šablony|pravidelné faktury
     *
     * @param int $id ID šablony|pravidelné faktury
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o položce
     * @throws VyfakturujAPIException
     */
    public function updateTemplate($id, $data)
    {
        return $this->fetchPut('template/' . $id . '/', $data);
    }


    /**
     * Vratí informace o šabloně|pravidelné faktuře
     *
     * @param int $id ID šablony|pravidelné faktury
     * @return array Vrátí kompletní informace
     * @throws VyfakturujAPIException
     */
    public function getTemplate($id)
    {
        return $this->fetchGet('template/' . $id . '/');
    }


    /**
     * Vrátí seznam všech šablon|pravidelných faktur
     *
     * @param array $args Data pro vyhledání faktur
     * @return array
     * @throws VyfakturujAPIException
     */
    public function getTemplates($args = array())
    {
        return $this->fetchGet('template/?' . http_build_query($args));
    }


    /**
     * Smazání šablony|pravidelné faktury
     *
     * @param int $id ID šablony|pravidelné faktury
     * @return array Vrátí stav operace
     * @throws VyfakturujAPIException
     */
    public function deleteTemplate($id)
    {
        return $this->fetchDelete('template/' . $id . '/');
    }


    /**
     * Vrátí seznam všech produktu
     *
     * @param array $args Data pro vyhledání faktur
     * @return array
     * @throws VyfakturujAPIException
     */
    public function getProducts($args = array())
    {
        return $this->fetchGet('product/?' . http_build_query($args));
    }


    /**
     * Vrati seznam platebních metod
     *
     * @return array
     * @throws VyfakturujAPIException
     */
    public function getSettings_paymentMethods()
    {
        return $this->fetchGet('settings/payment-method/');
    }


    /**
     * Vrati seznam číselných řad
     *
     * @return array
     * @throws VyfakturujAPIException
     */
    public function getSettings_numberSeries()
    {
        return $this->fetchGet('settings/number-series/');
    }


    /**
     * Testovací funkce pro ověření správného spojení se serverem
     *
     * @return array
     * @throws VyfakturujAPIException
     */
    public function test()
    {
        return $this->fetchGet('test/');
    }


    /**
     * Test faktury v PDF.
     * Pošle data na server, vytvoří na serveru fakturu kterou ale neuloží a pošle zpět ve formátu PDF.
     * Pokud se podaří fakturu vytvořit, pak je poslána ve formátu PDF na výstup. Jinak je vráceno pole.
     *
     * @param array $data
     * @return array
     * @throws VyfakturujAPIException
     */
    public function test_invoice__asPdf($data)
    {
        $result = $this->fetchPost('test/invoice/download/', $data);
        if (array_key_exists('content', $result)) {
            ob_end_clean();
            $content = base64_decode($result['content']);
            header('Cache-Control: public');
            $filename = $result['filename'];
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename="' . $filename . '.pdf"');
            header('Content-type: application/pdf');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . strlen($content));
            echo $content;
            exit;
        }
        return $result;
    }


    /**
     * Vrati informace o poslednim spojeni
     *
     * @return array|null
     */
    public function getInfo()
    {
        return $this->lastInfo;
    }


    /**
     * @param $path
     * @param $method
     * @param array|null $data
     * @return array|mixed
     * @throws VyfakturujAPIException
     */
    private function fetchRequest($path, $method, $data = array())
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->endpointUrl . $path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->login . ':' . $this->apiHash);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        switch ($method) {
            case self::HTTP_METHOD_POST:
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::HTTP_METHOD_PUT:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::HTTP_METHOD_DELETE:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }

        $response = curl_exec($curl);
        $this->lastInfo = curl_getinfo($curl);
        $this->lastInfo['dataSend'] = $data;

        if (curl_errno($curl) !== 0) {
            throw new VyfakturujAPIException(curl_error($curl), curl_errno($curl));
        }

        curl_close($curl);

        $return = json_decode($response, true);
        return is_array($return) ? $return : $response;
    }


    /**
     * @param $path
     * @param array|null $data
     * @return array|mixed
     * @throws VyfakturujAPIException
     */
    private function fetchGet($path, $data = null)
    {
        return $this->fetchRequest($path, self::HTTP_METHOD_GET, $data);
    }


    /**
     * @param $path
     * @param array|null $data
     * @return array|mixed
     * @throws VyfakturujAPIException
     */
    private function fetchPost($path, $data = null)
    {
        return $this->fetchRequest($path, self::HTTP_METHOD_POST, $data);
    }


    /**
     * @param $path
     * @param array|null $data
     * @return array|mixed
     * @throws VyfakturujAPIException
     */
    private function fetchPut($path, $data = null)
    {
        return $this->fetchRequest($path, self::HTTP_METHOD_PUT, $data);
    }


    /**
     * @param $path
     * @param array|null $data
     * @return array|mixed
     * @throws VyfakturujAPIException
     */
    private function fetchDelete($path, $data = null)
    {
        return $this->fetchRequest($path, self::HTTP_METHOD_DELETE, $data);
    }

}
