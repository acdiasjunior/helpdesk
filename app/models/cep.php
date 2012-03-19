<?php

class Cep extends AppModel {

    var $name = 'Cep';

    function consulta($cep) {
        $info = $this->setCep($cep)
                        ->setUser("juniordias")
                        ->setPass("sfQRadf78")
                        ->find();

        return $info;
    }

    /**
     * CEP - armazena o numero do CEP para efetuar a pesquisa
     *
     * @var string
     */
    protected $_cep = '';
    /**
     * username - armazena o nome do usuário usado na autenticação do webservice
     *
     * @var string
     */
    protected $_username = '';
    /**
     * password - armazena a senha do usuário usado na autenticação do webservice
     *
     * @var string
     */
    protected $_password = '';

    /**
     * Construtor da classe
     * Verifica se a extensão SOAP está presente no servidor
     *
     * @return void
     */
    public function __construct() {
        // Verifica se a extensão SOAP está carregada no servidor
        if (!extension_loaded("soap")) {
            throw new Exception('A extensão "SOAP" não está carregada, ative-a nas configurações do "php.ini".');
        }
    }

    /**
     * Seta o CEP para pesquisa
     *
     * @param string $cep
     * @return CepWebService
     */
    public function setCep($cep) {
        $this->_cep = (string) $cep;
        return $this;
    }

    /**
     * Retorna o CEP da pesquisa
     *
     * @return string
     */
    public function getCep() {
        return $this->_cep;
    }

    /**
     * Seta o nome de usuário para autenticação
     *
     * @param string $user
     * @return CepWebService
     */
    public function setUser($user) {
        $this->_username = (string) $user;
        return $this;
    }

    /**
     * Retorna o nome de usuário para autenticação
     *
     * @return string
     */
    public function getUser() {
        return $this->_username;
    }

    /**
     * Seta a senha de usuário para autenticação
     *
     * @param string $pass
     * @return CepWebService
     */
    public function setPass($pass) {
        $this->_password = (string) $pass;
        return $this;
    }

    /**
     * Retorna a senha de usuário para autenticação
     *
     * @return string
     */
    public function getPass() {
        return $this->_password;
    }

    /**
     * Busca as informações do CEP no webservice
     *
     * @return array
     */
    public function find() {
        // Validando CEP
        if (empty($this->_cep)) {
            throw new Exception('Parâmetro "CEP" não foi definido.');
        }

        // Validando usuário de autenticação
        if (empty($this->_username)) {
            throw new Exception('Parâmetro "Usuário" não foi definido.');
        }

        // Validando senha de autenticação
        if (empty($this->_password)) {
            throw new Exception('Parâmetro "Senha" não foi definido.');
        }

        // Definindo o webservice
        $client = new SoapClient(NULL,
                        array(
                            "location" => "http://www.byjg.com.br/site/webservice.php/ws/cep",
                            "uri" => "urn:xmethods-delayed-quotes",
                            "style" => SOAP_RPC,
                            "use" => SOAP_ENCODED
                        )
        );

        // Chamando método do webservice
        $result = $client->__call(
                        // Nome do método
                        "obterLogradouroAuth",
                        // Parâmetros
                        array(
                            new SoapParam(
                                    // informando CEP
                                    $this->_cep,
                                    // Nome do parâmentro
                                    "cep"
                            ),
                            new SoapParam(
                                    // Informando usuário
                                    $this->_username,
                                    // Nome do parâmentro
                                    "usuario"
                            ),
                            new SoapParam(
                                    // Informando senha
                                    $this->_password,
                                    // Nome do parâmentro
                                    "senha"
                            )
                        ),
                        // Opções
                        array(
                            "uri" => "urn:xmethods-delayed-quotes",
                            "soapaction" => "urn:xmethods-delayed-quotes#getQuote"
                        )
        );

        // Verifica o resultado retornado pelo webservice
        if (strpos($result, utf8_encode('não encontrado')) !== false) {
            $return = array();
        } else {
            // Converte em array
            $return = explode(', ', $result);

            // Verifica se a faixa de numero foi especificada
            /*
            if (strpos($return[0], '-') !== false) {
                // Adiciona os novos valores
                list($return[0], $return[]) = explode(' - ', $return[0]);
            }
            */
            // Adequa os resultados
            /*
            $return = array_map('trim', $return);
            $return = array_map('utf8_decode', $return);
            $return = array_map(array($this, 'clear'), $return);
            $return = array_map('strtolower', $return);
            $return = array_map('ucwords', $return);
             * 
             */
            $return = $this->clear($return);
        }

        return $return;
    }

    /**
     * Substitui caracteres com acento por caracteres sem acento
     *
     * @param string $string
     * @return string
     */
    public function clear($string) {
        //return strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ", "aaaaeeiooouucAAAAEEIOOOUUC");
        foreach($string as $key => $value)
            $string[$key] = strtoupper(Inflector::slug($value, ' '));
        return $string;
    }

}
