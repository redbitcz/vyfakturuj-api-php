<?php



/**
 * Třída pro práci s API Vyfakturuj.cz
 *
 * @author Ing. Martin Dostál <info@vyfakturuj.cz>
 */
class VyfakturujAPI
{

    protected $login = null;
    protected $apiHash = null;
    protected static $URL = 'https://api.vyfakturuj.cz/2.0/';
    protected $lastInfo = null;

    const METHOD_POST = 'post',
        METHOD_GET = 'get',
        METHOD_DELETE = 'delete',
        METHOD_PUT = 'put';


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
     */
    public function createInvoice($data)
    {
        return $this->_post('invoice/', $data);
    }


    /**
     * Úprava již vytvořeného dokumentu
     *
     * @param int $id ID dokumentu
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o dokumentu
     */
    public function updateInvoice($id, $data)
    {
        return $this->_put('invoice/' . $id . '/', $data);
    }


    /**
     * Vratí informace o dokladu
     *
     * @param int $id ID dokumentu
     * @return array Vrátí kompletní informace o dokumentu
     */
    public function getInvoice($id)
    {
        return $this->_get('invoice/' . $id . '/');
    }


    /**
     * Vrátí seznam všech faktur
     *
     * @param array $args Data pro vyhledání faktury
     * @return array
     */
    public function getInvoices($args = array())
    {
        return $this->_get('invoice/?' . http_build_query($args));
    }


    /**
     * Vrati šablonu e-mailu, který by se odeslal zákazníkovi.
     *
     * @param int $id ID faktury
     * @param array $data Data, která chceme použít pro vytvoření šablony.
     * @return array
     */
    public function invoice_sendMail_test($id, $data)
    {
        $data['test'] = true;
        return $this->_post('invoice/' . $id . '/send-mail/', $data);
    }


    /**
     * Odešle e-mail podle zadaných dat
     *
     * @param int $id ID faktury
     * @param array $data Data, která chceme použít pro vytvoření e-mailu
     * @return array
     */
    public function invoice_sendMail($id, $data)
    {
        return $this->_post('invoice/' . $id . '/send-mail/', $data);
    }


    /**
     * Odesle dokument do EET
     *
     * @param int $id
     * @return array
     */
    public function invoice_sendEet($id)
    {
        return $this->_post('invoice/' . $id . '/send-eet/');
    }


    /**
     * Uhradí fakturu
     *
     * @param int $id id dokumentu
     * @param string|null $date Např: 2016-12-31, pokud je nastaveno na 0000-00-00 pak se zruší uhrada dokladu
     * @param int|float $amount Kolik bylo uhrazeno. Pokud je NULL, bude faktura uhrazena nezávisle na částce
     * @return array Detail dokladu po uhrazeni
     */
    public function invoice_setPayment($id, $date = null, $amount = null)
    {
        $data = array('date' => is_null($date) ? date('Y-m-d') : $date);
        if (!is_null($amount)) {
            $data['amount'] = $amount;
        }
        return $this->_post('invoice/' . $id . '/payment/', $data);
    }


    /**
     * Smazání faktury
     *
     * @param int $id ID dokumentu
     * @return array Vrátí stav operace
     */
    public function deleteInvoice($id)
    {
        return $this->_delete('invoice/' . $id . '/');
    }


    /**
     * Vytvoření nového kontaktu v adresáři
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o kontaktu
     */
    public function createContact($data)
    {
        return $this->_post('contact/', $data);
    }


    /**
     * Úprava již vytvořeného kontaktu
     *
     * @param int $id ID kontaktu
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o kontaktu
     */
    public function updateContact($id, $data)
    {
        return $this->_put('contact/' . $id . '/', $data);
    }


    /**
     * Vratí informace o kontaktu
     *
     * @param int $id ID kontaktu
     * @return array Vrátí kompletní informace o kontaktu
     */
    public function getContact($id)
    {
        return $this->_get('contact/' . $id . '/');
    }


