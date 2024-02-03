<?php

namespace App\Enums\Admin\Permissions;

enum UserPermissionsEnum: string
{
    case ADMIN_ACCESS = 'Acesso Admin';

    case PERMISSIONS_EDIT = 'Editar permissões de usuário';

    case VIEW_ANY = 'Listar usuários';

    case VIEW = 'Ver usuário';

    case CREATE = 'Criar usuário';

    case UPDATE = 'Editar usuário';

    case DELETE = 'Excluir usuário';

    case FORCE_DELETE = 'Exclusão forçada de usuário';

    case RESTORE = 'Restaurar usuário';
}
