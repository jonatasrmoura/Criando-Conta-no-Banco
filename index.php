<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 05 PHP POO</title>
</head>
<body>
    <pre>
        <?php
            require_once "ContaBanco.php";

            $p1 = new ContaBanco(); // Jubileu
            $p1->abrirConta("CC"); // Conta Corrente CC
            $p1->setNumConta(22558800);
            $p1->setDono("Jubileu");
            $p1->depositar(300);
            $p1->pagarMensal();

            print_r($p1);

            echo "<br/><br/>";

            $p2  = new ContaBanco(); // Creuza
            $p2->abrirConta("CP");  // Conta Poupança CP
            $p2->setNumConta(44556699);
            $p2->setDono("Creuza");   
            $p2->depositar(500);
            $p2->sacar(100);
            $p2->pagarMensal();
   
            print_r($p2);

            echo "<br/><br/>";

            // Minha conta hehe
            $p3 = new ContaBanco();
            $p3->abrirConta("CP");
            $p3->setNumConta(101001101);
            $p3->setDono("Jonatas");
            $p3->depositar(100);
            $p3->pagarMensal();
            $p3->sacar(230);
            $p3->fecharConta();

            print_r($p3);
        ?>
    </pre>
</body>
</html>