    /**
     * Vrátí seznam kontaktů
     *
     * @param array $args
     * @return array
     */
    public function getContacts($args = array())
    {
        return $this->_get('contact/?' . http_build_query($args));
    }


    /**
     * Smazání kontaktu v adresáři
     *
     * @param int $id ID kontaktu
     * @return array Vrátí stav operace
     */
    public function deleteContact($id)
    {
        return $this->_delete('contact/' . $id . '/');
    }


    /**
     * Vytvoření nové šablony|pravidelné faktury
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o položce
     */
    public function createTemplate($data)
    {
        return $this->_post('template/', $data);
    }


    /**
     * Úprava již vytvořené šablony|pravidelné faktury
     *
     * @param int $id ID šablony|pravidelné faktury
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o položce
     */
    public function updateTemplate($id, $data)
    {
        return $this->_put('template/' . $id . '/', $data);
    }


    /**
     * Vratí informace o šabloně|pravidelné faktuře
     *
     * @param int $id ID šablony|pravidelné faktury
     * @return array Vrátí kompletní informace
     */
    public function getTemplate($id)
    {
        return $this->_get('template/' . $id . '/');
    }


    /**
     * Vrátí seznam všech šablon|pravidelných faktur
     *
     * @param array $args Data pro vyhledání faktur
     * @return array
     */
    public function getTemplates($args = array())
    {
        return $this->_get('template/?' . http_build_query($args));
    }


    /**
     * Smazání šablony|pravidelné faktury
     *
     * @param int $id ID šablony|pravidelné faktury
     * @return array Vrátí stav operace
     */
    public function deleteTemplate($id)
    {
        return $this->_delete('template/' . $id . '/');
    }


    /**
     * Vrátí seznam všech produktu
     *
     * @param array $args Data pro vyhledání faktur
     * @return array
     */
    public function getProducts($args = array())
    {
        return $this->_get('product/?' . http_build_query($args));
    }


    /**
     * Vrati seznam platebních metod
     *
     * @return array
     */
    public function getSettings_paymentMethods()
    {
        return $this->_get('settings/payment-method/');
    }


    /**
     * Vrati seznam číselných řad
     *
     * @return array
     */
    public function getSettings_numberSeries()
    {
        return $this->_get('settings/number-series/');
    }


    /**
     * Testovací funkce pro ověření správného spojení se serverem
     *
     * @return array
     */
    public function test()
    {
        return $this->_get('test/');
    }


    /**
     * Test faktury v PDF.
     * Pošle data na server, vytvoří na serveru fakturu kterou ale neuloží a pošle zpět ve formátu PDF.
     * Pokud se podaří fakturu vytvořit, pak je poslána ve formátu PDF na výstup. Jinak je vráceno pole.
     *
     * @param array $data
     * @return array
     */
    public function test_invoice__asPdf($data)
    {
        $result = $this->_post('test/invoice/download/', $data);
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


    private function _connect($path, $method, $data = array())
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, static::$URL . $path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $this->login . ':' . $this->apiHash);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        switch ($method) {
            case self::METHOD_POST:
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::METHOD_PUT:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case self::METHOD_DELETE:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }

        $response = curl_exec($curl);
        $this->lastInfo = curl_getinfo($curl);
        $this->lastInfo['dataSend'] = $data;
        curl_close($curl);
        $return = json_decode($response, true);
        return is_array($return) ? $return : $response;
    }


    /**
     * Vrati informace o poslednim spojeni
     * @return array|null
     */
    public function getInfo()
    {
        return $this->lastInfo;
    }


    private function _get($path, $data = null)
    {
        return $this->_connect($path, self::METHOD_GET, $data);
    }


    private function _post($path, $data = null)
    {
        return $this->_connect($path, self::METHOD_POST, $data);
    }


    private function _put($path, $data = null)
    {
        return $this->_connect($path, self::METHOD_PUT, $data);
    }


    private function _delete($path, $data = null)
    {
        return $this->_connect($path, self::METHOD_DELETE, $data);
    }

}
