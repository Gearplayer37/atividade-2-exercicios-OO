<?php

namespace Loja;


// 1) Crie uma classe chamada 'Livro' com propriedades privadas 'titulo' e 'autor'.
// Implemente um método construtor para inicializar essas propriedades.
// Em seguida, crie um objeto da classe 'Livro' e exiba suas propriedades.

class Livro {
    private $titulo;
    private $autor;

    public function __construct($titulo, $autor){
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }
}

$livros = new Livro("la casa de madeira","jeorge");

echo "titulo do livro: " . $livros->getTitulo() . "<br>";
echo "autor do livro: " . $livros->getAutor() . "<br>";


// 2) Modifique a classe 'Livro' do exercício anterior.
// Adicione métodos públicos 'setTitulo($novoTitulo)' e 'setAutor($novoAutor)' que permitem modificar as propriedades.
// Use esses métodos para alterar o título e o autor do objeto criado.

$livros->setTitulo("Chapeuzinho amarela");
$livros->setAutor("ronaldo");

echo "titulo do livro: " . $livros->getTitulo() . "<br>";
echo "autor do livro: " . $livros->getAutor() . "<br>";

// 3) Crie uma classe base chamada 'Animal' com propriedades privadas 'nome' e 'idade'.
// Implemente um método construtor e métodos públicos para acessar e modificar essas propriedades.
// Crie uma classe derivada chamada 'Cachorro' que herda de 'Animal' e sobrescreva o método de acesso à propriedade 'idade'.
// Crie um objeto da classe 'Cachorro' e exiba suas propriedades.


// 4) Modifique a classe 'Cachorro' do exercício anterior.
// Torne as propriedades 'nome' e 'idade' protegidas e utilize métodos getters e setters para acessá-las e modificá-las.

// 2-4)Crie uma classe base 'Animal' com um método 'emitirSom'.
// Crie duas classes derivadas, 'Cachorro' e 'Gato', que herdam de 'Animal'.
// Sobrescreva o método 'emitirSom' em ambas as classes derivadas para representar o som característico.
// Demonstre o polimorfismo chamando o método comum com objetos de ambas as classes derivadas.


class Animal {
    protected $nome;
    protected $idade;

    public function __construct($nome, $idade){
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($novoNome){
        $this->nome = $novoNome;
    }

    public function getIdade(){
        return $this->idade;
    }

    public function setIdade($novaIdade){
        $this->idade = $novaIdade;
    }

    public function emitirSom(){
        return "Animal fazendo um som qualquer.";
    }
}

class Cachorro extends Animal{
    public function emitirSom(){
        return "Au Au!";
    }
}

class Gato extends Animal{
    public function emitirSom(){
        return "Miau!";
    }
}

$cachorro1 = new Cachorro("Max", 3);
$gato = new Gato("Luna", 5);

echo "Nome do animal: " . $cachorro1->getNome() . "<br>";
echo "Idade do animal: " . $cachorro1->getIdade() . "<br>";
echo "Som do cachorro: " . $cachorro1->emitirSom() . "<br><br>";

echo "Nome do animal: " . $gato->getNome() . "<br>";
echo "Idade do animal: " . $gato->getIdade() . "<br>";
echo "Som do gato: " . $gato->emitirSom() . "<br><br>";



// 5) Crie uma classe chamada 'Calculadora' com um método estático chamado 'soma' que recebe dois números e retorna a soma.
// Não é necessário instanciar a classe para utilizar o método 'soma'.
// Demonstre a utilização deste método.

class Calculadora 
{
    public static function soma($primeiroNumero, $segundoNumero)
    {
        return $primeiroNumero + $segundoNumero;
    }
}

$num1 = 6;
$num2 = 5;

$resultado = Calculadora::soma($num1, $num2);

echo "A soma do número: " . $num1 . " e do número: " . $num2 . " é igual a: " . $resultado;
echo "<br><br>";


// 2-1) Defina uma classe base 'Veiculo' com propriedades como 'marca' e 'modelo'.
// Crie duas classes derivadas, 'Carro' e 'Moto', que herdam de 'Veiculo'.
// Implemente métodos específicos para cada classe e um método comum para exibir informações gerais.
// Demonstre o polimorfismo chamando o método comum com objetos de ambas as classes derivadas.

class Veiculo
{
    protected $marca;
    protected $modelo;

