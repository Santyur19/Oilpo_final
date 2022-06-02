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
        $rol = Role::create(['name' => 'Admin']);
        $rol = Role::create(['name' => 'Empleado']);
        // $rol = Role::create(['name' => 'Registrado']);

        // $permission = Permission::create(['name' => 'home'])->syncRoles(['Admin', 'Empleado', 'Registrado']);

        $permission = Permission::create(['name' => 'roles'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Roles_crear'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Roles_guardar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'volver_rol'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Roles_editar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Editar_estado_rol'])->assignRole('Admin');

        $permission = Permission::create(['name' => 'guardar_Servicio'])->assignRole('Admin', 'Empleado');
        $permission = Permission::create(['name' => 'servicios'])->assignRole('Admin', 'Empleado');
        $permission = Permission::create(['name' => 'Servicio_editar'])->assignRole('Admin', 'Empleado');
        $permission = Permission::create(['name' => 'Editar_estado_servicio'])->assignRole('Admin');

        $permission = Permission::create(['name' => 'clientes'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'ClienteGuardar'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'editar_cliente'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Editar_estado_cliente'])->syncRoles(['Admin', 'Empleado']);

        $permission = Permission::create(['name' => 'proveedores'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Proveedores_guardar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'editar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Editar_estado_proveedor'])->assignRole('Admin');

        $permission = Permission::create(['name' => 'usuarios'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Usuario_crear'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Usuario_guardar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'volver_usuario'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Editar_usuario'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Editar_estado_usuario'])->assignRole('Admin');

        $permission = Permission::create(['name' => 'productos'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'ProductoGuardar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'ProductoEditar'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Editar_estado'])->assignRole('Admin');

        $permission = Permission::create(['name' => 'compras'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Agregar_compra'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Agregar_producto_compra'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Guardar_compra'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Detalles'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'volver_compra'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Exportar_Excel'])->assignRole('Admin');
        
        $permission = Permission::create(['name' => 'ventas'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Agregar_venta'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Guardar_Venta'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Buscar_clientes'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Detalles_ventas'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Editar_estado_ventas'])->syncRoles(['Admin']);
        $permission = Permission::create(['name' => 'volver'])->syncRoles(['Admin', 'Empleado']);
        $permission = Permission::create(['name' => 'Exportar'])->syncRoles(['Admin']);
        
        $permission = Permission::create(['name' => 'informes'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Informe_ventas'])->assignRole('Admin');

        $permission = Permission::create(['name' => 'permisos'])->assignRole('Admin');
        $permission = Permission::create(['name' => 'Editar_estado_permiso'])->assignRole('Admin');

        
    }
}