<?php

/**
 * Třída pro práci s API Vyfakturuj.cz
 *
 * @author Ing. Martin Dostál <info@vyfakturuj.cz>
 * @version 2.1.0
 */
class VyfakturujAPI{

    protected $login = null;
    protected $apiHash = null;
    protected static $URL = 'https://www.vyfakturuj.cz/api/2.0/';

    public function __construct($login,$apiHash){
        $this->login = $login;
        $this->apiHash = $apiHash;
    }

    const METHOD_POST = 'post',
            METHOD_GET = 'get',
            METHOD_DELETE = 'delete',
            METHOD_PUT = 'put';

    /**
     * Vytvoření nového dokumentu
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o dokumentu
     */
    public function createInvoice($data){
        return $this->_post('/invoice/',$data);
    }

    /**
     * Úprava již vytvořeného dokumentu
     *
     * @param int $id ID dokumentu
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o dokumentu
     */
    public function updateInvoice($id,$data){
        return $this->_put('/invoice/'.$id.'/',$data);
    }

    /**
     * Vratí informace o dokladu
     *
     * @param int $id ID dokumentu
     * @return array Vrátí kompletní informace o dokumentu
     */
    public function getInvoice($id){
        return $this->_get('/invoice/'.$id.'/');
    }

    /**
     * Vrátí seznam všech faktur
     *
     * @return array
     */
    public function getInvoices(){
        return $this->_get('/invoice/');
    }

    /**
     * Smazání faktury
     *
     * @param int $id ID dokumentu
     * @return array Vrátí stav operace
     */
    public function deleteInvoice($id){
        return $this->_delete('/invoice/'.$id.'/');
    }

    /**
     * Vytvoření nového kontaktu v adresáři
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o kontaktu
     */
    public function createContact($data){
        return $this->_post('/contact/',$data);
    }

    /**
     * Úprava již vytvořeného kontaktu
     *
     * @param int $id ID kontaktu
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o kontaktu
     */
    public function updateContact($id,$data){
        return $this->_put('/contact/'.$id.'/',$data);
    }

    /**
     * Vratí informace o kontaktu
     *
     * @param int $id ID kontaktu
     * @return array Vrátí kompletní informace o kontaktu
     */
    public function getContact($id){
        return $this->_get('/contact/'.$id.'/');
    }

    /**
     * Vrátí seznam všech kontaktů
     *
     * @return array
     */
    public function getContacts(){
        return $this->_get('/contact/');
    }

    /**
     * Smazání kontaktu v adresáři
     *
     * @param int $id ID kontaktu
     * @return array Vrátí stav operace
     */
    public function deleteContact($id){
        return $this->_delete('/contact/'.$id.'/');
    }

    /**
     * Vytvoření nové šablony|pravidelné faktury
     *
     * @param array $data Data, která chceme použít při vytvoření.
     * @return array Vrátí kompletní informace o položce
     */
    public function createTemplate($data){
        return $this->_post('/template/',$data);
    }

    /**
     * Úprava již vytvořené šablony|pravidelné faktury
     *
     * @param int $id ID šablony|pravidelné faktury
     * @param array $data Data, která chceme upravit
     * @return array Vrátí kompletní informace o položce
     */
    public function updateTemplate($id,$data){
        return $this->_put('/template/'.$id.'/',$data);
    }

    /**
     * Vratí informace o šabloně|pravidelné faktuře
     *
     * @param int $id ID šablony|pravidelné faktury
     * @return array Vrátí kompletní informace
     */
    public function getTemplate($id){
        return $this->_get('/template/'.$id.'/');
    }

    /**
     * Vrátí seznam všech šablon|pravidelných faktur
     *
     * @return array
     */
    public function getTemplates(){
        return $this->_get('/template/');
    }

    /**
     * Smazání šablony|pravidelné faktury
     *
     * @param int $id ID šablony|pravidelné faktury
     * @return array Vrátí stav operace
     */
    public function deleteTemplate($id){
        return $this->_delete('/template/'.$id.'/');
    }

    /**
     * Testovací funkce pro ověření správného spojení se serverem
     *
     * @return array
     */
    public function test(){
        return $this->_get('/test/');
    }

    private function _connect($path,$method,$data = array()){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,static::$URL.$path);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);
        curl_setopt($curl,CURLOPT_FAILONERROR,FALSE);
        curl_setopt($curl,CURLOPT_HTTPAUTH,CURLAUTH_BASIC);
        curl_setopt($curl,CURLOPT_USERPWD,$this->login.':'.$this->apiHash);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,2);
        curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));

        switch($method){
            case self::METHOD_POST:
                curl_setopt($curl,CURLOPT_POST,TRUE);
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($data));
                break;
            case self::METHOD_PUT:
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"PUT");
                curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($data));
                break;
            case self::METHOD_DELETE:
                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"DELETE");
                break;
        }

        $response = curl_exec($curl);
//        $info = curl_getinfo($curl);
        curl_close($curl);

        $return = json_decode($response,true);
        return $return ? $return : $response;
    }

    private function _get($path,$data = null){
        return $this->_connect($path,self::METHOD_GET,$data);
    }

    private function _post($path,$data = null){
        return $this->_connect($path,self::METHOD_POST,$data);
    }

    private function _put($path,$data = null){
        return $this->_connect($path,self::METHOD_PUT,$data);
    }

    private function _delete($path,$data = null){
        return $this->_connect($path,self::METHOD_DELETE,$data);
    }

}
