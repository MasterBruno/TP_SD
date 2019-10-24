# Desenvolvimento

Para realizar a clonagem do projeto, deve:

### Pré-requisitos:

1. Instalação do Docker: [https://docs.docker.com/install/](https://docs.docker.com/install/)
2. Instalação do Docker-Compose: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)
3. Instalação do Composer: [https://getcomposer.org/doc/00-intro.md](https://getcomposer.org/doc/00-intro.md)
4. Instalação do Git: [https://git-scm.com/book/en/v2/Getting-Started-Installing-Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git)

Após seguir estes passos, vamos configurar o projeto para execução:

#### Clonagem do Repositório

Inicialmente iremos clonar o repositório do projeto.

```text
git clone https://github.com/MasterBruno/TP_SD.git
```

Após, dentro da pasta do projeto extraída, vá até a pasta "laradock" e execute via terminal:

```text
docker-compose up -d nginx mongo workspace
```

Após o passo anterior, será realizado a montagem dos containers necessário para execução de nossa aplicação, isto é:

* Nginx: Servidor local
* Mongo: Servidor de banco de dados MongoDB
* Workspace: Ambiente de desenvolvimento no container para execução de comandos relacionado ao "artisan".

Contudo, após a finalização deste passo, teremos todos nossos container solicitados irão subir. Podemos visualizar através do comando:

```text
docker ps
```

Prosseguindo, executaremos o seguinte comando para entrar no container workspace:

```text
docker-compose exec workspace \bin\bash
```

Com o workspace em execução, podemos executar:

```text
artisan serve --port=80
```

Após a execução deste processo, se você abrir seu navegador e informar `localhost:80/api` verá que sua API já estará funcionando.