    public function __construct($marca, $modelo)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
}

class Carro extends Veiculo{
}

class Moto extends Veiculo{ 
}

$carro = new Carro("Fiat", "Uno");
$moto = new Moto("Honda", "CBR 500");

echo "O carro possui a marca: " . $carro->getMarca() . " e o modelo: " . $carro->getModelo() . "<br>";
echo "A moto possui a marca: " . $moto->getMarca() . " e o modelo: " . $moto->getModelo() . "<br>";
echo "<br>";

// 2-2) Crie uma trait chamada 'Mensagens' que define um método 'enviarMensagem'.
// Crie duas classes, 'EmailSender' e 'SMSSender', que utilizam a trait 'Mensagens'.
// Demonstre a utilização da trait em ambas as classes.

trait Mensagens
{
    public function enviarMensagem($mensagem)
    {
        echo "Mensagem enviada com sucesso: '$mensagem'<br>"; 
    }
}

class EmailSender
{
    use Mensagens;

    public function receberMensagem($conteudo)
    {
        $this->enviarMensagem("Conteúdo de e-mail recebido: '$conteudo'");
    }
}

class SMSSender
{
    use Mensagens;

    public function receberMensagem($conteudo)
    {
        $this->enviarMensagem("Conteúdo de SMS recebido: '$conteudo'");
    }
}

$emailSender = new EmailSender();
$emailSender->receberMensagem("Importante: reunião amanhã às 10h");

$smsSender = new SMSSender();
$smsSender->receberMensagem("Urgente: pagamento da fatura até o final do dia");

echo "<br>";

// 2-3) Crie duas classes, 'Cliente' e 'Pedido', no namespace 'Loja'.
// Em seguida, crie uma classe 'Pagamento' em um namespace diferente, por exemplo, 'Financeiro'.
// Demonstre a utilização das classes em seus respectivos namespaces.

class Cliente
{
    public function exibirCliente()
    {
        echo "Detalhes do cliente";
    }
}

class Pedido
{
    public function exibirProduto()
    {
        echo "Detalhes do produto";
    }
}

namespace Financeiro;

class Pagamento
{
    public function exibirPagamento()
    {
        echo "Detalhes do pagamento";
    }
}

use Loja\Cliente as ClienteLoja;
use Financeiro\Pagamento as PagamentoFinanceiro;

$cliente = new ClienteLoja();
$cliente->exibirCliente();

echo "<br>";

$pagamento = new PagamentoFinanceiro();
$pagamento->exibirPagamento();

echo "<br><br>";

// 2-5) Crie duas traits, 'LogErro' e 'LogInfo', ambas com um método 'registrarLog'.
// Em seguida, crie uma classe 'Registro' que utiliza ambas as traits.
// Demonstre o uso da classe e resolva possíveis conflitos de métodos.

trait LogErro
{
    public function registrarLog()
    {
        echo "Erro: Ocorreu um problema" . PHP_EOL;
    }
}

trait LogInfo
{
    public function registrarLog()
    {
        echo "Info: Informação registrada" . PHP_EOL;
    }
}

class Registro
{
    use LogErro, LogInfo {
        LogErro::registrarLog insteadof LogInfo;
        LogInfo::registrarLog as registrarLogInfoAlias;
    }

    public function registros($logs)
    {
        $this->registrarLog();
        $this->registrarLogInfoAlias();
        echo "Registros: $logs" . PHP_EOL;
    }
}

$registroLogs = new Registro();
$registroLogs->registros("Testando registros");


?>