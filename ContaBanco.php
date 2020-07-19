<?php
    class ContaBanco {
        public $numConta;
        protected $tipo;
        private $dono;
        private $saldo;
        private $status;

        // Quem abrir a conta CC recebe 50 reais por criar a conta.
        // Quem abrir a conta CP recebe 150 reais por criar a conta.
        public function abrirConta($t) {
            $this->setTipo($t);
            $this->setStatus(true);
            if ($t == 'CC') {
                $this->setSaldo(50);
            } else if ($t == 'CP') {
                $this->setSaldo(150);
            } else {
                echo '<p>[ERRO: ] Valor imformado inválido</p>';
            }
        }

        public function fecharConta() {
            if ($this->getSaldo() > 0) {
                echo '<p>Conta ainda tem dinheiro, não posso fechá-la!</p>';
            } else if ($this->getSaldo() < 0) {
                echo '<p>Conta está em débito. Impossivel encerrar!</p>';
            } else {
                $this->setStatus(false);
                echo "<p>Conta de <strong>" .$this->getDono() ."</strong> Fechada com sucesso!</p>";
            }
        }
        
        public function depositar($v) {
            if ($this->getStatus()) { // <- Se status for verdadeiro.
                $this->setSaldo($this->getSaldo() + $v);
                echo "<p>Depósito de <strong>R$ $v</strong> autorizado na Conta de <strong>" .$this->getDono() ."</strong></p>";
            } else {
                echo '<p>Conta fechada, Não consego depositar!</p>';
            }
        }

        public function sacar($v) {
            if ($this->getStatus()) {
               if ($this->getSaldo() >= $v) {
                   $this->setSaldo($this->getSaldo() - $v);
                   echo "<p>Saque de <strong>R$ $v</strong> autorizado na Conta de <strong>" .$this->getDono() ."</strong></p>";
               } else {
                   echo '<p>Saldo insuficiente para saque.</p>';
               }
            } else {
                echo '<p>Não posso sacar de uma conta fechada.</p>';
            }
        }

        public function pagarMensal() {
            if ($this->getTipo() == "CC") {
                $v = 12;
            } else if ($this->getTipo() == "CP") {
                $v = 20;
            }

            if ($this->getStatus()) {
                $this->setSaldo($this->getSaldo() - $v);
                echo "<p>Mensalidade de <strong>R$ $v</strong> debitada na conta <strong>" .$this->getTipo()  ."</strong> de <strong>" .$this->getDono() ."</strong> </p>";
            } else {
                echo ('<p>Salado insuficiente, Impossível pagar!</p>'); 
            }
        }


        // Método construtor *ESPECIAIS*
        public function ContaBanco() {
            $this->setSaldo = 0;
            $this->setStatus(false);
            echo "<h4>Conta criada com sucesso!</h4>";
        }

        public function getNumConta() {
            return $this->numConta;
        }
        public function setNumConta($n) {
            $this->numConta = $n;
        }

        public function getTipo() {
            return $this->tipo;
        }
        public function setTipo($t) {
            $this->tipo = $t;
        }

        public function getDono() {
            return $this->dono;
        }
        public function setDono($d) {
            $this->dono = $d;
        }

        public function getSaldo() {
            return $this->saldo;
        }
        public function setSaldo($s) {
            $this->saldo = $s;
        }

        public function getStatus() {
            return $this->status;
        }
        public function setStatus($st) {
            $this->status = $st;
        }
    }
?>