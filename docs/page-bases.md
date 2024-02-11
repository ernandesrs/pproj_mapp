# Páginas bases

Para facilitar o processo de criação de páginas, algumas classes abstratas foram implementadas com diversos recursos implementadas, além de métodos abstratos para facilitar a inserção de dados necessários para uma página.

# Páginas bases disponíveis

As páginas bases para criação de páginas administrativas estão localizados no namespace <b>\App\Livewire\Admin\PageBases</b>.

#### \App\Livewire\Admin\PageBases\PageBase

Extender esta classe facilitará a criação de uma página, esta classe possui diversos métodos abstratos que devem ser implementados retornando seus devidos valores, veja os métodos aceitos:

| Método                | Obrigatório | Descrição                                                                                                                                                                                                                    |
| --------------------- | ----------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| indexRouteName()      | Opcional    | Deve retornar o nome da rota de listagem de items ou nulo                                                                                                                                                                    |
| showRouteName()       | Opcional    | Deve retornar o nome da rota de mostar um item ou nulo                                                                                                                                                                       |
| createRouteName()     | Opcional    | Deve retornar o nome da rota de criar novo item ou nulo                                                                                                                                                                      |
| editRouteName()       | Opcional    | Deve retornar o nome da rota de edit um item ou nulo                                                                                                                                                                         |
| actionDelete()        | Opcional    | Determina se deve mostar o botão excluir item na lista                                                                                                                                                                       |
| setPageTitle()        | Obrigatório | Deve retornar o título da página ou null                                                                                                                                                                                     |
| setPageBreadcrumbs()  | Obrigatório | Deve retornar um array de arrays, cada array deve conter dados de um link do breadcrumb, algo como: ['label' => 'Link #1', 'href' => '#', 'disabled' => false]                                                               |
| setPageActions()      | Obrigatório | Deve retornar um array de arrays, cada array deve conter dados de um botão de ação que será exibido no cabeçalho da página ao lado do título, pode retornar array vazio                                                      |
| setPageCreateAction() | Obrigatório | Deve retornar um array contendo os dados do botão de criar que será exibido no cabeçalho da página ao lado do título ['text' => '', 'href' => '', 'icon' => '', 'show' => true], pode retornar nulo para não exibir o botão. |

#### \App\Livewire\Admin\PageBases\PageBaseSimple

Extender esta classe abstrata facilita a criação de uma página simples em que não é necessário a implementação de aluns métodos abstratos, como os métodos que retorna as rotas de listagem, criação, edição e visualização.

#### \App\Livewire\Admin\PageBases\PageCreateBase

#### \App\Livewire\Admin\PageBases\PageEditBase

#### \App\Livewire\Admin\PageBases\PageListBase

```php

<?php


class PageName extends PageBaseSimple
{

}

```
