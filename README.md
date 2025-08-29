Para configurar o Banco de dados na Asure, entre no portal a azure e procure pelo serviço "Bancos de dados SQL" e crie um novo banco de dados.
Nota: O banco de dados precisa de um grupo de recursos e um servidor.
Após criar o banco de dados, é necessário atualizar o firewall para que o acesso ao banco de dados seja permitido para sua máquina.

A aplicação PHP deve receber as informações de conexão do banco de dados desejado no arquivo conexao.php para se conectar ao banco de dados criado.
Nota: A dll de suporte para o banco de dados SQL deve estar devidamente configurada para que a conexão ocorra sem problemas
