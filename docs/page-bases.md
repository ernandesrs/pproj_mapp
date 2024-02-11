# Páginas bases

Para facilitar o processo de criação de páginas, algumas classes abstratas foram implementadas com diversos recursos implementados, além de métodos abstratos para facilitar a inserção de dados necessários para uma página.

# Páginas bases disponíveis

As páginas bases para criação de páginas administrativas estão localizados no namespace <i>\App\Livewire\Admin\PageBases</i>.

## \App\Livewire\Admin\PageBases\PageBase

Extender esta classe facilitará a criação de uma página, esta classe possui propriedades e diversos métodos abstratos que devem ser implementados retornando seus devidos valores.

### Métodos aceitos

| Método                | Obrigatório | Descrição                                                                                                                                                                                                                                                  |
| --------------------- | ----------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| indexRouteName()      | Opcional    | Deve retornar o nome da rota de listagem de items ou nulo                                                                                                                                                                                                  |
| showRouteName()       | Opcional    | Deve retornar o nome da rota de mostar um item ou nulo                                                                                                                                                                                                     |
| createRouteName()     | Opcional    | Deve retornar o nome da rota de criar novo item ou nulo                                                                                                                                                                                                    |
| editRouteName()       | Opcional    | Deve retornar o nome da rota de edit um item ou nulo                                                                                                                                                                                                       |
| actionDelete()        | Opcional    | Determina se deve mostar o botão excluir item na lista                                                                                                                                                                                                     |
| setPageTitle()        | Obrigatório | Deve retornar o título da página ou null                                                                                                                                                                                                                   |
| setPageBreadcrumbs()  | Obrigatório | Deve retornar um array de arrays, cada array deve conter dados de um link do breadcrumb, algo como: ['label' => 'Link #1', 'href' => '#', 'disabled' => false]                                                                                             |
| setPageActions()      | Obrigatório | Deve retornar um array de arrays, cada array deve conter dados de um botão de ação que será exibido no cabeçalho da página ao lado do título, algo como ['text' => '', 'href' => '', 'icon' => '', 'show' => true]. Pode-se retornar também um array vazio |
| setPageCreateAction() | Obrigatório | Deve retornar um array contendo os dados do botão de criar que será exibido no cabeçalho da página ao lado do título ['text' => '', 'href' => '', 'icon' => '', 'show' => true], pode retornar nulo para não exibir o botão.                               |

### Propriedades aceitas

| Propriedade         | Obrigatório | Descrição                                                                           |
| ------------------- | ----------- | ----------------------------------------------------------------------------------- |
| public $viewContent | Obrigatório | O caminho para a view contendo o conteúdo do da página. Ex.: 'admin.users.index'    |
| public $uncontained | Opcional    | O padrão é false. Quando true, a página não terá cor de fundo e nem margem interna. |

## \App\Livewire\Admin\PageBases\PageBaseSimple

Esta classe extende a classe <i>\App\Livewire\Admin\PageBases\PageBase</i>, e possui os mesmos métodos já citatos acima, no entanto esta classe já implementa os métodos <i>indexRouteName()</i>, <i>showRouteName()</i>, <i>createRouteName()</i>, <i>editRouteName()</i> e <i>actionDelete()</i> retornando null.

## \App\Livewire\Admin\PageBases\PageCreateBase

## \App\Livewire\Admin\PageBases\PageEditBase

## \App\Livewire\Admin\PageBases\PageListBase

```php

<?php


class PageName extends PageBaseSimple
{

}

```
