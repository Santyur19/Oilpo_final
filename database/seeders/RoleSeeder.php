<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name' => 'Admin']);
        $rol2 = Role::create(['name' => 'Empleado']);

        $permission = Permission::create(['name' => 'home'])->syncRoles([$rol1, $rol2]);

        $permission = Permission::create(['name' => 'Roles_guardar'])->assignRole($rol1);

        $permission = Permission::create(['name' => 'guardar_Servicio'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'servicios'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Servicio_editar'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Editar_estado_servicio'])->assignRole($rol1);

        $permission = Permission::create(['name' => 'clientes'])->syncRoles([$rol1, $rol2]);
        $permission = Permission::create(['name' => 'ClienteGuardar'])->syncRoles([$rol1, $rol2]);
        $permission = Permission::create(['name' => 'editar_cliente'])->syncRoles([$rol1, $rol2]);
        $permission = Permission::create(['name' => 'Editar_estado_cliente'])->syncRoles([$rol1, $rol2]);

        $permission = Permission::create(['name' => 'proveedores'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Proveedores_guardar'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'editar'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Editar_estado_proveedor'])->assignRole($rol1);

        $permission = Permission::create(['name' => 'admin.user'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Editar_usuario'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'guardar_usuario'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Editar_estado_usuario'])->assignRole($rol1);

        $permission = Permission::create(['name' => 'productos'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'ProductoGuardar'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'ProductoEditar'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Editar_estado'])->assignRole($rol1);

        $permission = Permission::create(['name' => 'compras'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Agregar_compra'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Agregar_producto_compra'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Guardar_compra'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Detalles'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Exportar_Excel'])->assignRole($rol1);

        $permission = Permission::create(['name' => 'ventas'])->syncRoles([$rol1, $rol2]);
        $permission = Permission::create(['name' => 'Agregar_venta'])->syncRoles([$rol1, $rol2]);
        
        $permission = Permission::create(['name' => 'informes'])->assignRole($rol1);
        $permission = Permission::create(['name' => 'Informe_ventas'])->assignRole($rol1);

        
    }
}