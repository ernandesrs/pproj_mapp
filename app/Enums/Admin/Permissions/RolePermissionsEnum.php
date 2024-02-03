<?php

namespace App\Enums\Admin\Permissions;

enum RolePermissionsEnum: string
{
    case VIEW_ANY = 'Listar cargos';

    case VIEW = 'Ver cargo';

    case CREATE = 'Criar cargo';

    case UPDATE = 'Editar cargo';

    case DELETE = 'Excluir cargo';

    case FORCE_DELETE = 'Exclusão forçada de cargo';

    case RESTORE = 'Restaurar cargo';
}
