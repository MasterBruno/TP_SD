---
description: Descrição dos caminhos utilizados para realização de métodos da API.
---

# Rotas

### Rotas Usuários

| Método | Rota | Descrição |
| :--- | :--- | :--- |
| GET | api/users | Lista todos os usuários cadastrados. |
| POST | api/users | Cadastra um novo usuário. |
| GET | api/users/{id} | Detalha o usuário com o id pesquisado |
| DELETE | api/users/{id} | Apaga o usuário com o id pesquisado |
| UPDATE | api/users/{id} | Atualiza os dados do usuário com o id pesquisado. |
| GET | api/user/nome/{nome} | Busca todos o usuários que contenha o nome pesquisado. |
| GET | api/user/cidade/{cidade} | Busca todos o usuários que residem na cidade pesquisada. |
| GET | api/user/estado/{estado} | Busca todos o usuários que residem no estado pesquisado. |
| GET | api/user/language/{language} | Busca todos o usuários que tem como linguagem preferida a linguagem pesquisada. |
| GET | api/user/cidade/{cidade}/language/{language} | Busca todos o usuários que residem na cidade pesquisada e que tem como linguagem preferida a linguagem pesquisada. |
| GET | api/user/estado/{estado}/language/{language} | Busca todos o usuários que residem no estado pesquisada e que tem como linguagem preferida a linguagem pesquisada. |



